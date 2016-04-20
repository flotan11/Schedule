<?php
$servername = "home.spijkerman.nl";
$username = "subs";
$password = "sub564-A";
$dbname = "subs";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	/*$sql = "INSERT INTO student (student_id,logincode,firstname,prefix,lastname,group_name,email)
	 VALUES (".$_POST['student_id'].",".$_POST['logincode'].", '".$_POST['firstname']."' , '".$_POST['prefix']."' , '".$_POST['lastname']."' , '".$_POST['group_name']."' , '".$_POST['email']."' )";
	 */
	if($_GET['list'] == 'subscription'){
		$sql = "INSERT INTO subscription (student_id,event_number,date,time)
    VALUES (".$_POST['student_id'].",".$_POST['event_number'].", '".$_POST['date']."' , '".$_POST['time']."' )";
	}
	/*if($_POST['list']== 'student'){
	 $sql = "INSERT INTO student (student_id,event_number,date,time)
	 VALUES (".$_POST['student_id'].",".$_POST['event_number'].", '".$_POST['date']."' , '".$_POST['time']."' )";
	 }
	 if($_POST['list']== 'teacher'){
	 $sql = "INSERT INTO teacher (student_id,event_number,date,time)
	 VALUES (".$_POST['student_id'].",".$_POST['event_number'].", '".$_POST['date']."' , '".$_POST['time']."' )";
	 }*/
	// use exec() because no results are returned
	$conn->exec($sql);

	setcookie('insert', "yes", time() + 1, null, null, false, true);
	header('Location: menu_root.php');

}
catch(PDOException $e)
{
	setcookie('insert', "no", time() + 1, null, null, false, true);
	header('Location: menu_root.php');
}

$conn = null;
?>