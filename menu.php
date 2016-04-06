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
		for ($i=0;$i<10;$i++){
			$h=$h+$i;
			echo '<tr>';
			for ($j=0;$j<5;$j++){
				echo '<td>'.$h.'H</td>';
			}
			echo '</tr>';
		}
	?>
</table>
</body>
</html>