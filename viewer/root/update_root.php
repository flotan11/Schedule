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
<hr>
<form method="post" action="update_root.php">
	<input type="submit" value="Table Subscription" name="subs" style="background-color: #c6002a; border: 2px solid black;  width: 120px; height: 40px;" />
	<input type="submit" value="Table Teacher" name="teac" style="background-color: #c6002a; border: 2px solid black;  width: 120px; height: 40px;" />
	<input type="submit" value="Table Event" name="even" style="background-color: #c6002a; border: 2px solid black;  width: 120px; height: 40px;" />
	<input type="submit" value="Table Student" name="stud" style="background-color: #c6002a; border: 2px solid black;  width: 120px; height: 40px;"> 

	<?php
class TableRows extends RecursiveIteratorIterator {
	function __construct($it) {
		parent::__construct ( $it, self::LEAVES_ONLY );
	}
	function current() {
		return "<td style='width:300px;height:50px;text-align : center; border:2px solid black;background-color : white;'>" . parent::current () . "</td>";
	}
	function beginChildren() {
		echo "<tr>";
	}
	function endChildren() {
		echo "</tr>" . "\n";
	}
}

$servername = "home.spijkerman.nl";
$username = "subs";
$password = "sub564-A";
$dbname = "subs";

try {
	$conn = new PDO ( "mysql:host=$servername;dbname=$dbname", $username, $password );
	$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$stmt = $conn->prepare ( "SELECT * FROM rien" );

		echo"<div id = 'global'";
		echo "<div id='tables'>";
			if(isset ( $_POST ['subs'] )) {
			echo "<font face='purisa' color='#00ACEB' size='6px'><p align='left'>Subscription Table </p></font> ";
			echo "<br><table style='border: solid 3px black;background-color : #00ACEB;'>";
			echo "<tr><th>event_name</th><th>student_id</th><th>date</th><th>time</th><th>Modification</th></tr>";
			$stmt = $conn->prepare ( "SELECT * FROM subscription" );
			$res = $conn->query('select count(*) as nb from subscription');
		} elseif (isset ( $_POST ['stud'] )) {
			echo "<font face='purisa' color='#00ACEB' size='6px'><p align='left'>Student Table </p></font> ";
			echo "<br><table style='border: solid 3px black;background-color : #00ACEB;'>";
			echo "<tr><th>student_id</th><th>login_code</th><th>firstname</th><th>prefix</th><th>lastname</th><th>group</th><th>mail</th><th>team_name</th><th>Modification</th></tr>";
			$stmt = $conn->prepare ( "SELECT * FROM student" );
		    $res = $conn->query('select count(*) as nb from student');
		} elseif (isset ( $_POST ['even'] )) {
			echo "<font face='purisa' color='#00ACEB' size='6px'><p align='left'>Event Table </p></font> ";
			echo "<br><table style='border: solid 3px black;background-color : #00ACEB;'>";
			echo "<tr><th>event_name</th><th>teacher_id</th><th>startdate</th><th>endate</th><th>location</th><th>remarks</th><th>Modification</th></tr>";
			$stmt = $conn->prepare ( "SELECT * FROM event" );
		    $res = $conn->query('select count(*) as nb from event');
		} elseif (isset ( $_POST ['teac'] )) {
			echo "<font face='purisa' color='#00ACEB' size='6px'><p align='left'>Teacher Table </p></font> ";
			echo "<br><table style='border: solid 3px black;background-color : #00ACEB;'>";
			echo "<tr><th>teacher_id</th><th>logincode</th><th>firstname</th><th>prefix</th><th>lastname</th><th>mail</th><th>Modification</th></tr>";
			$stmt = $conn->prepare ( "SELECT * FROM teacher" );
			$res = $conn->query('select count(*) as nb from teacher');
		} else {
			$stmt = $conn->prepare ( "SELECT * FROM rien" );
		}
		
    $data = $res->fetch();
    $nb = $data['nb'];
    echo $nb;

	
	$stmt->execute ();
	$cpt=0;
	// set the resulting array to associative
	$result = $stmt->setFetchMode ( PDO::FETCH_ASSOC );
	foreach ( new TableRows ( new RecursiveArrayIterator ( $stmt->fetchAll () ) ) as $k => $v ) {
		echo $v;

	}

	
	echo "</div>";
	
	echo "<div id = 'mod_button'>";
	for($i=0; $i<$nb; $i++){
		
			echo "<input type='submit' value='mod' name='stud' style='background-color: #c6002a; border: 2px solid black;  width: 120px; height: 40px;'> 
		";
			
	}
	echo "</div>";
	echo "</div>";
} 

catch ( PDOException $e ) {
	// echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
}
?>
</body>
</html>