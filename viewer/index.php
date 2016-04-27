<?php
session_start ();
require_once dirname(__FILE__).'/../data/pathFinder.php';
$pathFinder=new pathFinder;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css" type="text/css" />
</head>
<header>
	<title>Meeting Plannifier</title>
</header>
<body>
<?php
require_once $pathFinder->getCheck();
$check=new check;
	if(!$check->rejectIfLog()){
?>
<table>
		<tr>
			<td><img id="icon" src="../img/avans.png" alt="AVANS Icon"></td>
			<td>
				<div id="presentation">
					<h1>
						<strong>Meeting Planifier</strong>
					</h1>
					<p>Please enter your Student ID to access teacher schedule :</p>
				</div>
				<div id="formdiv">
					<form method="POST" action= <?php echo '\''.$pathFinder->getCheckLog().'\''?>>
						<p>
							ID : <input type="text" name="INE" />
						</p>
						<p>
							Teacher : <input type="text" name="INP" /><br>(Login-Code for Teacher Access)
						</p>
						<input type="Submit" value="Enter">
					</form>
				</div>
			</td>
		</tr>
	</table>
<?php
}
?>
</body>
</html>