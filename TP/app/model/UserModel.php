<?php

namespace App\Model;

use App\Model\BaseModel;

/**
 * Description of UserModel - pre pracu s tabulkou User
 *
 * @author Domin6
 */
class UserModel extends BaseModel {
  
    /**
     * Vrati celu tabulku.
     * @param int $deleted  (1) vymazane aj nevymazane, cize vsetky / (0) dostane vsetky nevymazane polozky
     */
    public function getAll($deleted) {
        $return = $this->database->query('CALL User_GetAll(?)', $deleted)->fetchAll();
        return $return;
    }

    /**
     * Vrati riadok podla id.
     * @param int $id       id podla ktoreho pouzivatela vymaze
     * @param int $deleted  (0) z nevymazanach poloziek/ (1) zo vsetkych (aj vymazanych)
     */
    public function getById($id, $deleted) {
        return $this->database->query('CALL User_GetById(?,?)', $id, $deleted)->fetch();
    }

     /**
     * Vrati riadok podla jedinecneho mailu.
     * @param string $email    jedinecny e-mail pouzivatela
     * @param int $deleted     na oznacenie ci hladat vo aj vymazanych (1) polozkach alebo iba (0) z nevymazanych poloziek
     */
    public function getByMail($email,$deleted){
        return $this->database->query('CALL User_GetByMail(?,?)', $email, $deleted)->fetch();
    }
    
    /**
     * Vlozi pouzivatela do tabulky.
     * @param int $guid     jedinecny identifikator pre celu databazu
     * @param int $id_role          rola pouzivatela 
     * @param string $role_name     meno roly pouzivatela
     * @param type $employee_id
     * @param type $email
     * @param type $first_name
     * @param type $last_name
     * @param type $pswd
     * @param type $password_change
     * @param type $karma
     * @param type $status
     * @param type $validation_code
     * @param type $created_time
     * @param type $created_by
     * @param type $modified_time
     * @param type $modified_by
     *  @param int $deleted      vymazany(1)/nevymazany(0)
     * @param int $time          cas pouzivatelky/databazovy 
     * @param string $token      na doplnenie url, ak pouzivatel zabudne heslo - posle sa mu link 
     */
    public function insert($guid, $id_role, $role_name, $employee_id, $email, $first_name, $last_name, $pswd, $password_change, $karma, $status, $validation_code, $created_time, $created_by, $modified_time, $modified_by, $is_deleted, $time, $token) {
        $result = $this->database->query('CALL User_Insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', $guid, $id_role, $role_name, $employee_id, $email, $first_name, $last_name, $pswd, $password_change, $karma, $status, $validation_code, $created_time, $created_by, $modified_time, $modified_by, $is_deleted, $time, $token);
    }

 
    /**
     * Zavola funkciu delete, ktora oznaci rolu za vymazanu. Oznaci ju v databaze stlpci deleted ako 1.
     * @param int $id      id podla ktoreho pouzivatela vymaze
     */
    public function deleteById($id) {
        $result = $this->database->query('CALL User_DeleteById(?)', $id);
    }

    /**
     * Zmeni $status pouzivatela v databaze podla jeho id. 
     * @param int $id      id podla ktoreho pouzivatela najde
     * @param string $status      status na ktory sa zmeni
     * @param date $modified_time      cas kedy zmena prebehla
     * @param string $modified_by      mail pouzivatela ktory urobil zmenu
     * @param int $is_deleted      oznacenie ci ide o pouzivatela vymazaneho/nevymazaneho
     * @param int $time      oznacenie casu - serverovy/pouzivatelsky 
     */
    public function updateStatusById($id, $status, $modified_time, $modified_by, $is_deleted, $time){
        $result = $this->database->query('CALL User_UpdateStatusById(?,?,?,?,?,?)', $id, $status, $modified_time, $modified_by, $is_deleted, $time);
    }
    
    /**
     * Zavola storovanu proceduru na ziskanie pouzivatela z databazy podla tokenu.
     * @param string $token      token pouzivatela
     * @param int $deleted      hlada v nevymazanych/vsetkych pouzivateloch
     * @return user pouzivatel - riadok v dtb
     */
    public function getByToken($token, $deleted){
        return $this->database->query('CALL User_GetByToken(?,?)', $token, $deleted)->fetch();
    }  
    
    /**
     * Zmena hesla podla emailu.
     * @param string $email       mail
     * @param string $pswd        heslo
     * @param type $modified_time
     * @param type $modified_by
     * @param type $is_deleted
     * @param type $time
     */
    public function updatePswdByEmail($email, $pswd, $modified_time, $modified_by, $is_deleted, $time){
        $result = $this->database->query('CALL User_UpdatePswdByEmail(?,?,?,?,?,?)', $email, $pswd, $modified_time, $modified_by, $is_deleted, $time);   
    }
    
    /**
     * Zmeni token podla emailu v databaze.
     * @param type $email
     * @param type $token
     * @param type $modified_time
     * @param type $modified_by
     * @param type $is_deleted
     * @param type $time
     */
    public function UpdateTokenByEmail($email, $token, $modified_time, $modified_by, $is_deleted, $time){
        $result = $this->database->query('CALL User_UpdateTokenByEmail(?,?,?,?,?,?)', $email, $token, $modified_time, $modified_by, $is_deleted, $time);
    }
         
    
}