<?php

require_once "Thing.php";
require("IUser.php");

class User extends Thing implements IUser {

    /**
     * @var $id integer
     * @var $nick string
     * @var $password string
     */
    
    private $id = 0;
    /** @var string */
    private $nick = "";
    /** @var string */
    private $password = "";
    /** @var string */
    private $email = "";
    /** @var DateTime */
    private $birthday;
    
    private $view;

    /**
     * 
     * @param string $nick
     * @param char[] $password
     * @param type $email
     * @param type $birthday
     */
    function __construct($id, $nick, $password, $email, DateTime $birthday) {
        $this->id = $id;
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
    
    public function getView() {
        return $this->view;
    }
    
    public function setView($view) {
        $this->view = $view;
    }

}


?>