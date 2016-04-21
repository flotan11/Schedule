<?php
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../css/style.css" type="text/css" />
</head>
<header>
	<title>Meeting Plannifier</title>
</header>
<body><?php
require '../../controller/check.php';
$check=new check;
if (!$check->rejectIfDiffer('teacher')){
	require '../../controller/navb.php';
	echo navb::generateNav ();
	require '../../controller/askDB.php';
	$conn = askDB::iniServ ();
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
}
	?>
</body>
</html>