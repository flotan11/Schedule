<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<header>
	<title>Meeting Plannifier</title>
</header>
<body>
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
		<p>INE : <input type="text" name="INE"/></p>
		<p>Teacher : <input type="text" name="INP"/></p>
		<input type="Submit"  value="Enter">
	</form>
	</div>
</td></tr>
</table>
</body>
</html>