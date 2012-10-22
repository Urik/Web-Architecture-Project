<?php

class DAOCommonImpl {

    public function update($parameters, $table) {
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


    /**
     * @param $variables
     * @param $tableName
     * @param $connection
     * @return bool
     * @throws DBErrorException
     */
    public function create($variables, $tableName, $connection) {
        if (count($variables) == 0) {
            return false;
        } else {
            $sql = 'INSERT INTO ' . $tableName . ' ';
            $columns = '';
            $values = '';
            foreach ($variables as $key => $value) {
                $columns .= $key . ', ';
                $values .= $value . ', ';
            }
            $columns = substr($columns, 0, strrpos($columns, ", "));
            $values = substr($values, 0, strrpos($values, ", "));
            $sql .= '(' . $columns . ') VALUES (' . $values . ')';
            $success = mysql_query($sql, $connection);
            if ($success == false) {
                throw new DBErrorException('Error saving ' . $variables . ' to ' . $tableName);
            }
        }
    }

}

?>
