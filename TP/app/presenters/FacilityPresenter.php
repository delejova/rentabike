<?php

//pridat vynimku ak vkladame bike number ktore uz existuje, aby vyhodilo hlasku

namespace App\Presenters;

use App\Presenters\BasePresenter;
use App\Model\FacilityModel;
use Nette\Application\UI\Form;
use Nette\Security\User;

//use Tracy\Debugger;

/**
 * Formulare pre facility
 * pridavanie novych bikov
 * ich editacia a pod.
 *
 * @author Deny
 */
class FacilityPresenter extends BasePresenter {

    protected $facility;
    protected $bikeTypes; //pre select option v teplate add.latte, pre vyber biketypu pri pridavani noveho
    protected $bikesCbc;
    protected $bikesTesla;
    protected $issues;
    private $user;

    public function __construct(FacilityModel $facility, User $user) {
        parent::__construct();
        $this->facility = $facility;
        $this->user = $user;
    }

    /**
     * Ak pouzivatel nie je prihlaseny, posle ho na login. Ak je posle email do template suborov pre Facility.
     */
    public function beforeRender(){
        
        if ($this->user->isLoggedIn()) {                                                        
            $this->template->email = $this->getUser()->getIdentity()->getData()['email'];                     // email
        } else {
            $this->redirect(':Sign:login');
        }       
    }
    
    public function renderExisting() {
        $this->template->bikesCbc = $this->facility->getByPlace('CBC', 0);
        $this->template->bikesTesla = $this->facility->getByPlace('Tesla', 0);
    }

    public function renderEdit($id_bike) {
    }

    //formular pre pridanie noveho biku
    protected function createComponentAddNewForm() {

        $form = new Form();
        // select option places
        $places = ['CBC' => 'Žriedlová 13, Košice',
            'Tesla' => 'Moldavská x, Košice'];
        //select option biketype
        $types = $this->facility->getAllTypes(0);
        $i = 1;
        foreach ($types as $type) {
            $pole[$type['id']] = $type['bike_name'] . ", color: " . $type['color'];
            $i++;
        }
        //Debugger::dump($pole);
        $form->addText('bike_number', 'Number of bike')
                ->setRequired('Please fill number of bike.');
        $form->addSelect('place', 'Place', $places);
        $form->addSelect('bikeTypes', 'Bike type', $pole) //tu sa dava ziskane pole biketypov
                ->setRequired('Please select bike type.');
        $form->addSubmit('add', 'Save');
        $form->onSuccess[] = [$this, 'addNewFormSuccessed'];
        return $form;
    }

    //sprievodna funkcia pre pridanie biku do DB
    public function addNewFormSuccessed($form) {
        //$guid = $this->facility->getGuid();
        //z formulara dostaneme hodnoty ktore pojdu do DB
        $bike_number = $form->getValues()->bike_number;
        $place = $form->getValues()->place;
        // ak existuje identita pouzivatela (je prihlaseny) zistime jeho udaje, vlozime rezervaciu na dany bike
        if ($this->user->isLoggedIn()) {
            $id = $this->user->getIdentity()->getId();
            $userInfo = $this->facility->getUserById($id, 0);
            $email = $userInfo['email'];
            $id_bike_type = $form->getValues()->bikeTypes;
            $vysledok = $this->facility->addNewBike($email, $id_bike_type, $bike_number, $place);
            $this->flashMessage('Creating of new bike was successful');
        } else {
            $this->flashMessage('Creating of bike failed.');
        }
        $this->redirect('Facility:default');
    }

    //button pre prechod na sablonu new.latte, pre pridavanie noveho bike typu
    protected function createComponentAddNewType() {
        $form = new Form;
        $form->addSubmit('add_new_type', 'Add new type')
                        ->setAttribute('class', 'default')
                ->onClick[] = [$this, 'addNewType'];
        $form->addProtection();
        return $form;
    }

    //sprievodna funkcia s presmerovanim
    public function addNewType() {
        $this->redirect('Facility:new');
    }

    // formular pre pridanie noveho biketypu
    protected function createComponentAddNewTypeForm() {
        $form = new Form;
        $form->addText('bike_name', 'Name of bike')
                ->setAttribute('class', 'default')
                ->setRequired('Please fill name of bike type.');
        $form->addText('color', 'Color')
                ->setAttribute('class', 'default');
        $form->addText('size', 'Size')
                ->setAttribute('class', 'default');
        $form->addText('gears', 'Gears')
                ->setAttribute('class', 'default');
        $form->addText('max_speed_kmh', 'Max_speed_kmh')
                ->setAttribute('class', 'default');
        $form->addText('max_load_kg', 'Max_load_kg')
                ->setAttribute('class', 'default');
        $form->addText('range_km', 'Range_km')
                ->setAttribute('class', 'default');
        $form->addText('weight_kg', 'Weight_kg')
                ->setAttribute('class', 'default');
        $form->addText('photo_filename', 'Photo_filename')
                ->setAttribute('class', 'default');
        $form->addUpload('nazovSuboru', 'Súbor');
        $form->addSubmit('add', 'Save');
        $form->onSuccess[] = [$this, 'addNewTypeFormSuccessed'];
        return $form;
    }

