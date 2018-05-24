<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Presenters;

use App\Presenters\BasePresenter;
use App\Model\BookModel;
use Nette\Application\UI\Form;
use Nette\Security\User;

/**
 * Description of PlacePresenter
 *
 * @author Deny
 */
class BookPresenter extends BasePresenter {

    protected $book;
    protected $bike;
    private $user;
    protected $id_bike;

    public function __construct(BookModel $book, User $user) {

        parent::__construct();
        $this->book = $book;
        $this->user = $user;
        
    }

    /**
     * Ak pouzivatel nie je prihlaseny, posle ho na login. Ak je posle email do template suborov pre Book.
     */
    public function beforeRender(){
        
        if ($this->user->isLoggedIn()) {                                                        
            $this->template->email = $this->getUser()->getIdentity()->getData()['email'];                     // email
        } else {
            $this->redirect(':Sign:login');
        }       
    }
    
    //vykreslenie konkretneho biku na pozicanie + udaje o nom
    public function renderDefault($bike_id) {
        $this->template->bike = $this->book->getById($bike_id, 0);
    }
 

    //vytvorenie formulara pre rezervaciu biku
    protected function createComponentBookForm() {
        $form = new Form();

        $form->addText('startTime', 'Rent time:')
                ->setRequired('Please fill Rent time .')
                ->setDefaultValue(date("Y-m-d H:i:s"));
        $form->addText('endTime', 'Return time:')
                ->setRequired('Please pick a Return time.')
                ->setDefaultValue(date("Y-m-d H:i:s"));;
        $form->addSubmit('reserve', 'Yes');
        $form->onSuccess[] = [$this, 'reserveFormSucceeded'];
        return $form;
    }

    // ziskanie hodnot z formulara, ziskanie udajov o prave prihlasenom pouzivatelovi 
    //zapisanie udajov do tabulky rent - rezervacia biku
    public function reserveFormSucceeded($form) {
        //z formulara dostaneme datumy ktore pojdu do DB
        $book_start = $form->getValues()->startTime;
        $book_end = $form->getValues()->endTime;
        
        // z URL dostaneme parameter action=default a bike_id = x, pouzite v inserte
        $idcko = $this->request->getParameters();
        
        // ak existuje identita pouzivatela (je prihlaseny) zistime jeho udaje, vlozime rezervaciu na dany bike
        if ($this->user->isLoggedIn()) {
            $id = $this->user->getIdentity()->getId();
            $userInfo = $this->book->getUserById($id, 0);
            $email = $userInfo['email'];
            $first_name = $userInfo['first_name'];
            $last_name = $userInfo['last_name'];
            $employee_id = $userInfo['employee_id'];
            $vysledok = $this->book->book($email, $idcko['bike_id'], $id, $first_name, $last_name, $employee_id, $book_start, $book_end);
            $this->book->reserveBike($email,$idcko['bike_id']);
            $this->flashMessage('Your bike is reserved.'.$vysledok);
        }
        else{
            $this->flashMessage('Reservation failed.');
        }
        $this->redirect('Profil:default');
    }
   

}
