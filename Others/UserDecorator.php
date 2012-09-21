<?php

require("IUser.php");

abstract class UserDecorator implements IUser {
    /* @var $user User */
    private $user;

    function __construct($user) {
        $this->user = $user;
    }

    public function getId() {
        return $user->id;
    }

    public function getNick() {
        return $user->nick;
    }

    public function getPassword() {
        return $user->password;
    }

    public function getEmail() {
        return $user->email;
    }

    public function getBirthday() {
        return $user->email;
    }

}

?>