<?php
require_once("user.php");
require_once("IUser.php");
class LoginModel {
	private $users;

	function __construct() {
		$this->users[0][0] = "pepeNick";
		$this->users[0][1] = "pepePass";
		$this->users[1][0] = "marceloNick";
		$this->users[1][1] = "marceloPass";
		$this->users[2][0] = "uriNick";
		$this->users[2][1] = "uriPass";
		
	}
	
	function getUser($name, $password) {
		foreach($this->users as $row) {
			if ($row[0] == $name && $row[1] == $password) {
				return new User($row[0], $row[1]);
			}
		}
		return NULL;
	}
}

	