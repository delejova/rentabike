<?php

namespace App\Presenters;

use App\Forms\UserForms;
use App\Presenters\BasePresenter;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use Tracy\Debugger;
use App\Model\SignModel;
use Nette\Http\Session;


/**
 * Prihlasovanie, odhlasovanie
 * @package App\CoreModule\Presenters
 */
class SignPresenter extends BasePresenter {

    /** @var UserForms Factory na pouzivatelske formulare. */
    private $userFormsFactory;

    /** @var array Spolocne instrukcie pre prihlasovaci a registracny formular */
    private $instructions;

    /** @var SignModel premenna pre SignModel */
    private $signModel;

    /** @var Session session */
    private $session;

    /**
     * Konstruktor s injektovanou factory na pouzivatelske formulare.
     * @param UserForms $userForms automaticky injektovaná trieda factory na formulare
     */
    public function __construct(UserForms $userForms, SignModel $signModel) {
        parent::__construct();
        $this->userFormsFactory = $userForms;
        $this->signModel = $signModel;
    }

    /** Vola sa pred kazdou akciou presenteru a inicializuje spolocne premenne. */
    public function startup() {
        parent::startup();

        $this->session = $this->getSession('Sign');

        $this->instructions = array(
            'message' => null,
            'redirection' => ':Profil:default'
        );
    }

    /** Ak je pouzivatel uz prihlaseny, presmerovanie na default - profil pouzivatela */
    public function actionLogin() {
        if ($this->getUser()->isLoggedIn()) {
            $this->redirect(':Profil:default');
        }
    }

    /**
     * Odhlasenie pouzivatela 
     */
    public function actionLogout() {
        $this->getUser()->logout();
        $this->redirect(':Sign:login');
    }

      /**
     *  Vracia komponentu prihlasovaci formular z factory
     * @return Form prihlasovaci formular
     */
    protected function createComponentLoginForm() {
        // $this->instructions['message'] = 'You have been successfully logged in.';
        return $this->userFormsFactory->createLoginForm(ArrayHash::from($this->instructions));
    }

    /**
     * Vracia komponentu registrecny formular z factory.
     * @return Form registracny formular
     */
    protected function createComponentRegisterForm() {
        $this->instructions['message'] = 'New account has been successfully registered. We sent you an e-mail with a validation code to confirm registration.';
        return $this->userFormsFactory->createRegisterForm(ArrayHash::from($this->instructions));
    }

    
    
}
