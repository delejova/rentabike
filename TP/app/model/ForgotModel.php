<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

use App\Model\UserModel;
use Nette\Security\Passwords;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;
use Nette\Bridges\ApplicationLatte\UIMacros;

/**
 * Description of ForgotModel
 *
 * @author Domin6
 */
class ForgotModel extends UserModel {
    
    /**
     * Vykona zmenu tokenu podla mailu pouzivatela.
     * @param string $email     email pouzivatela
     * @param string $token     token - 0 ak ma zmenit na nulu, 1 ak ma vygenerovat novy
     */
    public function updateToken($email, $token) {

        // kontrola ci je $token nula alebo iny znak
        if ($token != '0'){
            $token = $this->generateToken($email);        // ak nie je nula, vygeneruje sa novy token
        } else {
            $token = '0';                           // ak je nula, zostane nula
        }
        
        $modified_time = date("Y-m-d H:i:s");           // pri update sa meni
        $modified_by = $email;                          // mail pouzivatela
        $is_deleted = 0;
        $time = 0;                                      // 1 na servery / 0 na pocitaci berie 

        $this->UpdateTokenByEmail($email, $token, $modified_time, $modified_by, $is_deleted, $time);        // vykona zmenu tokenu podla emailu v dtb
    }

    /**
     * Vygeneruje novy token.
     * @return string token
     */
     public function generateToken($email) {
        
        // nahodne znaky
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $charactersLength; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $token = sprintf('%04X%04X-%04X-%04X-%04X-%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535)) . $email . $randomString . sprintf('%04X%04X-%04X-%04X-%04X-%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535));          // vygenerovany nahodny token
        return $token;
   
     }
    
    /**
     * Posle mail s jedinencnym odkazom pre url na zmenu hesla.
     * @param type $usermail
     * @param type $presenter
     * @param type $template
     * @return boolean
     */
    public function forgotPasswordSendMail($usermail, $presenter, $template) {
        try {
            $user = $this->getByMail($usermail, 0);            // ziska pouzivatela z databazy
            if ($user && $user['status'] == 'active') {       // ak pouzivatel existuje a je active, posle mail s heslom
                $latte = new \Latte\Engine;
                //$presenter = $this->getPresenter();
                //$template = $this->createTemplate()->setFile(__DIR__ . '/../templates/Mail/forgotlink.latte');
                $params = [
                    'token' => $user['token'],
                    'firstName' => $user['first_name'],
                    'lastName' => $user['last_name'],
                    '_presenter' => $presenter, // kvůli makru {plink}
                    '_control' => $presenter    // kvůli makru {link}    
                ];

                $template->setParameters($params);
                //$template->link = $this->link('//Sign:changepswd', array('token' => $user['validation_code']));

                UIMacros::install($latte->getCompiler());

                $mail = new Message;
                $mail->setHtmlBody((string) $template);

                $mail->setFrom('Hipsters <hipsteri@generacia.xyz>')
                        ->addTo($user['email']);

                $mailer = new SmtpMailer(array(
                    // pre zabezpecenu komunikaciu //
                    'host' => 'mail9.hostmaster.sk',
                    'username' => 'hipsteri@generacia.xyz',
                    'password' => 'euHF6H55kzyfrGTZcqGu',
                    'port' => 465,
                    'secure' => 'ssl'
                ));
                $mailer->send($mail);
                return true;
            }
            return false;
        } catch (\Nette\Mail\SmtpException $e) {
            //\Tracy\Debugger::log('Problem s odoslanim emailu: ' . $e->getMessage());
            $this->flashMessage('There was an error sending email. Please try again later.');
        }
    }

    /**
     * ziska pouzivatela podla tokenu
     * @param string $token
     * @return array user/null
     */
    public function tokenExist($token) {
        if ($token === '0') return null;                   // kontrola druha ci je token nula (kazdy pouzivatel ma na zaciatku nula)
        $user = $this->getByToken($token, 0);            // ziska pouzivatela z databazy
        if ($user) {
            unset($user['pswd']);                       // ak ziskalo pouzivatela z dtb odstrani heslo a dalej vrati uz iba riadok z dtb bez hesla
            return $user;
        }
        return null;                                    // ak neni user, vrati null
    }

    /**
     * Funkcia podla pouyivatelskeh mailu najde pouzivatela a zmeni mu stare heslo na nove.
     * @param string $email         email pouzivatela, ktoremu sa meni heslo
     * @param string $password      nove heslo
     */
    public function changeForgotPswd($email, $password) {
        try {
            $user = $this->getByMail($email, 0);            // ziska pouzivatela z databazy podla mailu
            if ($user) {
                $email = $user['email'];                        // mail pouzivatela, ktoremu sa meni heslo
                $modified_time = date("Y-m-d H:i:s");           // cas zmeny
                $modified_by = $user['email'];                  // mail toho kto menil - teraz samotny user
                $is_deleted = 0;                                // je medzi nevymazanymi                   
                $time = 0;

                // zmena hesla
                $this->updatePswdByEmail($email, Passwords::hash($password), $modified_time, $modified_by, $is_deleted, $time);    // zmeni heslo, vklada do dtb zahashovane heslo
                
                // zmena token-u na nulu
                $this->updateToken($email, '0');
                
                }
        } catch (\Nette\FileNotFoundException $e) {
            // \Tracy\Debugger::log('Nenaslo pouzivatela v databaze: ' . $e->getMessage());
            $this->flashMessage('User does not exist to change forgot password..');
        }
    }

}
