<?php
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery-2.2.3.js"></script>
<script type="text/javascript" src="../../controller/dtable.js"></script>
<link rel="stylesheet" href="../../css/style.css" type="text/css" />
</head>
<header>
	<title>Meeting Plannifier</title>
</header>
<body>
<?php
require '../../controller/check.php';
$check=new check;
if (!$check->rejectIfDiffer('teacher')){
	require '../../controller/navb.php';
	echo navb::generateNav ();
?>
	<form id="mailIt" name="mailIt" method="post" action="mail.php">
<?php
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
	?>
	<table class="dTable" id="formtab">
			<thead>
				<tr>
					<th>Mail</th>
					<th>INE</th>
					<th>Action</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th colspan="3"><a href="#" id="add"
						onclick="addLigne(this); return false;">Add Line</a></th>
				</tr>
			</tfoot>
			<tbody>
				<tr>
					<td><input type="text" name="mail[]"
						onKeyPress="if(event.keyCode == 13) addLigne(this);"
						onfocus="fcs(this)" onblur="blr(this)" /></td>
					<td><input type="text" name="INE[]"
						onKeyPress="if(event.keyCode == 13) addLigne(this);" /></td>
					<td><a href="#" id="del" onclick="delLigne(this); return false;">Delete</a>
					</td>
				</tr>
			</tbody>
		</table>

<?php 
/*=====Cr�ation du header de l'e-mail
$header = "From: \"WeaponsB\"<weaponsb@mail.fr>".$passage_ligne;
$header .= "Reply-to: \"WeaponsB\" <weaponsb@mail.fr>".$passage_ligne;
$header .= "MIME-Version: 1.0".$passage_ligne;
$header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========*/
}
?>


</body>
</html>