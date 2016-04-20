<?php
$servername = "home.spijkerman.nl";
$username = "subs";
$password = "sub564-A";
$dbname = "subs";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $sql = "DELETE FROM subscription WHERE event_number=".$_POST['event_number']."";
    
    // use exec() because no results are returned
    $conn->exec($sql);

    		setcookie('remove', "yes", time() + 1, null, null, false, true);
     		header('Location: remove_data.php');      
  
    }
			catch(PDOException $e)
    {
    		setcookie('remove', "no", time() + 1, null, null, false, true);
    		header('Location: remove_data.php');  	
    }

$conn = null;
?>