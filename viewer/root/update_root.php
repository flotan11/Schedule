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
require '../../controller/check.php';
$check=new check;
if (!$check->rejectIfDiffer('root')){
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
   
<form method="post" action="update_root.php">
	<input type="submit" value="Table Subscription" name="subs" style="background-color: #c6002a; border: 2px solid black;  width: 120px; height: 40px;" />
	<input type="submit" value="Table Teacher" name="teac" style="background-color: #c6002a; border: 2px solid black;  width: 120px; height: 40px;" />
	<input type="submit" value="Table Event" name="even" style="background-color: #c6002a; border: 2px solid black;  width: 120px; height: 40px;" />
	<input type="submit" value="Table Student" name="stud" style="background-color: #c6002a; border: 2px solid black;  width: 120px; height: 40px;"> 
<?php 
}
?>


</body>
</html>