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
class PlaceModel extends BaseModel {

      public function getAll($deleted){
        $return = $this->database->query('CALL Bike_GetAll(?)', $deleted)->fetchAll();
        return $return;
    } 
    
    public function getByPlace($place,$deleted){
        $return = $this->database->query('CALL Bike_BikeType_GetByPlace(?,?)',$place,$deleted)->fetchAll();
        return $return;
    } 
}
