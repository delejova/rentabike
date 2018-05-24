<?php

namespace App\Model;

use App\Model\UserModel;
use Nette\Database\UniqueConstraintViolationException;
use Nette\Security\AuthenticationException;
use Nette\Security\IAuthenticator;
use Nette\Security\Identity;
use Nette\Security\Passwords;
use App\Model\RoleModel;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;

/**
 * Description of SignModel - Model pre prihlasovanie a registraciu.
 *
 * @author Domin6
 */
class SignModel extends UserModel implements IAuthenticator {

    private $validModel;
    
    public function __construct(\Nette\Database\Context $database, \App\Model\ValidModel $validModel) {
        parent::__construct($database);
        $this->validModel = $validModel;
    }
    
    /**
     * Prihlasovanie pouzivatela do systemu.
     * @param array $credentials        mail a heslo pouzivatela
     * @return Identity                 identitu pouzivatela na dalsiu manipulaciu
     * @throws AuthenticationException  Ak doslo k chybe pri prihlasovani (zly mail/heslo)
     */
    public function authenticate(array $credentials) {


        list($usermail, $password) = $credentials;          // Extrahuje parametre.      
        $user = $this->getByMail($usermail, 0);              // Z databazy tabulky user vrati prvy riadok vysledku/false, ak pouzivatel neexistuje.       

        if (!$user) {                                                                                           // Overenie pouzivatela.
            throw new AuthenticationException('The mail is incorrect.', self::IDENTITY_NOT_FOUND);              // Vyhodi vynimku, ak pouzivatel neexeistuje.
            // } elseif ($password !== $user->pswd) {           
        } elseif (!Passwords::verify($password, $user['pswd'])) {                                               // Overi heslo.                                                                                                                      
            throw new AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);          // Vyhodi vynimku, ak je zle heslo. 
        } elseif (Passwords::needsRehash($user['pswd'])) {                                                      // Zisti, ci heslo nepotrebuje prehashovat.
            $user->update(array('pswd' => Passwords::hash($password)));                                         // Rehashuje heslo.
        }

        // Priprava pouzivatelskych dat.   
        unset($user['pswd']);                                                           // Odstrani polozku hesla z pouzivatelskych dat (kvoli bezpecnosti).
        return new Identity($user['id'], $user['role_name'], $user);                     // Vrati novu identitu prihlaseneho pouzivatela.
    }

    /**
     * Registracia noveho pouzivatela do systemu.
     * @param string $usermail pouzivatelsky mail
     * @param string $password heslo
     * @throws DuplicateNameException Ak uz existuje pouzivatel s danym mailom.
     */
    public function register($usermail, $password, $employeeId, $firstName, $lastName) {
        try {

            // getGuid metoda volana z BaseModelu
            $guid = $this->getGuid();

            // ziskanie roly
            $rolaModel = new RoleModel($this->database);
            $id_role = '2';                                         // explicitne nastavene - menit roly zatial rucne v databaze! - zatial.. 2 employee                   
            $getRole = $rolaModel->getById($id_role, 0);                // ziska rolu z databazy tabulky Role  
            $role_name = $getRole->role_name;                       //$role_name = 'employee'; pre cislo 2 v tabulke
            // password_change dovymyslat
            $password_change = 0;

            $karma = 0;

            // status pouzivatela pri registracii je 'nepotvrdeny' - zmeni sa po skopirovani validacneho kodu z mailu
            $status = "unconfirmed";

            // validation code 
            $validation_code = $this->validModel->getValidCode($usermail);

            // datumy, casy
            $created_time = date("Y-m-d H:i:s");            // cas aktualny - nemeni sa
            $created_by = $usermail;                        // mail prihlaseneho aktualneho - nemeni sa
            $modified_time = date("Y-m-d H:i:s");           // pri update - menit sa vie
            $modified_by = "";                              // mail - vie sa menit 
            $is_deleted = 0;
            $time = 0;                              // 1 na servery / 0 na pocitaci berie 

            $token = '0';                          // na doplennie url linku ak pouzivatel zabudne heslo - na zaciatku 0, vygeneruje sa ine az pri zadani 'zabudol heslo' pouzivatela
            // vlozi pouzivatela do tabulky, hashovane heslo
            // napr. $this->insert('123456','4','meno_roly',11111,'mail@tsystem','Meno','Priezvisko','heslo',0,0,'status','valid_code',$datum,'domin',$datum,'domin',0,0);
            $this->insert($guid, $id_role, $role_name, $employeeId, $usermail, $firstName, $lastName, Passwords::hash($password), $password_change, $karma, $status, $validation_code, $created_time, $created_by, $modified_time, $modified_by, $is_deleted, $time, $token);

            $this->sendRegMail($usermail, $firstName, $lastName, $validation_code);             //poslanie mailu
            
        } catch (UniqueConstraintViolationException $e) {
            throw new DuplicateNameException;                                    // Vyhodi vynimku, ak pouzivatel s danym menom uz existuje.
        }
    }

    
    /**
     * Poslanie mailu pri registracii s validacnym kodom.
     */
    public function sendRegMail($usermail, $firstName, $lastName, $validationCode) {
        try {
            $mail = new Message;
            $latte = new \Latte\Engine;
            $params = [// parametre, ktore su pouzite v latte
                'firstName' => $firstName,
                'email' => $usermail,
                'lastName' => $lastName,
                'validationCode' => $validationCode
            ];

            $mail->setHtmlBody($latte->renderToString(__DIR__ . '/../templates/Mail/validation.latte', $params));           // pouyite validation.latte s parametrami
            $mail->setFrom('Hipsters <hipsteri@generacia.xyz>')
                    // ->addTo('domin.delejova@gmail.com');
                    ->addTo($usermail);
            //->setSubject('Completion of registration');
            // ->setHtmlBody('<p>Dobrý den, '. $firstName . ' ' . $lastName .',</p><p>posielam mailik s validacnym kodom: ' . $validationCode .'<br>Prosím skopirovat do validacneho formulara vo vasom ucte.</p><p>Vasi Hipstery ;)</p>');
            // ->setBody("Dobrý den," . $firstName . " " . $lastName . "\nposielam mailik s validacnym kodom:\n" . $validationCode . "\nVasi Hipstery ;)");

            $mailer = new SmtpMailer(array(
                // pre nezabezpecenu komunikaciu //
                //'host' => 'mail.generacia.xyz',
                //'port' => 25,
                // pre zabezpecenu komunikaciu //
                'host' => 'mail9.hostmaster.sk',
                'username' => 'hipsteri@generacia.xyz',
                'password' => 'euHF6H55kzyfrGTZcqGu',
                'port' => 465,
                'secure' => 'ssl'
            ));
            $mailer->send($mail);
        } catch (\Nette\Mail\SmtpException $e) {
            //\Tracy\Debugger::log('Problem s odoslanim emailu: ' . $e->getMessage());
            $this->flashMessage('There was an error sending email. Please try again later.');
        }
    }

    /** Ziska pouzivatela z databazy
     * @return boolean true ak existuje pouzivatel s danym mailom, false ak neexistuje
     */
    protected function userExist($mail) {
        $user = $this->getByMail($mail, 0);
        if ($user) {
            return true;
        }
        return false;
    }

}

/**
 * Vynimka pre duplicitne pouivatelske meno.
 * @package App\Model
 */
class DuplicateNameException extends AuthenticationException {

    // Konstruktor s definiciou zakladnej chybovej spravy.
    public function __construct() {
        parent::__construct();
        $this->message = 'User with this mail already exist.';
    }

}
