<?php
	Class DBData{
		private $servername = "home.spijkerman.nl";
		private $username = "subs";
		private $password = "sub564-A";
		private $dbname = "subs";
		
		public function getServername(){
			return $this->servername;
		}
		
		public function getUsername(){
			return $this->username;
		}
		
		public function getPassword(){
			return $this->password;
		}
		
		public function getDbname(){
			return $this->dbname;
		}
	}
?>