<?php

$servername = "home.spijkerman.nl";
$username = "subs";
$password = "sub564-A";
$dbname = "subs";

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

	$reponse_ine = $conn->query("select student_id from student"/* where student_id={$_POST['INE']}"*/);
	$reponse_inp = $conn->query("select lastname from teacher");
{
	$inp = $_POST['INP'];
	$ine = $_POST['INE'];
	$isOk_ine = false;
	$isOk_inp = false;
		
	while($donnees_ine = $reponse_ine -> fetch()){

		 if($ine== $donnees_ine['student_id']){
		$isOk_ine = true;	
		}
	}
	$reponse_ine->closeCursor();
	while($donnees_inp = $reponse_inp -> fetch() ){
		if($inp == $donnees_inp['lastname']){	
		$isOk_inp = true;	
		
		}
	}
			$reponse_inp->closeCursor();
	
	if($isOk_ine == true && $isOk_inp == true){
		
		setcookie('teacher_name', $_POST['INP'], time() + 365*24*3600, null, null, false, true);
 		header('Location: menu.php');      
	
	}else if ($inp == 'root'){
		header('Location: menu_root.php');  
	}else{
		header('Location: index.php');      		
	
	}
}
?>