



<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
</head>
<header>
	<title>Meeting Plannifier</title>
</header>
<body>
<table>
<tr><td>
	<img id="icon" src="img/avans.png" alt="AVANS Icon">
</td><td>
	<div id="presentation">
		<h1><strong>Meeting Planifier</strong></h1>
		<p>Root Menu.</p>
		
		
	</div>
</td></tr>
</table>	

<table>

	<form method="POST" action="check_bdd.php">
		<p>student_id : <input type="text" name="student_id"/>
		event_title : <input type="text" name="event_number"/>
		date : <input type="date" name="date"/>
		time : <input type="time" name="time"/>
		
		<input type="Submit"  value="Enter"></p>
	</form>
	</div>


<?php

echo "<table style='border: solid 1px black;'>";

echo "<tr><th>event_title</th><th>teacher_id</th><th>startdate</th><th>endate</th><th>location</th><th>remarks</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
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
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM subscription"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
if($_COOKIE['insert']== "yes"){
	
	echo "<script>alert('Successful insert')</script>"; 
	
}else{
	
	echo "<script>alert('Error insert')</script>";
	
}

?>



</table>
</body>
</html>
