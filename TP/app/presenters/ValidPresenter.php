<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Presenters;

use App\Forms\UserForms;
use App\Presenters\BasePresenter;
use Nette\Application\UI\Form;
use Tracy\Debugger;
use App\Model\SignModel;
use App\Model\ValidModel;
use Nette\Http\Session;

/**
 * Description of ValidPresenter
 *
 * @author Domin6
 */
class ValidPresenter extends BasePresenter { 
    
    /** @var UserForms Factory na pouzivatelske formulare. */
    private $userFormsFactory;

    /** @var SignModel premenna pre SignModel */
    private $signModel;
    
      /** @var ValidModel premenna pre ValidModel */
    private $validModel;

    /** @var Session session */
    private $session;

    /**
     * Konstruktor s injektovanou factory na pouzivatelske formulare.
     * @param UserForms $userForms automaticky injektovaná trieda factory na formulare
     */
    public function __construct(UserForms $userForms, SignModel $signModel, ValidModel $validModel) {
        parent::__construct();
        $this->userFormsFactory = $userForms;
        $this->signModel = $signModel;
        $this->validModel = $validModel;
    }

    /** Vola sa pred kazdou akciou presenteru a inicializuje spolocne premenne. */
    public function startup() {
        parent::startup();

        $this->session = $this->getSession('Valid');
    }
    
    /**
     * Ak pouzivatel nie je prihlaseny, posle ho na login. Ak je posle email do template suborov pre Place.
     */
    public function renderDefault(){
        
        if ($this->user->isLoggedIn()) {                                                        
            $this->template->email = $this->getUser()->getIdentity()->getData()['email'];                     // email
        } else {
            $this->redirect(':Sign:login');
        }
        
    }
    
    /** kliknutie na Sign:valid */
    public function actionDefault() {
        if (!$this->getUser()->isLoggedIn()) {                   // ak nie je prihlaseny, hodi na login stranku     
            $this->redirect(':Sign:login');
        }
        $identity = $this->getUser()->getIdentity();                    // ziska identitu
        if ($identity) {
            $activeAccount = $identity->getData()['status'];            // ziska status pouzivatela  
            if ($activeAccount === 'active') {                           // ak je active, zobrazi profil
                $this->redirect(':Profil:default');
            }
        }
    }

    /** kliknutie na Sign:validSuccess */
    public function actionValidSuccess() {
        if (!$this->getUser()->isLoggedIn()) {                   // ak nie je prihlaseny, hodi na login stranku     
            $this->redirect(':Sign:login');
        }
    }

  /**
     * Na potvrdenie uctu pomocou Validacneho kodu z mailu.
     * @return Form form Validacny formular
     */
    public function createComponentValidationForm() {

        $form = new Form;
        $form->addText('validationCode', 'Validation Code:')                    // policko na vyplnenie
                ->setRequired('Please pick a Validation Code from e-mail we sent.');

        $form->addSubmit('confirm', 'Confirm');                             // tlacidlo
        $form->onSuccess[] = function (Form $form) {
            $this->activateAccount($form);
        };

        return $form;
    }

    /**
     * Na potvrdenie validacie uctu. Kod z formulara sa porovna s kodom v databaze - teda zavola sa funckia na zmenu statusu pouzivatela.
     * @param Form $form
     */
    public function activateAccount($form) {
        $validationCode = $form->getValues()->validationCode;       // kod z formulara

        $identity = $this->getUser()->getIdentity();                // ziska identitu
        if ($identity) {
            $idUser = $identity->getId();                               // ziska id prihlasenneho pouzivatela
        }

        $changeStatus = $this->validModel->changeValidToActive($validationCode, $idUser);     // zavola funkciu na zmenu statusu
        if ($changeStatus == true) {                                                                         // ci prebehlo uspesne
            $this->redirect(':Valid:validSuccess');                                                          // ak ano, hodi na validSuccess
        } else {
            $this->flashMessage("Uncorrect validation code!");                                        // ak nie, nespravny validacny kod
        }
    }

    
}
