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
use App\Model\ForgotModel;
use Nette\Http\Session;

/**
 * Description of ForgotPresenter
 *
 * @author Domin6
 */
class ForgotPresenter extends BasePresenter { 
    
    /** @var UserForms Factory na pouzivatelske formulare. */
    private $userFormsFactory;

  
      /** @var ForgotModel premenna pre ForgotModel */
    private $forgotModel;

    /** @var Session session */
    private $session;

    /**
     * Konstruktor s injektovanou factory na pouzivatelske formulare.
     * @param UserForms $userForms automaticky injektovaná trieda factory na formulare
     */
    public function __construct(UserForms $userForms, ForgotModel $forgotModel) {
        parent::__construct();
        $this->userFormsFactory = $userForms;
       
        $this->forgotModel = $forgotModel;
    }

    /** Vola sa pred kazdou akciou presenteru a inicializuje spolocne premenne. */
    public function startup() {
        parent::startup();

        $this->session = $this->getSession('Forgot');
    }
    
    /**
     * Funkcia, ktora sa vola pri vykreslovani changepsdwd.latte. Osetrene pre token - jeho neexistenciu a pre nespravny. 
     * @param string $token token podla ktoreho sa zistuje pouzivatel. Nastaveny na null ak nie je ziadny zadany.
     */
    public function renderChangepswd($token = null) {
        if (isset($token) && ($token != '0')) {                                 // ak je nastaveny token a ak je rozny od 0
            $user = $this->forgotModel->tokenExist($token);                       // vrati pouzivatela podla tokenu alebo null

            if (!$user) {                                                       // ak nie je pouzivatel, da chybu
                //$this->error('Neplatný token');
                $this->flashMessage('Invalid token.');
                $this->template->resetPassword = false;
            } else {                                                            // ak je pouzivatel nastavi sa premenne
                $this->session->resetPswdMail = $user['email'];                 // ulozi do session email pouzivatela               
                $this->template->resetPassword = true;
               // $this->session->setExpiration('60 minutes',FALSE, 'resetPswdMail');    // vyexpiruje po 60 minutach
                $this->template->firstName = $user['first_name'];
                $this->template->lastName = $user['last_name'];
            }
        } else {
            $this->template->resetPassword = false;                             // premenna pouzita v latte subore na vykreslovanie - sluzi na kontrtolu a podla nej sa vykresluju/nevykresluju veci
            $this->redirect(':Sign:login');                                     // rovno hodi na login stranku, takze sa latte nezobrazi
        }
    }
       
    /**
     * Na zistenie zabudnuteho hesla.
     * @return Form Formular na vyplnenie mailu, aby sme ti poslali mail.
     */
    public function createComponentForgotForm() {

        $form = new Form;
        $form->addText('email', 'Your e-mail:')                    // policko na vyplnenie
                ->setRequired('Type your e-mail.');

        $form->addSubmit('send', 'Send');                             // tlacidlo
        $form->onSuccess[] = function (Form $form) {
            $this->forgotPasswordMail($form);
        };

        return $form;
    }

    /**
     * Na zistenie hesla z mailu.
     * @param Form $form
     */
    public function forgotPasswordMail($form) {
        $email = $form->getValues()->email;

        $presenter = $this->getPresenter();                                                 // ziska presenter
        $template = $this->createTemplate()->setFile(__DIR__ . '/../templates/Mail/forgotlink.latte');      // nastavi template

        $this->forgotModel->updateToken($email, '1');                                                        // najprv vygeneruje novy token pre pouzivatela
        
        $sendedMail = $this->forgotModel->forgotPasswordSendMail($email, $presenter, $template);          // funkcia na odoslanie mailu, vrati true/false
        if ($sendedMail == true) {                                                                          // ak spravne odoslalo mail
            $this->flashMessage('On your email address' . ' ' . $email . ' ' . 'we sent you a link to change password.');
            $this->redirect(":Sign:login");
        } else {
            $this->flashMessage("You don't have account with e-mail " . " " . $email . ". You need to register and confirm registration first.");
        }
    }

    /**
     * Na potvrdenie uctu pomocou Validacneho kodu z mailu.
     * @return Form Validacny formular
     */
    public function createComponentChangeForgotPasswordForm() {

        $form = new Form;

        $form->addPassword('password', 'Password:');
        $form->addPassword('password_repeat', 'Password again:')
                ->addRule(Form::EQUAL, 'Password not match.', $form['password'])
                ->setRequired('Must repeat password.');

        $form->addSubmit('changePswd', 'Change Password');                             // tlacidlo na zmenu hesla
        $form->onSuccess[] = function (Form $form) {
            $this->changeForgotPassword($form);
        };

        return $form;
    }

    /**
     * Na potvrdenie validacie uctu. Kod z formulara sa porovna s kodom v databaze - teda zavola sa funckia na zmenu statusu pouzivatela.
     */
    public function changeForgotPassword($form) {
       
        if (!$this->session->resetPswdMail) {                                        // ci nevyprsalo session
            //$this->error('Neopravneny pristup');
            $this->flashMessage('Unauthorized access');
        } else {                                                                      // ak este session plati
            $password = $form->getValues()->password;                                   // heslo z formulara
            $this->forgotModel->changeForgotPswd($this->session->resetPswdMail, $password);              // zavola funkciu na zmenu hesla v SignModel nad pouzivatelovym mailom
            
            $this->flashMessage('The password is changed.');                                        // vypise spravu o zmene hesla
            unset($this->session->resetPswdMail);                                                   // odstrani premennu session, takze uz sa nebude dat znovu zmenit heslo
            $this->redirect('Sign:login');                                                          // presmeruje na login stranku (uvodnu)
        }
    }

    
}
