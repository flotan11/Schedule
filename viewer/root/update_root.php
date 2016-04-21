<?php 
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../css/style_root.css" type="text/css"/>
</head>
<header>
	<title>Meeting Plannifier</title>
</header>
<body>
<?php
if (! isset ( $_SESSION ['logged'] ) || $_SESSION ['status'] != 'root') {
	echo '<h2>You dont have the right access, please try to connect and try again.</h2>';
	$target = "";
	if (isset ( $_SESSION ['status'] )) {
		switch ($_SESSION ['status']) {
			case 'teacher' :
				$target = '../teacher/menu_teacher.php';
				break;
			case 'student' :
				$target = '../student/menu.php';
				break;
		}
	} else {
		$target = '../index.php';
	}
	echo '<button id="retur" name="button" onclick="document.location.href=\'' . $target . '\'">Come back to Menu</button>';
} else {
	require '../../controller/navb.php';
	echo navb::generateNav();
	
?>

<table>

	<div id="presentation">
	<p>	<h1><strong>Meeting Planifier</strong></h1>
		<h1><strong>Update Menu.</strong></h1>
	</p>
	</div>
		

	
	
</td></tr>
</table>	
   
    <form method="post" action="update_root.php>
	<input type="submit" value="Table Subscription" name="subs" />
	<input type="submit" value="Table Teacher" name="teac" />
	<input type="submit" value="Table Event" name="even" />
	<input type="submit" value="Table Student" name="stud" />
</form>
<?php 
}
?>


</body>
</html>