<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



namespace App\Model;

use App\Model\BaseModel;

/**
 * Description of PlaceModel
 *
 * @author Deny
 */
class BookModel extends BaseModel {

    //vytiahnutie vsetkych informacii o biku- join bike + biketype tabulky
    public function getById($id, $deleted) {
        $return = $this->database->query('CALL Bike_BikeType_GetById(?,?)', $id, $deleted)->fetch();
        return $return;
    }
    
    // metoda pre ziskanie informacii o pouzivatelovi, ziska mail, meno, priezvisko atd. pre usra ktory je prave prihlaseny
     public function getUserById($id, $deleted) {
        return $this->database->query('CALL User_GetById(?,?)', $id, $deleted)->fetch();
    }

    //insert do tabulky rent
    public function rent_insert($guid, $id_bike, $id_user, $id_employee, $first_name, $last_name, $book_start, $book_end, $rent_start, $rent_end, $created_time, $created_by, $modified_time, $modified_by, $is_deleted, $status, $time) {
        $result = $this->database->query('CALL Rent_Insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', $guid, $id_bike, $id_user, $id_employee, $first_name, $last_name, $book_start, $book_end, $rent_start, $rent_end, $created_time, $created_by, $modified_time, $modified_by, $is_deleted, $status, $time);
    }
   

    //rezervovanie konkretneho biku na konkretny cas - insert do tabulky rent
    public function book($email, $id_bike, $id_user, $first_name, $last_name, $employee_id, $book_start, $book_end) {
        $guid = $this->getGuid();
        $rent_start = null; //toto sa bude vyplnat ked recepcna odovzda kluce od biku
        $rent_end = null; //toto sa bude vyplnat ked recepcna odovzda kluce od biku
        $status = "reserved";
        $created_time = date("Y-m-d H:i:s");
        $created_by = $email;                      
        $modified_time = date("Y-m-d H:i:s");
        $modified_by = $email;                        
        $is_deleted = 0;
        $time = 0;                              // 1 na servery / 0 na pocitaci berie 
        $this->rent_insert($guid, $id_bike, $id_user, $employee_id, $first_name, $last_name, $book_start, $book_end, $rent_start, $rent_end, $created_time, $created_by, $modified_time, $modified_by, $is_deleted, $status, $time);
    }

    
     //metoda ktora updatne rent-status + last_return
    public function Bike_UpdateStatusById($id, $status, $modified_time, $modified_by,$time) {
        $return = $this->database->query('CALL Bike_UpdateStatusById(?,?,?,?,?)', $id, $status, $modified_time, $modified_by,$time);
    }
    
     //TODO
    // zmena v tabulke bike po reservovani
    public function reserveBike($email,$bike_id){
        $modified_time = date("Y-m-d H:i:s");
        $modified_by = $email;
        $status = 'reserved';
        $time = 0;
        $this->Bike_UpdateStatusById($bike_id, $status, $modified_time, $modified_by,$time);
    }
}
