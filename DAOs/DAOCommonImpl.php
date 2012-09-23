<?php

class DAOCommonImpl {
    public function update($table, $parameters) {
        $connection = (new DBConnection())->connect();
        $sql = 'UPDATE ' . $table . 
                'SET ';
        foreach ($parameters as $name => $value) {
            if (strcmp($name, "id") != 0) {
                $sql .= $name . '=' . $value . ', ';
            }
            //Deletes the last AND from the query
            $sql = substr($sql, 0, strlen($sql) - strrpos($sql, ', '));
            $sql .= 'WHERE id = ' . $parameters["id"];
        }
        $success = mysql_query($sql, $connection);
        mysql_close($connection);
        return $success;
    }
    
    public function delete($id, $table) {
        $connection = (new DBConnection())->connect();
        $sql = 'DELETE FROM ' . $table . 
                'WHERE id = ' . $id;
        $success = mysql_query($sql, $id);
        mysql_close($connection);
        return $success;
    }
}

?>
