<?php
class DBAsker{
	function iniServ(){
		require_once dirname(__FILE__).'/../data/pathFinder.php';
		$pathFinder=new pathFinder;
		require_once $pathFinder->getDBData();
		$DBData=new DBData;
		$servername = $DBData->getServername();
		$username = $DBData->getUsername();
		$password = $DBData->getPassword();
		$dbname = $DBData->getDbname();

		try {
			return new PDO ( "mysql:host=$servername;dbname=$dbname", $username, $password );
		} catch ( Exception $e ) {
			die ( 'Erreur : ' . $e->getMessage () );
		}
	}
}
?>