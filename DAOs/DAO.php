<?php

abstract class DAO {

    /**
     * $properties should be an array of type ["field" => "value"]
     * Returns an array of the objects that satisfy certain property.
     */
    public abstract function getByValues($properties);

    /**
     * Gets an object by its ID.
     */
    public abstract function get($id);
        
    /**
     * Updates an object on the database.
     */
    public abstract function update($object);
        
    /**
     * Deletes an object from the database.
     */
    public abstract function delete($object);
    
    /**
     * 
     * @param type $table The name of the table for the query.
     * @param type $values A map of the form columnName => value
     * @param type $connection The DB connection
     * @return type An array containing arrays that represent each row.
     */
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
