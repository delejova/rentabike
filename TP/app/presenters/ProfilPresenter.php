<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Presenters;

use Nette\Security\User;
use App\Presenters\BasePresenter;
use Nette\Application\UI\Form;
use Tracy\Debugger;
use App\Model\SignModel;
use App\Model\ProfilModel;
use Nette\Application\UI\Multiplier;

/**
 * Description of ProfilPresenter
 *
 * @author Domin6
 */
class ProfilPresenter extends BasePresenter {

    /** @var SignModel premenna pre SignModel */
    private $signModel;
    protected $rentedBikes;
    protected $reservedBikes;
    protected $profil;
    protected $user;
    protected $editedBooking;

    /**
     * Konstruktor 
     * @param 
     */
    public function __construct(User $user, SignModel $signModel, ProfilModel $profil) {
        parent::__construct();
        $this->signModel = $signModel;
        $this->profil = $profil;
        $this->user = $user;
    }

    /**
     * Kliknutie na Profil:default 
     */
    public function actionDefault() {
        
        if (!$this->getUser()->isLoggedIn()) {                   // ak nie je prihlaseny, hodi na login stranku     
            $this->redirect(':Sign:login');
        }

        $identity = $this->getUser()->getIdentity();                // ziska identitu
        if ($identity) {
            $activeAccount = $identity->getData()['status'];        // ak nie je ucet potvrdeny, hodi ho na validacnu stranku
            if ($activeAccount !== 'active') {
                $this->redirect(':Valid:default');
            }
        }
    }

    /** Profil pouzivatela vykresli, resp. presmeruje na login, ak nie je pouzivatel prihlaseny. */
    public function renderDefault() {
        if ($this->user->isLoggedIn()) {
            $id_user = $this->user->getIdentity()->getId();
            $this->template->reservedBikes = $this->profil->Rent_BikeType_Bike_GetAllByUser_Reserved($id_user, 0);
            $this->template->rentedBikes = $this->profil->Rent_BikeType_Bike_GetAllByUser_Rented($id_user, 0);
        }
        /** Profil pouzivatela */
        $identity = $this->getUser()->getIdentity();                // ziska identitu
        if ($identity) {                                            // posle do template informacie o pouzivatelovi      
            $this->template->email = $identity->getData()['email'];                     // email
            $this->template->fisrtName = $identity->getData()['first_name'];            // krstne meno
            $this->template->lastName = $identity->getData()['last_name'];              // priezvisko
            $this->template->employeeId = $identity->getData()['employee_id'];          // ID zamestnanca    
        }
    }

    public function renderEdit($rent_id) {
        
        if ($this->user->isLoggedIn()) {                                                        
            $this->template->email = $this->getUser()->getIdentity()->getData()['email'];                     // email
            $this->template->editedBooking = $this->profil->Rent_BikeType_Bike_GetById($rent_id, 0);
        } else {
            $this->redirect(':Sign:login');
        }
    }

    /**
     * Tlacidlo formulara Rezervovat kvoli presmerovaniu na Place:default 
     * @return Form Tlacidlo Rezervovat
     */
    protected function createComponentPlaceFormDefault() {
        $form = new Form;
        $form->addSubmit('rezervovat', 'New reservation')
                        ->setAttribute('Place', 'default')
                ->onClick[] = [$this, 'getPlaceDefault'];
        $form->addProtection();
        return $form;
    }

    /**
     * Presmerovanie na Place:default, odkial sa da vyberat budovu atd. 
     */
    public function getPlaceDefault() {
        $this->redirect(':Place:default');
    }

    protected function createComponentDeleteRentButton() {
        return new Multiplier(function ($rent_id) {
            $form = new Form;
            $form->addHidden('rent_id', $rent_id);
            $form->addSubmit('delete', 'Yes');
            $form->onSuccess[] = [$this, 'deleteRent'];
            $form->addProtection();
            return $form;
        });
    }

    public function deleteRent($form) {
        $rent_id = $form->getValues()->rent_id;
        $this->profil->deleteRentById($rent_id);
        if ($this->user->isLoggedIn()) {
            $id = $this->user->getIdentity()->getId();
            $userInfo = $this->profil->getUserById($id, 0);
            $email = $userInfo['email'];
            $rent = $this->profil->Rent_GetById($rent_id, 0);
            $this->profil->setBikeFree($email, $rent['id_bike']);
            $this->flashMessage('Booking was deleted.');
        } else {
            $this->flashMessage('Deletinf of book failed.');
        }
        $this->redirect('Profil:default');
    }

    protected function createComponentEditRentButton() {
        return new Multiplier(function ($rent_id) {
            $form = new Form;
            $form->addHidden('rent_id', $rent_id);
            $form->addSubmit('edit', 'edit');
            $form->onSuccess[] = [$this, 'editRent'];
            $form->addProtection();

            return $form;
        });
    }

    public function editRent($form) {
        $rent_id = $form->getValues()->rent_id;
        //posunvanie parametra
        $this->redirect(':Profil:edit', $rent_id);
    }

    //vytvorenie formulara pre rezervaciu biku
    protected function createComponentEditBookForm() {

        // z URL dostaneme parameter rent_id
        $idcko = $this->request->getParameters();
        //dostane vsekt udaje o danom pozicani, vyuziju sa na vlozenie do editacie
        $rent = $this->profil->Rent_BikeType_Bike_GetById($idcko['rent_id'], 0);
        $form = new Form();
        $form->addText('startTime', 'Rent time:')
                ->setRequired('Please fill Rent time .')
                ->setDefaultValue($rent['book_start']);
        $form->addText('endTime', 'Return time:')
                ->setRequired('Please pick a Return time.')
                ->setDefaultValue($rent['book_end']);
        $form->addSubmit('save', 'Save'); //update
        $form->onSuccess[] = [$this, 'editBookFormSucceeded'];
        return $form;
    }

    // ziskanie hodnot z formulara, ziskanie udajov o prave prihlasenom pouzivatelovi 
    //zapisanie udajov do tabulky rent - rezervacia biku
    public function editBookFormSucceeded($form) {
        //z formulara dostaneme datumy ktore pojdu do DB
        $book_start = $form->getValues()->startTime;
        $book_end = $form->getValues()->endTime;

        $idcko = $this->request->getParameters();
        $id_rent = $idcko['rent_id'];

        // ak existuje identita pouzivatela (je prihlaseny) zistime jeho udaje, vlozime rezervaciu na dany bike
        if ($this->user->isLoggedIn()) {
            $id = $this->user->getIdentity()->getId();
            $userInfo = $this->profil->getUserById($id, 0);
            $email = $userInfo['email'];
            $this->profil->updateBookTime($email, $id_rent, $book_start, $book_end);
            $this->flashMessage('Book time was edited.');
        } else {
            $this->flashMessage('Editing of book time failed.');
        }
        $this->redirect('Profil:default');
    }

}
