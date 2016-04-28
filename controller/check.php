<?php
Class check{
	private $target="";
	function reject(){
		require_once dirname(__FILE__).'/../data/pathFinder.php';
		$pathFinder=new pathFinder;
		global $target;
		if (isset($_SESSION['status'])){
			switch ($_SESSION ['status']) {
				case 'root' :
					$target = $pathFinder->getMenuRoot();
					break;
					
				case 'teacher' :
					$target = $pathFinder->getMenuTeacher();
					break;
					
				case 'student' :
					$target = $pathFinder->getMenu();
					break;
			}
		}else{
			$target= $pathFinder->getIndex();
		}
	}
	
	function rejectIfLog(){
		if (isset ( $_SESSION ['logged'] )){
			global $target;
			$this->reject();
			echo '<h2>You are already connected.</h2>';
			echo '<button id="retur" name="button" onclick="document.location.href=\'' . $target . '\'">Come back to Menu</button>';
			return true;
		}else {
			return false;
		}
	}
	
	function rejectIfDiffer($compare){ 
		if (!isset ( $_SESSION ['logged'] ) || $_SESSION ['status'] != $compare) {
			global $target;
			$this->reject();
			$target='../'.$target;
			echo '<h2>You dont have the right access, please try to connect and try again.</h2>';
			echo '<button id="retur" name="button" onclick="document.location.href=\'' . $target . '\'">Come back to Menu</button>';
			return true;
		}else{
			return false;
		}
	}
}
?>