<?php
if($_POST['list'] == 'subscription'){
	
		setcookie('item', "subscription", time() + 1, null, null, false, true);
     	header('Location: select_data.php');      
  
	
}else if($_POST['list'] == 'student'){
	
	setcookie('item', "student", time() + 1, null, null, false, true);
     	header('Location: select_data.php');      
	
}
?>