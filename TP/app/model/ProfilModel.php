<?php

namespace App\Model;

use App\Model\BaseModel;

/**
 * Description of ProfilModel
 *
 * @author Deny
 */
class ProfilModel extends BaseModel {

    // metoda pre ziskanie informacii o pouzivatelovi, ziska mail, meno, priezvisko atd. pre usra ktory je prave prihlaseny
    public function getUserById($id, $deleted) {
        return $this->database->query('CALL User_GetById(?,?)', $id, $deleted)->fetch();
    }
    
    // vsetko o rent
    public function Rent_GetById($id,$deleted) {
        $return = $this->database->query('CALL Rent_getById(?,?)', $id,$deleted)->fetch();
        return $return;
    }

    // vsetko o rent pre usra: rent+bike+biketype where status ==  reserved 
    public function Rent_BikeType_Bike_GetAllByUser_Reserved($id_user,$deleted) {
        $return = $this->database->query('CALL Rent_BikeType_Bike_GetAllByUser_Reserved(?,?)', $id_user,$deleted)->fetchAll();
        return $return;
    }
    // vsetko o rent pre usra:  rent+bike+biketype where status== rented 
    public function Rent_BikeType_Bike_GetAllByUser_Rented($id_user,$deleted) {
        $return = $this->database->query('CALL Rent_BikeType_Bike_GetAllByUser_Rented(?,?)', $id_user,$deleted)->fetchAll();
        return $return;
    }
    // vsetko o rent pre konkretne id, pre editaciu:  rent+bike+biketype 
    public function Rent_BikeType_Bike_GetById($id,$deleted) {
        $return = $this->database->query('CALL Rent_BikeType_Bike_GetById(?,?)', $id,$deleted)->fetch();
        return $return;
    }
    
    public function deleteRentById($rent_id){
        $return = $this->database->query('CALL Rent_DeleteById(?)',$rent_id);
        
    }
    
    //storovana procedura ktora updatne rent, updatuje book start a book end
    public function Rent_UpdateBookTime($id, $book_start, $book_end, $modified_time, $modified_by, $time) {
        $return = $this->database->query('CALL Rent_UpdateBookTime(?,?,?,?,?,?)', $id, $book_start, $book_end, $modified_time, $modified_by, $time);
    }

    //updatnutie rent ked pouzivatel edituje svoj booking
    public function updateBookTime($email, $id, $book_start,$book_end) {
        $modified_time = date("Y-m-d H:i:s");
        $modified_by = $email;
        $time = 0;
        $this->Rent_UpdateBookTime($id, $book_start,$book_end, $modified_time, $modified_by,  $time);
    }
    
   //metoda ktora updatne rent-status 
    public function Bike_UpdateStatusById($id, $status, $modified_time, $modified_by,$time) {
        $return = $this->database->query('CALL Bike_UpdateStatusById(?,?,?,?,?)', $id, $status, $modified_time, $modified_by,$time);
    }
    // zmena v tabulke bike po vrateni
    public function setBikeFree($email,$bike_id){
        $modified_time = date("Y-m-d H:i:s");
        $modified_by = $email;
        $status = 'free';
        $time = 0;
        $this->Bike_UpdateStatusById($bike_id, $status, $modified_time, $modified_by,$time);
    }
    
    
    
}
