<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<header>
	<title>Meeting Plannifier</title>
</header>
<body>
<?php
	if(!isset($_SESSION['logged']) || $_SESSION['status']!='teacher') {
		echo '<h2>You dont have the right access, please try to connect and try again.</h2>';
		$target="";
		if (isset($_SESSION['status'])){
			switch ($_SESSION['status']){
				case 'root':
					$target='menu_root.php';
				break;
				case 'student':
					$target='menu.php';
				break;
			}
		}else{
			$target='index.php';
		}
		echo '<button id="retur" name="button" onclick="document.location.href=\''.$target.'\'">Come back to Menu</button>';
	}else{
		require 'navb.php';
		echo navb::generateNav(); 
	}
?>
</body>
</html>