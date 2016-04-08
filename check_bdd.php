<?php
$servername = "home.spijkerman.nl";
$username = "subs";
$password = "sub564-A";
$dbname = "subs";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "INSERT INTO subscription (student_id,event_number,date,time)
    VALUES (".$_POST['student_id'].",".$_POST['event_number'].", '".$_POST['date']."' , '".$_POST['time']."' )";
    // use exec() because no results are returned
    $conn->exec($sql);

    		setcookie('insert', "yes", time() + 365*24*3600, null, null, false, true);
     		header('Location: menu_root.php');      
  
    }
			catch(PDOException $e)
    {
    		setcookie('insert', "no", time() + 365*24*3600, null, null, false, true);
    		header('Location: menu_root.php');  	
    }

$conn = null;
?>