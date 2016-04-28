<?php
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../css/style.css" type="text/css" />
</head>
<header>
	<title>Meeting Plannifier</title>
</header>
<body>

<?php
require_once dirname(__FILE__).'/../../data/pathFinder.php';
$pathFinder=new pathFinder;

function move($v) {
	$dayw = date ( 'w' ) - 1 + ($v * 7);
	echo '<table id=\'schedule\'><tr>';
	$day = date ( 'l d F Y' );
	$day = new DateTime ( $day );
	$day->modify ( '-' . $dayw . ' day' );
	$monday = $day;
	for($i = 0; $i < 5; $i ++) {
		echo '<td class=\'name\'><strong>' . date_format ( $day, 'l d F Y' ) . '</strong></td>';
		$day->modify ( '+1 day' );
	}
	echo '</tr><tr>';
	$h = 8;
	$day->modify ( '+8 hour' );
	for($i = 0; $i < 10; $i ++) {
		$day->modify ( '-5 day' );
		echo '<tr>';
		for($j = 0; $j < 5; $j ++) {
			if (time () > ($day->getTimestamp ())) {
				echo '<td class=\'passed\'>' . $h . 'H</td>';
			} else {
				echo '<td class=\'notPassed\'>' . $h . 'H</td>';
			}
			$day->modify ( '+1 day' );
		}
		$day->modify ( '+1 hour' );
		$h ++;
		echo '</tr>';
	}
	echo '</table>';
}

require_once $pathFinder->getCheck();
$check=new check;
if (!$check->rejectIfDiffer('student')){
?>

<table class="menu">
		<tr>
			<td><img id="icon" src="../../img/avans.png" alt="AVANS Icon"></td>
			<td>
				<div id="presentation">
					<h1>
						<strong>Meeting Planifier</strong>
					</h1>
					<p>Welcome to the schedule of Mr.<?php  echo $_COOKIE['teacher_name'] ?></p>
					<p>Please select the date you would like to meet him :</p>
				</div>
			</td>
			<td><a href=<?php echo '\''.$pathFinder->getLogout().'\''?> class='logout'>Logout</a>
			</div>
				</nav></td>
		</tr>
	</table>
	<form id="selection" action="menu.php" method="post">
		<table>
			<tr>
				<td><select name="months">
	<?php
	$day = new DateTime ();
	$day->setTimestamp ( mktime ( 0, 0, 0, date ( 'n' ), date ( 'j' ), date ( 'Y' ) ) );
	if (! isset ( $_POST ['months'] ) && (! isset ( $_POST ['button'] ))) {
		$_POST ['months'] = date_format ( $day, 'n' );
	} else if (! isset ( $_POST ['months'] ) && (isset ( $_POST ['button'] ))) {
		$day->modify ( '-' . $_POST ['button'] . 'week' );
		$_POST ['months'] = date_format ( $day, 'n' );
	}
	?>
	<option value="1"
							<?php echo $_POST['months']=='1' ? 'selected=\'selected\'':'' ?>>January</option>
						<option value="2"
							<?php echo $_POST['months']=='2' ? 'selected=\'selected\'':'' ?>>February</option>
						<option value="3"
							<?php echo $_POST['months']=='3' ? 'selected=\'selected\'':'' ?>>March</option>
						<option value="4"
							<?php echo $_POST['months']=='4' ? 'selected=\'selected\'':'' ?>>April</option>
						<option value="5"
							<?php echo $_POST['months']=='5' ? 'selected=\'selected\'':'' ?>>May</option>
						<option value="6"
							<?php echo $_POST['months']=='6' ? 'selected=\'selected\'':'' ?>>June</option>
						<option value="7"
							<?php echo $_POST['months']=='7' ? 'selected=\'selected\'':'' ?>>July</option>
						<option value="8"
							<?php echo $_POST['months']=='8' ? 'selected=\'selected\'':'' ?>>August</option>
						<option value="9"
							<?php echo $_POST['months']=='9' ? 'selected=\'selected\'':'' ?>>September</option>
						<option value="10"
							<?php echo $_POST['months']=='10' ? 'selected=\'selected\'':'' ?>>October</option>
						<option value="11"
							<?php echo $_POST['months']=='11' ? 'selected=\'selected\'':'' ?>>November</option>
						<option value="12"
							<?php echo $_POST['months']=='12' ? 'selected=\'selected\'':'' ?>>December</option>
				</select></td>
				<td><select name="weeks">
<?php
	$datec = new DateTime ();
	$datec->setTimestamp ( mktime ( 0, 0, 0, $_POST ['months'], 1, date ( 'Y' ) ) );
	$f = 1;
	if (! isset ( $_POST ['weeks'] )/* && (!isset($_POST['button']))*/){
		while ( date ( 'j' ) >= date_format ( $datec, 'j' ) ) {
			if (date_format ( $datec, 'l' ) == 'Sunday') {
				$f ++;
			}
			$datec->modify ( '+1 day' );
		}
		$_POST ['weeks'] = $f;
	}
	?>
    <option value="1"
							<?php echo $_POST['weeks']=='1' ? 'selected=\'selected\'':'' ?>>First
							Week</option>
						<option value="2"
							<?php echo $_POST['weeks']=='2' ? 'selected=\'selected\'':'' ?>>Second
							Week</option>
						<option value="3"
							<?php echo $_POST['weeks']=='3' ? 'selected=\'selected\'':'' ?>>Third
							Week</option>
						<option value="4"
							<?php echo $_POST['weeks']=='4' ? 'selected=\'selected\'':'' ?>>Fourth
							Week</option>
						<option value="5"
							<?php echo $_POST['weeks']=='5' ? 'selected=\'selected\'':'' ?>>Fifth
							Week</option>
				</select></td>
				<td><input type="submit" value="Validate" /></td>
			</tr>
		</table>
	</form>
	<?php
	if (isset ( $_POST ['button'] )) {
		$f = $_POST ['button'];
	} else if (isset ( $_POST ['weeks'] ) && isset ( $_POST ['months'] )) {
		$jour = ($_POST ['weeks'] * 7) - 6;
		$mois = $_POST ['months'];
		$timestamp = mktime ( 0, 0, 0, $mois, $jour, date ( 'Y' ) );
		$f = date ( 'W' ) - date ( 'W', $timestamp );
	} else {
		$f = 0;
	}
	move ( $f );
	?>
<form method='POST' action='menu.php'>
		<table id='move'>
			<tr>
				<td>
					<button id='previous' value='<?php echo $f+1; ?>' name='button'>Previous</button>
				</td>
				<td>
					<button id='actual' value='0' name='button'>Actual</button>
				</td>
				<td>
					<button id='next' value='<?php echo $f-1; ?>' name='button'>Next</button>
				</td>
			</tr>
		</table>
	</form>
<?php 
	}
?>
</body>
</html>