<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

use App\Model\BaseModel;
use Nette\Database\Context;

/**
 * Description of RoleModel - Praca s tabulkou role
 *
 * @author Domin6
 */
class RoleModel extends BaseModel {
       
    // vrati celu tabulku
    public function getAll($deleted){
        $return = $this->database->query('CALL Role_GetAll(?)', $deleted)->fetchAll();
        return $return;
    } 

    // vrati riadok podla id
    public function getById($id, $deleted){
        return $this->database->query('CALL Role_GetById(?,?)', $id, $deleted)->fetch();
    }
   
    // vlozi rolu do tabulky
    public function insert($in_guid, $in_role_name, $in_created_time, $in_created_by, $in_modified_time, $in_modified_by,$in_is_deleted,$in_time){
        $result = $this->database->query('CALL Role_InsertById(?,?,?,?,?,?,?,?)', $in_guid, $in_role_name, $in_created_time, $in_created_by, $in_modified_time, $in_modified_by,$in_is_deleted,$in_time);
    }
  
    // update roly
    public function updateById($in_id, $in_role_name, $in_created_time, $in_created_by, $in_modified_time, $in_modified_by,$in_is_deleted,$in_time){
        $result = $this->database->query('CALL Role_UpdateById(?,?,?,?,?,?,?,?)', $in_id, $in_role_name, $in_created_time, $in_created_by, $in_modified_time, $in_modified_by,$in_is_deleted,$in_time);
    }
    
    // zavola funkciu delete, ktora oznaci rolu za vymazanu
    public function deleteById($id){
        $result = $this->database->query('CALL Role_DeleteById(?)', $id);
    }
    
    
}