    //sprievodna funkcia s insertom daneho biketypu
    public function addNewTypeFormSuccessed($form) {
        $guid = $this->facility->getGuid();
        //z formulara dostaneme hodnoty ktore pojdu do DB
        $bike_name = $form->getValues()->bike_name;
        $color = $form->getValues()->color;
        $size = $form->getValues()->size;
        $gears = $form->getValues()->gears;
        $max_speed_kmh = $form->getValues()->max_speed_kmh;
        $max_load_kg = $form->getValues()->max_load_kg;
        $range_km = $form->getValues()->range_km;
        $weight_kg = $form->getValues()->weight_kg;
        // $photo_filename = $form->getValues()->photo_filename;
        $file = $form->getValues()->nazovSuboru;

        if ($file->isImage() and $file->isOk()) {
            // oddělení přípony pro účel změnit název souboru na co chceš se zachováním přípony
            $file_ext = strtolower(mb_substr($file->getSanitizedName(), strrpos($file->getSanitizedName(), ".")));
            // vygenerování náhodného řetězce znaků, můžeš použít i \Nette\Strings::random()
            $file_name = $guid . $file_ext;
            // přesunutí souboru z temp složky někam, kam nahráváš soubory
            $file->move('images/' . $file_name);

            // ak existuje identita pouzivatela (je prihlaseny) zistime jeho udaje, vlozime rezervaciu na dany bike
            if ($this->user->isLoggedIn()) {
                $id = $this->user->getIdentity()->getId();
                $userInfo = $this->facility->getUserById($id, 0);
                $email = $userInfo['email'];
                $vysledok = $this->facility->addNewType($guid, $email, $bike_name, $file_name, $color, $size, $gears, $max_speed_kmh, $max_load_kg, $range_km, $weight_kg);
                $this->flashMessage('Creating of new type of bike was successful');
            } else {
                $this->flashMessage('Creating of new bike failed.');
            }
            $this->redirect('Facility:default');
        }
    }

    //formular pre editaciu biku
    protected function createComponentEditForm() {

        $form = new Form();
        //select option status
        $status = ['servis' => 'servis',
            'reserved' => 'reserved',
            'free' => 'free'];
        // select option places
        $places = ['CBC' => 'Žriedlová 13, Košice',
            'Tesla' => 'Moldavská x, Košice'];
        //select option biketype
        $types = $this->facility->getAllTypes(0);
        $i = 1;
        foreach ($types as $type) {
            $pole[$type['id']] = $type['bike_name'] . ", color: " . $type['color'];
            $i++;
        }
        $idcko = $this->request->getParameters();

        $bike = $this->facility->getBikeById($idcko['id_bike'], 0);
        //Debugger::dump($pole);
        $form->addText('bike_number', 'Number of bike')
                ->setRequired('Please fill number of bike.')
                ->setDefaultValue($bike['bike_number']);
        $form->addSelect('place', 'Place', $places)
                ->setDefaultValue($bike['place']);
        $form->addSelect('bikeTypes', 'Bike type', $pole) //tu sa dava ziskane pole biketypov
                ->setRequired('Please select bike type.')
                ->setDefaultValue($bike['id_bike_type']);
        $form->addSelect('status', 'Status', $status) //tu sa dava ziskane pole biketypov
                ->setRequired('Please select status.')
                ->setDefaultValue($bike['status']);
        $form->addSubmit('save', 'Save');
        $form->onSuccess[] = [$this, 'editFormSuccessed'];
        return $form;
    }

    //sprievodna funkcia pre updatovanie biku v DB
    public function editFormSuccessed($form) {
        //$guid = $this->facility->getGuid();
        //z formulara dostaneme hodnoty ktore pojdu do DB
        $idcko = $this->request->getParameters();
        $id_bike = $idcko['id_bike'];
        $bike_number = $form->getValues()->bike_number;
        $place = $form->getValues()->place;
        $status = $form->getValues()->status;
        // ak existuje identita pouzivatela (je prihlaseny) zistime jeho udaje, vlozime rezervaciu na dany bike
        if ($this->user->isLoggedIn()) {
            $id = $this->user->getIdentity()->getId();
            $userInfo = $this->facility->getUserById($id, 0);
            $email = $userInfo['email'];
            $id_bike_type = $form->getValues()->bikeTypes;
            $vysledok = $this->facility->editBike($id_bike, $email, $id_bike_type, $bike_number, $place, $status);
            $this->flashMessage('Editing of bike was successful');
        } else {
            $this->flashMessage('Editing of bike failed.');
        }
        $this->redirect('Facility:existing');
    }

    protected function createComponentDeleteBikeButton() {
        $form = new Form();
        $form->addSubmit('delete', 'Yes')->onClick[] = [$this, 'deleteBikeButtonSubmitted'];
        return $form;
    }

    public function deleteBikeButtonSubmitted() {
        $idcko = $this->request->getParameters();
        $this->facility->deleteBikeById($idcko['id_bike']);
        $this->redirect('Facility:existing');
    }

    protected function createComponentCancelButton() {
        $form = new Form();
        $form->addSubmit('back', 'Back')->onClick[] = [$this, 'cancelButtonSubmitted'];
        return $form;
    }

    public function CancelButtonSubmitted() {
        $this->redirect('Facility:default');
    }

}
