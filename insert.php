<?php
$servername = "home.spijkerman.nl";
$username = "subs";
$password = "sub564-A";
$dbname = "subs";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $sql = "INSERT INTO subscription (student_id, event_number, date, time)
    VALUES (0701562, 5547845, '2015-05-12', '05:30:20')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>