<?php
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<header>
	<title>Meeting Plannifier</title>
</header>
<body><?php
if (! isset ( $_SESSION ['logged'] ) || $_SESSION ['status'] != 'teacher') {
	echo '<h2>You dont have the right access, please try to connect and try again.</h2>';
	$target = "";
	if (isset ( $_SESSION ['status'] )) {
		switch ($_SESSION ['status']) {
			case 'root' :
				$target = 'menu_root.php';
				break;
			case 'student' :
				$target = 'menu.php';
				break;
		}
	} else {
		$target = 'index.php';
	}
	echo '<button id="retur" name="button" onclick="document.location.href=\'' . $target . '\'">Come back to Menu</button>';
} else {
	require 'navb.php';
	echo navb::generateNav ();
}
$servername = "home.spijkerman.nl";
$username = "subs";
$password = "sub564-A";
$dbname = "subs";
try {
	$conn = new PDO ( "mysql:host=$servername;dbname=$dbname", $username, $password );
} catch ( Exception $e ) {
	die ( 'Erreur : ' . $e->getMessage () );
}
$reponse_e = $conn->query ( "Select event_name from event where teacher_id=" . $_SESSION ['logged'] );
echo '<table class=\'event_list\'>';
echo '<tr>';
$count = 0;
while ( $donnee_e = $reponse_e->fetch () ) {
	if ($count < 10) {
		$count ++;
		echo '<td><button name=\'' . $donnee_e ['event_name'] . '\' value=\'' . $donnee_e ['event_name'] . '\'>' . $donnee_e ['event_name'] . '</button></td>';
	} else {
		if ($count == 10) {
			echo '<td><select name="extra-event" selected="0">';
			echo '<option value="0" selected disabled>More</option>';
		}
		$count ++;
		echo '<option value=\'' . $donnee_e ['event_name'] . '\'>' . $donnee_e ['event_name'] . '</option>';
	}
}
if ($count >= 10) {
	echo '</select></td>';
}
echo '</tr>';
echo '</table>';
?>
</body>
</html>