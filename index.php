<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<header>
	<title>Meeting Plannifier</title>
</header>
<body>
<?php 
	if(isset($_SESSION['logged'])){
		$target="";
		echo '<h2>You are already connected.</h2>';
		switch ($_SESSION['status']){
			case 'root':
				$target='menu_root.php';
			break;
			
			case 'teacher':
				$target='menu_teacher.php';
			break;
			
			case 'student':
				$target='menu.php';
			break;
		}
		echo '<button id="retur" name="button" onclick="document.location.href=\''.$target.'\'">Come back to Menu</button>';
	}else{
?>
<table>
<tr><td>
	<img id="icon" src="img/avans.png" alt="AVANS Icon">
	</td><td>
	<div id="presentation">
	<h1><strong>Meeting Planifier</strong></h1>
	<p>Please enter your Student ID to access teacher schedule :</p>
	</div>
	<div id="formdiv">
	<form method="POST" action="check_log.php">
		<p>ID : <input type="text" name="INE"/></p>
		<p>Teacher : <input type="text" name="INP"/><br>(Login-Code for Teacher Access)</p>
		<input type="Submit"  value="Enter">
	</form>
	</div>
</td></tr>
</table>
<?php 
	}
?>
</body>
</html>