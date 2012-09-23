<?php

interface IUser {

    public function getId();

    public function getNick();

    public function getPassword();

    public function getEmail();

    public function getBirthday();
    
    public function getVariablesAsMap();
}

?>