<?php

abstract class DAO {

    /**
     * $properties should be an array of type ["field" => "value"]
     * Returns an array of the objects that satisfy certain property.
     */
    public abstract function getByValues($properties);

    public abstract function get($id);
    
    public function performQuery($table, $values, $connection) {
        $query = "SELECT * 
            FROM $table 
        WHERE ";
        foreach ($values as $name => $value) {
            $query .= "$name = $value AND";
        }
        //Deletes the last AND from the query
        $query = substr($query, 0, strlen($query) - strrpos($query, "AND"));
        $result = mysql_query($query, $connection) or die(mysql_error());
        $rows = array();
        
        while ($row = mysql_fetch_array($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}

?>
