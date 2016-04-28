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
require_once dirname(__FILE__).'/../../data/pathFinder.php';
$pathFinder=new pathFinder;
require_once $pathFinder->getCheck();
$check=new check;
if (!$check->rejectIfDiffer('teacher')){
		require_once $pathFinder->getNavB();
		echo navb::generateNav();
	}
?>
</body>
</html>