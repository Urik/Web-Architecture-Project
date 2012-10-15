<?php

require_once 'Others/IUser.php';

class Administrator implements IUser {
    private $id;
    /** @var User */
    private $user;
    
    function __construct($id, $user) {
        $this->user = $user;
    }

    
    public function getBirthday() {
        $this->user->getBirthday();
    }

    public function getEmail() {
        $this->user->getEmail();
    }

    public function getId() {
        return $this->id;
    }

    public function getNick() {
        $this->user->getNick();
    }

    public function getPassword() {
        $this->user->getPassword();
    }

    public function getVariablesAsMap() {
        $map = array(
            "id" => $this->id,
            "user_id" => $this->user->getId()
        );
        return $map;
    }
    
    public function getUser() {
        return $this->user;
    }

}

?>
