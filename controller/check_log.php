<?php
session_start ();

require_once dirname(__FILE__).'/../data/pathFinder.php';
$pathFinderCheckLo=new pathFinder;
require_once $pathFinderCheckLo->getDBAsker();
echo 'Bordel mais oui';
$conn=DBAsker::iniServ();
echo 'tout va bien jusqu ici';
$reponse_ine = $conn->query ( "select student_id from student"/* where student_id={$_POST['INE']}"*/);
$reponse_inp = $conn->query ( "select lastname from teacher" );
$reponse_int = $conn->query ( "select teacher_id from teacher" );
{
	$ine = $_POST ['INE'];
	$inp = $_POST ['INP'];
	$isOk_ine = false;
	$isOk_inp = false;
	$isOk_int = false;
	$isOk_inl = false;
	
	$_SESSION ['logged'] = $ine;
	
	while ( $donnees_ine = $reponse_ine->fetch () ) {
		if ($ine == $donnees_ine ['student_id']) {
			$isOk_ine = true;
		}
	}
	$reponse_ine->closeCursor ();
	while ( $donnees_inp = $reponse_inp->fetch () ) {
		if ($inp == $donnees_inp ['lastname']) {
			$isOk_inp = true;
		}
	}
	$reponse_inp->closeCursor ();
	
	if ($inp == 'root' && $ine == 'root') {
		$_SESSION ['status'] = 'root';
		$reponse_inp->closeCursor ();
		header ( 'Location: '.$pathFinderCheckLo->getMenuRoot() );
	} else if ($isOk_ine == true && $isOk_inp == true) {
		$_SESSION ['status'] = 'student';
		setcookie ( 'teacher_name', $inp, time () + 365 * 24 * 3600, null, null, false, true );
		header ( 'Location: '.$pathFinderCheckLo->getMenu() );
	} else {
		while ( $donnees_int = $reponse_int->fetch () ) {
			if ($ine == $donnees_int ['teacher_id']) {
				$isOk_int = true;
				$reponse_inl = $conn->query ( "select logincode from teacher WHERE teacher_id=$ine" );
				while ( $donnees_inl = $reponse_inl->fetch () ) {
					if ($donnees_inl [0] == $inp) {
						$isOk_inl = true;
					}
				}
				$res = $donnees_inl;
				$reponse_inl->closeCursor ();
			}
		}
		$reponse_int->closeCursor ();
		
		if ($isOk_inl == true && $isOk_int == true) {
			$_SESSION ['status'] = 'teacher';
			header ( 'Location: '.$pathFinderCheckLo->getMenuTeacher() );
		} else {
			session_destroy ();
			header ( 'Location: '.$pathFinderCheckLo->getIndex() );
		}
	}
}
?>