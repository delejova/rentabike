<?php

namespace App\Model;

use App\Model\BaseModel;

/**
 * Description of ReceptionistModel
 *
 * @author Deny
 */
class ReceptionistModel extends BaseModel {

    // metoda pre ziskanie informacii o pouzivatelovi, ziska mail, meno, priezvisko atd. pre usra ktory je prave prihlaseny
    public function getUserById($id, $deleted) {
        return $this->database->query('CALL User_GetById(?,?)', $id, $deleted)->fetch();
    }

    // vsetky biky
    public function getAllBikes($deleted) {
        $return = $this->database->query('CALL Bike_GetAll(?)', $deleted)->fetchAll();
        return $return;
    }

    //vsetky informacie o bikoch pre dane miesto
    public function getByPlace($place, $deleted) {
        $return = $this->database->query('CALL Bike_BikeType_GetByPlace(?,?)', $place, $deleted)->fetchAll();
        return $return;
    }

    // vsetko o danom biku pre jeho id - bike+ biketype join
    public function getBikeById($id, $deleted) {
        $return = $this->database->query('CALL Bike_BikeType_GetById(?,?)', $id, $deleted)->fetch();
        return $return;
    }

    // vsetko o danom biku pre jeho id - bike+ biketype join
    public function getStatusRentById($id, $deleted) {
        $return = $this->database->query('CALL Rent_GetStatusById(?,?)', $id, $deleted)->fetch();
        return $return;
    }

    // vsetko o rent! rent+bike+biketype where status== rented || reserved (returned nebude v jej zozname)
    public function Rent_BikeType_Bike_GetAll($deleted) {
        $return = $this->database->query('CALL Rent_BikeType_Bike_GetAll(?)', $deleted)->fetchAll();
        return $return;
    }
    // vsetko o rent
    public function Rent_GetById($id,$deleted) {
        $return = $this->database->query('CALL Rent_getById(?,?)', $id,$deleted)->fetch();
        return $return;
    }
    

    //metoda ktora updatne rent, ked recepcna bike pozicia
    public function Rent_UpdateRented($id, $rent_start, $modified_time, $modified_by, $status, $time) {
        $return = $this->database->query('CALL Rent_UpdateRented(?,?,?,?,?,?)', $id, $rent_start, $modified_time, $modified_by, $status, $time);
    }

    //metoda ktoru pouzije recepcna ked poziciava bike, zmeni sa rent start, status
    public function getRented($email, $id) {
        $modified_time = date("Y-m-d H:i:s");
        $rent_start = date("Y-m-d H:i:s");
        $modified_by = $email;
        $time = 0;
        $status = 'rented';
        $this->Rent_UpdateRented($id, $rent_start, $modified_time, $modified_by, $status, $time);
    }

    //metoda ktora updatne rent, ked recepcna bike vrati
    public function Rent_UpdateReturned($id, $rent_end, $modified_time, $modified_by, $status, $time) {
        $return = $this->database->query('CALL Rent_UpdateRented(?,?,?,?,?,?)', $id, $rent_end, $modified_time, $modified_by, $status, $time);
    }

    //metoda ktoru pouzije recepcna ked vracia bike, zmeni sa rent end, status
    public function getReturned($email, $id) {
        $modified_time = date("Y-m-d H:i:s");
        $rent_end = date("Y-m-d H:i:s");
        $modified_by = $email;
        $time = 0;
        $status = 'returned';
        $this->Rent_UpdateRented($id, $rent_end, $modified_time, $modified_by, $status, $time);
    }

    //metoda ktora updatne rent-status + last_return
    public function Bike_UpdateStatusById($id, $status, $modified_time, $modified_by,$time) {
        $return = $this->database->query('CALL Bike_UpdateStatusById(?,?,?,?,?)', $id, $status, $modified_time, $modified_by,$time);
    }
    //updatne rent-status
    public function Bike_UpdateStatusLastReturnById($id, $status, $last_return, $modified_time, $modified_by,$time) {
        $return = $this->database->query('CALL Bike_UpdateStatusLastReturnById(?,?,?,?,?,?)', $id, $status, $last_return, $modified_time, $modified_by,$time);
    }
    // zmena v tabulke bike po vrateni
    public function returnBike($email,$bike_id){
        $modified_time = date("Y-m-d H:i:s");
        $last_return = date("Y-m-d H:i:s");
        $modified_by = $email;
        $status = 'free';
        $time = 0;
        $this->Bike_UpdateStatusLastReturnById($bike_id, $status, $last_return, $modified_time, $modified_by,$time);
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
    //TODO
    // zmena v tabulke bike po pozicani
    public function rentBike($email,$bike_id){
        $modified_time = date("Y-m-d H:i:s");
        $modified_by = $email;
        $status = 'rented';
        $time = 0;
        $this->Bike_UpdateStatusById($bike_id, $status, $modified_time, $modified_by,$time);
    }

}
