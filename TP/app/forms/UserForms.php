<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Forms;

use Nette\Application\UI\Form;
use Nette\Object;
use Nette\Security\AuthenticationException;
use Nette\Security\User;
use Nette\Utils\ArrayHash;
use Nette\Utils\Html;

/**
 * Description of UserForms
 *
 * @author Domin6
 */
class UserForms extends Object {

    /** @var User pouzivatel. */
    private $user;

    /**
     * Konstruktor s injektovanou triedou pouivatela.
     * @param User $user automaticky injektovana trieda pouivatele
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Prihlasi, pripadne registruje, pouzivatela.
     * @param Form $form                   formular, z ktereho se metoda vola
     * @param null|ArrayHash $instructions pouivatelske instrukcie
     * @param bool $register               registruj noveho pouivatela
     */
    private function login($form, $instructions, $register = false) {
        $presenter = $form->getPresenter(); // Ziska presenter ve kterem je formular umiestneny.
        try {
            // Extrakce hodnot z formulara.
            $usermail = $form->getValues()->usermail;
            $password = $form->getValues()->password;

            // Zkusi zaregistrovat noveho pouzivatela.
            if ($register) {
                $firstName = $form->getValues()->firstName;
                $lastName = $form->getValues()->lastName;
                $employeeId = $form->getValues()->employeeId;
                $this->user->getAuthenticator()->register($usermail, $password, $employeeId, $firstName, $lastName);
$this->user->setExpiration('30 minutes', TRUE);
$this->user->login($usermail, $password);    // Skusi sa prihlasit.
           

            } else {

                // nastavenie expiracie - casu ako dlho bude pouzivatel prihlaseny
                $expiration = $form->getValues()->expiration;                       // expiracia 
                if ($expiration) {
                    $this->user->setExpiration('1 day', FALSE);              // ak bolo zasktnute nastavi sa na 1 den a aj po zavreti prehliadaca ostane prihlaseny
                } else {
                    $this->user->setExpiration('30 minutes', TRUE);           // ak nebolo zaskrtnute nastavi sa na 30 minut                              
                }

                $this->user->login($usermail, $password);                       // Skusi sa prihlasit.
                // Ak su zadane pouzivatelske instrukcie a formular je umiestneny v presentery
            }
            if ($instructions && $presenter) {
                // Ak instrukcie obsahuju spravu, tak ju posli do prislusneho presenteru.
                if (isset($instructions->message))
                    $presenter->flashMessage($instructions->message);

                // Ak instrukce obsahuju presmerovanie, tak ho urovb na prislusnom presentery.
                if (isset($instructions->redirection))
                    $presenter->redirect($instructions->redirection);
            }
        } catch (AuthenticationException $ex) { // Registracia alebo prihlasenie zlihalo.
            if ($presenter) { // Ak je formular v presentery.
                $presenter->flashMessage($ex->getMessage()); // Pošli chybovu spravu tam.
                $presenter->redirect('this'); // Urob peesmerovanie.
            } else { // Inak pridaj chybovu spravu aspon do samotneho formulara.
                $form->addError($ex->getMessage());
            }
        }
    }

    /**
     * Vracia formular so spolocnym zakladom.
     * @param null|Form $form formular
     * @return Form formular so spolocnym zakladom.
     */
    private function createBasicForm(Form $form = null) {
        $form = $form ? $form : new Form;
        $form->addText('usermail', 'E-mail:')
                ->setRequired('Please pick a your t-systems e-mail.')
                //  ->addRule($form::PATTERN, 'E-mail must be t-systems mail.', '.+(@t-systems).+')       // pattern pre mail "nieco@t-systems.nieco", iny nevezme... tvar meno.priezvisko@t-systems.com / .sk /.de a ine
                ->addRule($form::EMAIL, 'Email is not in correct form.');
        $form->addPassword('password', 'Password:');
        // ->addRule(Form::MAX_LENGTH, 'The password can have a maximum of %d characters', 20)           // maximalne 20 znakov moze mat heslo
        //->addRule(Form::MIN_LENGTH, 'Password must have at least %d characters', 3);                    // minimalne 3 znaky musi mat heslo

        return $form;
    }

    /**
     * Vracia prihlasovaci formular
     * @param null|Form $form formular - bud je null alebo prebrany zo zakladu 
     * @param null|ArrayHash $instructions pouzivatelske intrukcie
     * @return Form prihlasovaci formular
     */
    public function createLoginForm($instructions = null, Form $form = null) {

        $form = $this->createBasicForm($form);

        $form->addCheckbox('expiration', 'Remember me');                        // checkbox na zapametanie prihlasenia

        $form->addSubmit('submit', 'Sign in');                                  // tlacidlo na potvrdenie prihlasenia
        $form->onSuccess[] = function (Form $form) use ($instructions) {
            $this->login($form, $instructions);                                 // zavola sa funkcia login, ak vsetko prebehlo spravne
        };
        return $form;
    }

    /**
     * Vracia formular na registraciu.
     * @param null|Form $form formular
     * @param null|ArrayHash $instructions instruckie
     * @return Form registracny formular
     */
    public function createRegisterForm($instructions = null, Form $form = null) {

        $form = $this->createBasicForm($form);
        $form->addProtection('Expired protective timeout, please submit again.');

        $form->addPassword('password_repeat', 'Password again:')
                ->addRule(Form::EQUAL, 'Password not match.', $form['password'])
                ->setRequired('Must repeat password.');

        $form->addText('firstName', 'First name:')
                ->setRequired('Please pick a fisrt rname.');
        $form->addText('lastName', 'Last name:')
                ->setRequired('Please pick a last name.');

        $form->addText('employeeId', 'Your ID:')
                ->setRequired('Please pick your ID.');

        $form->addSubmit('register', 'Register');
        $form->onSuccess[] = function (Form $form) use ($instructions) {
            $this->login($form, $instructions, true);
        };
       
        $form->addCheckbox('regAgree', 'I have read and agree to the TERMS & CONDITIONS OF THE T-SYSTEMS SLOVAKIA.')
                ->setRequired('You must agree with the TERMS & CONDITIONS OF THE T-SYSTEMS SLOVAKIA.');
        
        return $form;
    }

}
