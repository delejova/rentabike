<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Presenters;

use App\Presenters\BasePresenter;
use App\Model\PlaceModel;
use Nette\Application\UI\Form;
use Nette\Security\User;

/**
 * Description of PlacePresenter
 *
 * @author Deny
 */
class PlacePresenter extends BasePresenter {
    
    protected $place;
    protected $bikesCBC;
    protected $bikesTesla;
    protected $user;

    public function __construct(User $user, PlaceModel $place){

        parent::__construct();
        $this->place = $place;
        $this->user = $user;
    }

    /**
     * Ak pouzivatel nie je prihlaseny, posle ho na login. Ak je posle email do template suborov pre Place.
     */
    public function beforeRender(){
        
        if ($this->user->isLoggedIn()) {                                                        
            $this->template->email = $this->getUser()->getIdentity()->getData()['email'];                     // email
        } else {
            $this->redirect(':Sign:login');
        }
        
    }
    
    public function renderDefault($deleted) {
        
        
    }

    public function renderCbc($deleted) {
       $this->template->bikesCBC = $this->place->getByPlace('CBC',0);
    }

    public function renderTesla($deleted) {
        $this->template->bikesTesla = $this->place->getByPlace('Tesla',0);
    }

    protected function createComponentPlaceFormTesla() {
        $form = new Form;
        $form->addSubmit('tesla', 'Tesla')
                        ->setAttribute('class', 'default')
                ->onClick[] = [$this, 'selectPlaceTesla'];
        $form->addProtection();
        return $form;
    }
    
    public function selectPlaceTesla($button) {
        $this->redirect('tesla');
    }

    protected function createComponentPlaceFormCBC() {
        $form = new Form;
        $form->addSubmit('cbc', 'CBC')
                        ->setAttribute('class', 'default')
                ->onClick[] = [$this, 'selectPlaceCBC'];
        $form->addProtection();
        return $form;
    }

    public function selectPlaceCBC($button) {
        $this->redirect('cbc');
    }    
    
}
