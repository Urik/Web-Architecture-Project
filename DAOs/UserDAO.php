<?php
require_once "DAO.php";
require_once (dirname(__FILE__) . "/../Others/user.php");
require_once (dirname(__FILE__) . "/../Controllers/DBConnection.php");
require_once (dirname(__FILE__) . "/DAOCommonImpl.php");
require_once (dirname(__FILE__) . "/../Exceptions/UserCreationException.php");

class UserDAO extends DAO
{
    private $tableName = "users";

    /**
     *
     * @param string $id
     * @return User
     */
    public function get($id)
    {
        $connection = (new DBConnection())->connect();
        $parameters = array(
            "id" => $id
        );
        $rows = parent::performQuery($this->tableName, $parameters, $connection, null, null);
        $user = null;
        if (count($rows) > 0) {
            $row = $rows[0];
            $user = new User($row["id"], $row["nick"], $row["password"], $row["email"], new DateTime($row["birth_date"]));
        }
        return $user;
    }

    /**
     * Returns an array of User conatining all the users matching certain criteria.
     * @param type $properties An array of the form "columnName => value".
     * @return User[]
     */
    public function getByValuesWithLimit($properties, $limit, $offset)
    {
        $connection = (new DBConnection())->connect();
        $userRows = parent::performQuery($this->tableName, $properties, $connection, $limit, $offset);
        $users = array();
        foreach ($userRows as $row) {
            $user = new User(
                $row["id"],
                $row["nick"],
                $row["password"],
                $row["email"],
                new DateTime($row["birth_date"]));
            $user->setDAO($this);
            $users[] = $user;

        }
        return $users;
    }

    /**
     *
     * @param User $object
     * @return boolean
     */
    public function delete($object)
    {
        return (new DAOCommonImpl())->delete($object->getId(), $this->tableName);
    }

    /**
     *
     * @param User $object
     * @return boolean
     */
    public function update($object)
    {
        $variables = $object->getVariablesAsMap();
        return (new DAOCommonImpl())->update($variables, $this->tableName);
    }

    /**
     * @param $variables
     * @throws UserCreationException
     */
    public function create($variables)
    {
        $connection = (new DBConnection())->connect();
        try {
            (new DAOCommonImpl())->create($variables, $this->tableName, $connection);
        } catch (DBErrorException $e) {
            throw new UserCreationException('Error creating ' . implode(", ", $variables));
        }
    }
}

?>
