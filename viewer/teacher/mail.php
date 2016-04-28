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
require_once dirname(__FILE__).'/../../data/pathFinder.php';
$pathFinder=new pathFinder;
require_once $pathFinder->getCheck();
$check=new check;
if (!$check->rejectIfDiffer('teacher')){
	require_once $pathFinder->getNavB();
	echo navb::generateNav ();
?>
	<form id="mailIt" name="mailIt" method="post" action="mail.php">
<?php
	require_once $pathFinder->getDBAsker();
	$conn = DBAsker::iniServ ();
	require_once $pathFinder->getEventsButtons();
	eventsButtons::listEvents('teacher');
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
/*=====Création du header de l'e-mail
$header = "From: \"WeaponsB\"<weaponsb@mail.fr>".$passage_ligne;
$header .= "Reply-to: \"WeaponsB\" <weaponsb@mail.fr>".$passage_ligne;
$header .= "MIME-Version: 1.0".$passage_ligne;
$header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========*/
}
?>


</body>
</html>