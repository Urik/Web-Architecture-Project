<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Thing
 *
 * @author Usuario
 */
class Thing {
    private $id = 0;
    
    private $DAO;
    
    /**
     * Gets the id of the object.
     * @return int
     */
    public function getId() {
        return $this->id;
    }
    
    public function getDAO() {
        return $this->DAO;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setDAO($DAO) {
        $this->DAO = $DAO;
    }


}

?>
