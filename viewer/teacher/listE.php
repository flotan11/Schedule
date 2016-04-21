<?php 
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../css/style.css" type="text/css"/>
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
		echo navb::generateNav();
	}
?>
</body>
</html>