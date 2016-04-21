<?php 
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../../css/style_root.css" type="text/css"/>
</head>
<header>
	<title>Meeting Plannifier</title>
</header>
<body>
<?php
if (! isset ( $_SESSION ['logged'] ) || $_SESSION ['status'] != 'root') {
	echo '<h2>You dont have the right access, please try to connect and try again.</h2>';
	$target = "";
	if (isset ( $_SESSION ['status'] )) {
		switch ($_SESSION ['status']) {
			case 'teacher' :
				$target = '../teacher/menu_teacher.php';
				break;
			case 'student' :
				$target = '../student/menu.php';
				break;
		}
	} else {
		$target = '../index.php';
	}
	echo '<button id="retur" name="button" onclick="document.location.href=\'' . $target . '\'">Come back to Menu</button>';
} else {
	require '../../controller/navb.php';
	echo navb::generateNav();
?>

<table>

	<div id="presentation">
	<p>	<h1><strong>Meeting Planifier</strong></h1>
		<h1><strong>Insert Menu.</strong></h1>
	</p>
	</div>
		

	
	
</td></tr>
</table>	
   
<form method="post" action="insert_root.php">
	<input type="submit" value="Table Subscription" name="subs" style="background-color: #c6002a; border: 2px solid black;  width: 120px; height: 40px;" />
	<input type="submit" value="Table Teacher" name="teac" style="background-color: #c6002a; border: 2px solid black;  width: 120px; height: 40px;" />
	<input type="submit" value="Table Event" name="even" style="background-color: #c6002a; border: 2px solid black;  width: 120px; height: 40px;" />
	<input type="submit" value="Table Student" name="stud" style="background-color: #c6002a; border: 2px solid black;  width: 120px; height: 40px;"> 
</form>

<?php 
 if (isset($_POST['stud'])){

$_SESSION['table'] = 'student'; 	
?>

<table>
   <div id="formulaire">
	<form method="POST" action="../../controller/checkInsert_root.php">
		<p>student_id : <input type="text" name="student_idstudent"/>
		<p>logincode : <input type="text" name="login_codestudent"/>
		<p>firstname : <input type="text" name="firstnamestudent"/>
		<p>prefix : <input type="text" name="prefixstudent"/>
		<p>lastname : <input type="text" name="lastnamestudent"/>
		<p>group_name : <input type="text" name="group_namestudent"/>
		<p>email : <input type="text" name="emailstudent"/>
		<p>Team  : <input type="text" name="team_namestudent"/>
		<input type="Submit"  value="Enter"></p>
	</form>
	</div>
	</table>

    
    <?php 
    
      } 
      if(isset($_POST['teac'])){

$_SESSION['table'] = 'teacher'; 	
?>

<table>
   <div id="formulaire">
	<form method="POST" action="../../controller/checkInsert_root.php">
		<p>teacher_id : <input type="text" name="teacher_idteacher"/>
		<p>logincode : <input type="text" name="logincodeteacher"/>
		<p>firstname : <input type="text" name="firstnameteacher"/>
		<p>prefix : <input type="text" name="prefixteacher"/>
		<p>lastname : <input type="text" name="lastnameteacher"/>
		<p>email : <input type="text" name="emailteacher"/>
		<input type="Submit"  value="Enter"></p>
	</form>
	</div>
	</table>

    
    <?php 
    
      } 
      
      if(isset($_POST['even'])){
$_SESSION['table'] = 'event'; 	
 	
?>

<table>
   <div id="formulaire">
	<form method="POST" action="../../controller/checkInsert_root.php">
		<p>event_name : <input type="text" name="event_namesubscription"/>
		<p>student_id : <input type="text" name="student_idsubscription"/>
		<p>date : <input type="date" name="datesubscription"/>
		<p>time : <input type="time" name="timesubscription"/>
		<input type="Submit"  value="Enter"></p>
	</form>
	</div>
	</table>

    
    <?php 
    
      } 
      
       if(isset($_POST['subs'])){
      $_SESSION['table'] = 'subscription'; 	 		
?>

<table>
   <div id="formulaire">
	<form method="POST" action="../../controller/checkInsert_root.php">
		<p>event_name : <input type="text" name="event_nameevent"/>
		<p>teacher_id : <input type="text" name="teacher_idevent"/>
		<p>startdate : <input type="date" name="startdateevent"/>
		<p>endate : <input type="date" name="endateevent"/>
		<p>location : <input type="text" name="locationevent"/>
		<p>remarks : <input type="text" name="remarksevent"/>
		
		<input type="Submit"  value="Enter"></p>
	</form>
	</div>
	</table>
    
    <?php 
    
 	     } 
 	}
 

?>


</body>
</html>