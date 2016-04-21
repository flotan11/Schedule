<?php
Class askDB{
	function iniServ(){ 
		$servername = "home.spijkerman.nl";
		$username = "subs";
		$password = "sub564-A";
		$dbname = "subs";

		try {
			return new PDO ( "mysql:host=$servername;dbname=$dbname", $username, $password );
		} catch ( Exception $e ) {
			die ( 'Erreur : ' . $e->getMessage () );
		}
	}
}
?>