<?php

/*
 * RENT STATUSY: reserved, rented, returned
 */

namespace App\Presenters;

use App\Presenters\BasePresenter;
use App\Model\ReceptionistModel;
use Nette\Application\UI\Form;
use Nette\Security\User;
use Nette\Application\UI\Multiplier;

/**
 * Description of FacilityPresenter
 *
 * @author Deny
 */
class ReceptionistPresenter extends BasePresenter {

    protected $user;
    protected $receptionist;
    protected $bikesCbc;
    protected $bikesTesla;
    protected $rent;

    public function __construct(ReceptionistModel $receptionist, User $user) {
        parent::__construct();
        $this->receptionist = $receptionist;
        $this->user = $user;
    }

    /**
     * Ak pouzivatel nie je prihlaseny, posle ho na login. Ak je posle email do template suborov pre Receptionist.
     */
    public function beforeRender(){
        
        if ($this->user->isLoggedIn()) {                                                        
            $this->template->email = $this->getUser()->getIdentity()->getData()['email'];                     // email
        } else {
            $this->redirect(':Sign:login');
        }
        
    }
    
    public function renderDefault() {
        $this->template->bikesCbc = $this->receptionist->getByPlace('CBC', 0);
        $this->template->bikesTesla = $this->receptionist->getByPlace('Tesla', 0);
        $this->template->rent = $this->receptionist->Rent_BikeType_Bike_GetAll(0);
    }

    // tlacidlo pre recepcnu ked poziciava bike
    protected function createComponentWasRentedButton() {
        return new Multiplier(function ($rent_id) {
            $form = new Form;
            $form->addHidden('rent_id', $rent_id);
            $status = $this->receptionist->getStatusRentById($rent_id, 0);
            //   dump($status);
            if ($status['status'] == 'rented') {
                $form->addSubmit('return', 'Return');
                $form->onSuccess[] = [$this, 'wasReturnedButtonSuccessed'];
//            } elseif ($status['status'] == 'returned') {
//                $form->addSubmit('rent', 'Rent');
//                $form->onSuccess[] = [$this, 'wasRentedButtonSuccessed'];
            } elseif ($status['status'] == 'reserved') {
                $form->addSubmit('rent', 'Rent');
                $form->onSuccess[] = [$this, 'wasRentedButtonSuccessed'];
            } else {
                $form->addSubmit('return', 'aaaa');
                $form->onSuccess[] = [$this, 'wasReturnedButtonSuccessed'];
            }
            return $form;
        });
    }

    // zapisanie pozicania do DB
    public function wasRentedButtonSuccessed($form) {
        $rent_id = $form->getValues()->rent_id;
        if ($this->user->isLoggedIn()) {
            $id = $this->user->getIdentity()->getId();
            $userInfo = $this->receptionist->getUserById($id, 0);
            $email = $userInfo['email'];
            $this->receptionist->getRented($email, $rent_id);
            //update statusu v biku
            $rent = $this->receptionist->Rent_GetById($rent_id, 0);
            $this->receptionist->rentBike($email, $rent['id_bike']);
            $this->flashMessage('Bike was rented.');
        } else {
            $this->flashMessage('Rent failed.');
        }
        $this->redirect('Receptionist:default');
    }

    // zapisanie vratenia do DB
    public function wasReturnedButtonSuccessed($form) {
        $rent_id = $form->getValues()->rent_id;
        if ($this->user->isLoggedIn()) {
            $id = $this->user->getIdentity()->getId();
            $userInfo = $this->receptionist->getUserById($id, 0);
            $email = $userInfo['email'];
            $this->receptionist->getReturned($email, $rent_id);
             $rent = $this->receptionist->Rent_GetById($rent_id, 0);
            $this->receptionist->returnBike($email, $rent['id_bike']);
          //update statusu v biku a last returned
            $this->flashMessage('Bike was returned.');
        } else {
            $this->flashMessage('Return failed.');
        }
        $this->redirect('Receptionist:default');
    }

}
