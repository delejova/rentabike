<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

use Nette\Database\Context;
use Nette\Object;
/**
 * Description of BaseModel
 *
 * @author Domin6
 */
class BaseModel extends Object {
    
    /** @var Vytvorenie objektu databazy */
    protected $database;
    
    /** Konstructor */
    public function __construct(Context $database) {
        $this->database = $database;
    }
    
    /**
     * Vytvori guid.
     * @return int $guid        guid - jedinecny znak riadku pre celu databazu
     */
   protected function getGuid() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
    
}
