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
    private $nick = "";
    /* @var string */
    private $password = "";
    private $email = "";

//		private $birthday = getdate();

    /**
     * 
     * @param string $user
     * @param char[] $password
     * @param type $email
     * @param type $birthday
     */
    function __construct($user, $password, $email, $birthday) {
        $this->nick = $user;
        $this->password = $password;
    }

    public function getId() {
        
        return $this->id;
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