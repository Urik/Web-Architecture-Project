<?php

require_once "Thing.php";
require_once "IUser.php";

class User extends Thing implements IUser {

    /**
     * @var $id integer
     * @var $nick string
     * @var $password string
     */
    
    /** @var string */
    private $nick = "";
    /** @var string */
    private $password = "";
    /** @var string */
    private $email = "";
    /** @var DateTime */
    private $birthday;
    
    /** @var UserView */
    private $view;

    /**
     * 
     * @param string $nick
     * @param char[] $password
     * @param type $email
     * @param type $birthday
     */
    function __construct($id, $nick, $password, $email, DateTime $birthday) {
        parent::setId($id);
        $this->nick = $nick;
        $this->password = $password;
        $this->email = $email;
        $this->birthday = $birthday;
    }

    public function getNick() {
        return $this->nick;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getBirthday() {
        return $this->email;
    }
        
    public function setView($view) {
        $this->view = $view;
    }
    
    public function getVariablesAsMap() {
        $variables = array(
            "id" => $this->getId(),
            "nick" => $this->nick,
            "password" => $this->password,
            "email" => $this->email,
            "birth_date" => $this->birthday
        );
        return $variables;
    }
}
?>