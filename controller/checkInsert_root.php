<?php
$servername = "home.spijkerman.nl";
$username = "subs";
$password = "sub564-A";
$dbname = "subs";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql1 = "INSERT INTO student (student_id,login_code,firstname, prefix,lastname,group_name ,email, team_name)
    VALUES (".$_POST['student_id'].",".$_POST['login_code'].", '".$_POST['firstname']."' , '".$_POST['prefix']."' , '".$_POST['lastname']."' , '".$_POST['group_name']."' , '".$_POST['email']."' , '".$_POST['team_name']."')";

	$sql2 = "INSERT INTO teacher (teacher_id,logincode,firstname, prefix,lastname,email)
    VALUES (".$_POST['teacher_id'].",".$_POST['logincode'].", '".$_POST['firstname']."' , '".$_POST['prefix']."' , '".$_POST['lastname']."' , '".$_POST['email']."')";

	$sql3 = "INSERT INTO subscription (event_name,student_id,date, time)
    VALUES ('".$_POST['event_name']."',".$_POST['student_id'].", '".$_POST['date']."' , '".$_POST['time']."')";   

	/* $sql = "INSERT INTO event (event_name,teacher_id,startdate,endate,location,remarks)
	 VALUES ('".$_POST['event_name']."',".$_POST['teacher_id'].",'".$_POST['startdate']."' , '".$_POST['endate']."','".$_POST['location']."','".$_POST['remarks']."')"*/
	// use exec() because no results are returned
	$conn->exec($sql2);
	$conn->exec($sql1);
	$conn->exec($sql3);
	header('Location: ../viewer/root/menu_root.php');
}
catch(PDOException $e)
{
	header('Location: ../viewer/root/menu_root.php');
}

$conn = null;
?>