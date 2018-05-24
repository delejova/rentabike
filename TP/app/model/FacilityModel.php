<?php

namespace App\Model;

use App\Model\BaseModel;

/**
 * Description of FacilityModel
 *
 * @author Deny
 */
class FacilityModel extends BaseModel {

    protected function getGuid() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function getByPlace($place, $deleted) {
        $return = $this->database->query('CALL Bike_BikeType_GetByPlace(?,?)', $place, $deleted)->fetchAll();
        return $return;
    }

// metoda pre ziskanie informacii o pouzivatelovi, ziska mail, meno, priezvisko atd. pre usra ktory je prave prihlaseny
    public function getUserById($id, $deleted) {
        return $this->database->query('CALL User_GetById(?,?)', $id, $deleted)->fetch();
    }

//najde vsetky  biketypy
    public function getAllTypes($deleted) {
        $return = $this->database->query('CALL BikeType_GetAll(?)', $deleted)->fetchAll();
        return $return;
    }

//najde biketype podla id
    public function getTypeById($id, $deleted) {
        $return = $this->database->query('CALL BikeType_GetById(?,?)', $id, $deleted)->fetch();
        return $return;
    }

//najde biketype podla id
    public function getBikeById($id, $deleted) {
        $return = $this->database->query('CALL Bike_GetById(?,?)', $id, $deleted)->fetch();
        return $return;
    }

// vlozi biketype do tabulky
    public function insertType($guid, $bike_name, $photo_filename, $color, $size, $gears, $max_speed_kmh, $max_load_kg, $range_km, $weight_kg, $created_time, $created_by, $modified_time, $modified_by, $is_deleted, $time) {
        $result = $this->database->query('CALL BikeType_Insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', $guid, $bike_name, $photo_filename, $color, $size, $gears, $max_speed_kmh, $max_load_kg, $range_km, $weight_kg, $created_time, $created_by, $modified_time, $modified_by, $is_deleted, $time);
    }

//funkcia pre vlozenie noveho typu biku do DB, vyuziva insert a poslane parametre z formulara
    public function addNewType($guid, $email, $bike_name, $photo_filename, $color, $size, $gears, $max_speed_kmh, $max_load_kg, $range_km, $weight_kg) {
//        $guid = $this->getGuid();
        $created_time = date("Y-m-d H:i:s");
        $created_by = $email;
        $modified_time = date("Y-m-d H:i:s");
        $modified_by = $email;
        $is_deleted = 0;
        $time = 0;
        $this->insertType($guid, $bike_name, $photo_filename, $color, $size, $gears, $max_speed_kmh, $max_load_kg, $range_km, $weight_kg, $created_time, $created_by, $modified_time, $modified_by, $is_deleted, $time);
    }

//vlozi bike do tabulky
    public function insertBike($guid, $id_bike_type, $bike_number, $place, $status, $last_return, $created_time, $created_by, $modified_time, $modified_by, $is_deleted, $time) {
        $result = $this->database->query('CALL Bike_Insert(?,?,?,?,?,?,?,?,?,?,?,?)', $guid, $id_bike_type, $bike_number, $place, $status, $last_return, $created_time, $created_by, $modified_time, $modified_by, $is_deleted, $time);
    }

//funkcia pre vlozenie noveho biku do DB, vyuziva insert a poslane parametre z formulara
    public function addNewBike($email, $id_bike_type, $bike_number, $place) {
        $guid = $this->getGuid();
        $created_time = date("Y-m-d H:i:s");
        $created_by = $email;
        $modified_time = date("Y-m-d H:i:s");
        $modified_by = $email;
        $is_deleted = 0;
        $time = 0;
        $status = 'free';
        $last_return = null;
        $this->insertBike($guid, $id_bike_type, $bike_number, $place, $status, $last_return, $created_time, $created_by, $modified_time, $modified_by, $is_deleted, $time);
    }

    public function updateBike($id, $id_bike_type, $bike_number, $place, $status, $last_return, $modified_time, $modified_by, $is_deleted, $time) {
        $result = $this->database->query('CALL Bike_UpdateById(?,?,?,?,?,?,?,?,?,?)', $id, $id_bike_type, $bike_number, $place, $status, $last_return, $modified_time, $modified_by, $is_deleted, $time);
    }

    public function deleteBikeById($id) {
        $result = $this->database->query('CALL Bike_DeleteById(?)', $id);
    }

    public function editBike($id, $email, $id_bike_type, $bike_number, $place, $status) {
        $modified_time = date("Y-m-d H:i:s");
        $modified_by = $email;
        $is_deleted = 0;
        $time = 0;
        $last_return = null;
        $this->updateBike($id, $id_bike_type, $bike_number, $place, $status, $last_return, $modified_time, $modified_by, $is_deleted, $time);
    }
    //NOT USED YET
    //selektne vsetky typy issues pre konkretny biketype: scooter, bike, ebike
    public function IssueType_GetAll($deleted) {
        return $this->database->query('CALL IssueType_GetAll(?,?)', $biketype, $deleted)->fetchAll();
    }

}
