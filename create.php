<?php
$servername = "home.spijkerman.nl";
$username = "subs";
$password = "sub564-A";
$dbname = "subs";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table

 $sql ="CREATE table teacher(
     teacher_id INT( 7 ) NOT NULL PRIMARY KEY,
     logincode  VARCHAR (20) NOT NULL, 
     firstname  VARCHAR (20) NOT NULL,
     prefix  VARCHAR (10) NOT NULL,
     lastname VARCHAR (20) NOT NULL,
     email VARCHAR (30) NOT NULL);" ;
    
    //$sql = "DROP TABLE student";
    

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>