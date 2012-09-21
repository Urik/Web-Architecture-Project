<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAO
 *
 * @author Usuario
 */
abstract class DAO {
    /**
     * $properties should be an array of type ["field" => "value"]
     * Returns an array of the objects that satisfy certain property.
     */
    public abstract function getByValues($properties);
    
    public abstract get($id);
}

?>
