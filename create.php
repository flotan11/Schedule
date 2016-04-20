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

 $sql ="CREATE table subscription(
     event_name VARCHAR (30) NOT NULL,
     student_id INT (7) NOT NULL,
     date date NOT NULL,
     time date NOT NULL,
     CONSTRAINT pk_event PRIMARY KEY (event_name,student_id)
	 );" ;

//   $sql = "DROP TABLE student";
    

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