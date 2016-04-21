<?php 
	session_start();
?>

<?php
$servername = "home.spijkerman.nl";
$username = "subs";
$password = "sub564-A";
$dbname = "subs";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	if($_SESSION['table']== "student"){
	$sql1 = "INSERT INTO student (student_id,login_code,firstname, prefix,lastname,group_name ,email, team_name)
    VALUES (".$_POST['student_idstudent'].",".$_POST['login_codestudent'].", '".$_POST['firstnamestudent']."' , '".$_POST['prefixstudent']."' , '".$_POST['lastnamestudent']."' , '".$_POST['group_namestudent']."' , '".$_POST['emailstudent']."' , '".$_POST['team_namestudent']."')";
	$conn->exec($sql1);
	}
	 
	if($_SESSION['table']=="teacher"){
	$sql2 = "INSERT INTO teacher (teacher_id,logincode,firstname, prefix,lastname,email)
    VALUES (".$_POST['teacher_idteacher'].",".$_POST['logincodeteacher'].", '".$_POST['firstnameteacher']."' , '".$_POST['prefixteacher']."' , '".$_POST['lastnameteacher']."' , '".$_POST['emailteacher']."')";
	$conn->exec($sql2); 
	}
	
	if($_SESSION['table']=="subscription"){
	$sql3 = "INSERT INTO subscription (event_name,student_id,date, time)
    VALUES ('".$_POST['event_namesubscription']."',".$_POST['student_idsubscription'].", '".$_POST['datesubscription']."' , '".$_POST['timesubscription']."')";   
	$conn->exec($sql3); 
	}
	
	if($_SESSION['table']=="event"){
	 $sql4 = "INSERT INTO event (event_name,teacher_id,startdate,endate,location,remarks)
	 VALUES ('".$_POST['event_nameevent']."',".$_POST['teacher_idevent'].",'".$_POST['startdateevent']."' , '".$_POST['endateevent']."','".$_POST['locationevent']."','".$_POST['remarksevent']."')";
	$conn->exec($sql4); 
	}

	 
	 // use exec() because no results are returned

	
//	$conn->exec($sql3);
	header('Location: ../viewer/root/menu_root.php');
	
	
}
catch(PDOException $e)
{
	echo $sql3 . "<br>" . $e->getMessage();
//	header('Location: ../viewer/root/menu_root.php');
}

$conn = null;

?>