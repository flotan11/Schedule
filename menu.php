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
		<p>Welcome to the schedule of Mr.<?php /*TODO requete PHP nom Prof*/?></p>
		<p>Please select the date you would like to meet him :</p>
	</div>
</td></tr>
</table>	

<table id='schedule'>
<tr>
	<?php
		$dayw=date('w')-1;
		$day=date('l d F');
		$day=new DateTime($day);
		$day->modify('-'.$dayw.' day');
		$monday=$day;
		for ($i=0;$i<5;$i++){
			echo '<td class=\'name\'><strong>'.date_format($day,'l d F').'</strong></td>';
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
	?>
</table>
<table id='move'>
<tr><td>
	<button id='previous'>Previous</button>
</td><td>
	<button id='next'>Next</button>
</td></tr>
</table>
</body>
</html>