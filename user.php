<?php
require("IUser.php");
class User implements IUser{
		private $id = 0;
		private $nick = "";
		private $password = "";
		private $email = "";
//		private $birthday = getdate();
		
		function __construct($user, $password) {
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