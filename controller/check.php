<?php
Class check{
	private $target="";
	function reject(){
		global $target;
		if (isset($_SESSION['status'])){
			switch ($_SESSION ['status']) {
				case 'root' :
					$target = 'root/menu_root.php';
					break;
					
				case 'teacher' :
					$target = 'teacher/menu_teacher.php';
					break;
					
				case 'student' :
					$target = 'student/menu.php';
					break;
			}
		}else{
			$target='index.php';
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