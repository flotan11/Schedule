<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<header>
	<title>Meeting Plannifier</title>
</header>
<body>

<?php 
	function move($v){
		$dayw=date('w')-1+($v*7);
		echo '<table id=\'schedule\'><tr>';
		$day=date('l d F Y');
		$day=new DateTime($day);
		$day->modify('-'.$dayw.' day');
		$monday=$day;
		for ($i=0;$i<5;$i++){
			echo '<td class=\'name\'><strong>'.date_format($day,'l d F Y').'</strong></td>';
			$day->modify('+1 day');
		}
		echo '</tr><tr>';
		$h=8;
		$day->modify('+8 hour');
		for ($i=0;$i<10;$i++){
			$day->modify('-5 day');
			echo '<tr>';
			for ($j=0;$j<5;$j++){
				if (time()>($day->getTimestamp())){
					echo '<td class=\'passed\'>'.$h.'H</td>';
				}else{
					echo '<td class=\'notPassed\'>'.$h.'H</td>';
				}
				$day->modify('+1 day');
			}
			$day->modify('+1 hour');
			$h++;
			echo '</tr>';
		}
		echo '</table>';
	}
?>

<table>
<tr><td>
	<img id="icon" src="img/avans.png" alt="AVANS Icon">
</td><td>
	<div id="presentation">
		<h1><strong>Meeting Planifier</strong></h1>
		<p>Welcome to the schedule of Mr.<?php  echo $_COOKIE['teacher_name'] ?></p>
		<p>Please select the date you would like to meet him :</p>
	</div>
</td></tr>
</table>	
	<?php
		if(isset($_POST['button'])){
			$f=$_POST['button'];
		}else{
			$f=0;
		}
		move($f);
	?>
<form method='POST' action='menu.php'>
<table id='move'>
<tr><td>
	<button id='previous' value='<?php echo $f+1; ?>' name='button'>Previous</button>
</td><td>
	<button id='actual' value='0' name='button'>Actual</button>
</td><td>
	<button id='next' value='<?php echo $f-1; ?>' name='button'>Next</button>
</td></tr>
</table>
</form>
</body>
</html>