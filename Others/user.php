<?php

require_once "Thing.php";
require("IUser.php");

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

    /**
     * 
     * @param string $user
     * @param char[] $password
     * @param type $email
     * @param type $birthday
     */
    function __construct(string $user, string $password, string $email, DateTime $birthday) {
        $this->nick = $user;
        $this->password = $password;
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

}


?>