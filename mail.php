<html>
<head>
<script src="jquery-2.2.3.js"></script>
<script type="text/javascript" src="dtable.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<header>
	<title>Meeting Plannifier</title>
</header>
<body>
<?php
	require 'navb.php';
	echo navb::generateNav();
?>

<form name="mailIt" method="post" action="mail.php">
	<p>Event Number: <input type="text" name="enomber"/></p>
	<table class="dTable" id="formtab">
		<thead>
			<tr><th>
				Mail
			</th><th>
				INE
			</th><th>
				Action
			</th></tr>
		</thead>
		<tfoot>
			<tr>
				<th colspan="3"><a href="#" onclick="addLigne(this); return false;">Add Line</a></th>
			</tr>
		</tfoot>
		<tbody>
			<tr><td>
				<input type="text" name="mail[]" onKeyPress="if(event.keyCode == 13) addLigne(this);" onfocus="fcs(this)" onblur="blr(this)" />
			</td><td>
				<input type="text" name="INE[]" onKeyPress="if(event.keyCode == 13) addLigne(this);"/>
			</td><td>
				 <a href="#" onclick="delLigne(this); return false;">Delete</a>
			</td></tr>
		</tbody>
	</table>

<?php 
/*=====Création du header de l'e-mail
$header = "From: \"WeaponsB\"<weaponsb@mail.fr>".$passage_ligne;
$header .= "Reply-to: \"WeaponsB\" <weaponsb@mail.fr>".$passage_ligne;
$header .= "MIME-Version: 1.0".$passage_ligne;
$header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========*/
?>
</body>
</html>