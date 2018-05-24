<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

use App\Model\UserModel;

/**
 * Description of ValidModel
 *
 * @author Domin6
 */
class ValidModel extends UserModel {
    
    
    /**
     * Validacny kod, ktory musi pouzitalel zadat pri registracii z mailu.
     * @return string code     validacny kod pri registracii odoslany mailom
     */
    public function getValidCode($email) {

        // nahodne znaky
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $charactersLength; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $code = $randomString . sprintf('%04X%04X-%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));          // vygenerovany nahodny validacny kod
        
        return $code;
    }
  
    /** zmenit status pouzivatela na active 
     * @return boolean true ak sa podarilo ymenit stav, false ak nie
     */
    public function changeValidToActive($validationCode, $idUser) {

        $status = 'active';                              // $user['status'] = 'active'
        $user = $this->getById($idUser, 0);
        $modified_time = date("Y-m-d H:i:s");           // pri update sa meni
        $modified_by = $user['email'];                  // mail sa meni pri update
        $is_deleted = 0;
        $time = 0;                                      // 1 na servery / 0 na pocitaci berie 
        //co existuje user a overenie ci pasuje validationCode z tabulky s tym, co bolo zadane z formulara.          
        if ($user) {
            if (($user['status'] === 'unconfirmed') && ($user['validation_code'] === $validationCode)) {
                $this->updateStatusById($idUser, $status, $modified_time, $modified_by, $is_deleted, $time);            //updateStatus - na active .. pomocou storovanej procedury         
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    
}
