<html>
<head>
<link rel="stylesheet" href="css/style_root.css" type="text/css"/>
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

<div id="barredenavigation">
    <div id="onglet1">premier onglet
        <div class="onglet">
            <a href="insert_data.php">Insert data</a>
            <a href="update_data.php" >Update data</a>
            <a href="remove_data.php">Remove data</a>
            <a href="select_data.php" >Display table</a>
            <a href="index.php">Disconnect</a>
        </div>
    </div>
    
    <form method="post" action="select_data.php">
    <fieldset>
        Rechercher un ouvrage par
        <select name="list">
            <option value="subscription">Subscription</option>
            <option value="student">Student</option>
            <option value="event">Event</option>
            <option value="teacher">Teacher</option>
        </select>
        <input type="text" name="rch" />
        <input type="submit" value="ok" name="ok" />
    </fieldset>

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
    
    if (isset($_POST['list'])){
    if($_POST['list'] == 'subscription'){
    $stmt = $conn->prepare("SELECT * FROM subscription"); 
    } elseif ($_POST['list'] == 'student'){
    $stmt = $conn->prepare("SELECT * FROM student"); 	
    } elseif ($_POST['list'] == 'event'){
    $stmt = $conn->prepare("SELECT * FROM event"); 	
    } elseif ($_POST['list'] == 'teacher'){
    $stmt = $conn->prepare("SELECT * FROM teacher"); 	
    }else {
     $stmt = $conn->prepare("SELECT * FROM event"); 	
    }
    }else{
    	 $stmt = $conn->prepare("SELECT * FROM subscription"); 
    }
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
  //  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>