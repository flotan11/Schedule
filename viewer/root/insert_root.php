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
        <select name="list">
            <option value="no_value">Select table</option>
            <option value="subscription">Subscription</option>
            <option value="student">Student</option>
            <option value="event">Event</option>
            <option value="teacher">Teacher</option>
        </select>
        <input type="submit" value="ok" name="ok" />
</form>

<?php 
 if (isset($_POST['list'])){
 if($_POST['list'] == 'student'){

 	
?>

<table>
	<form method="POST" action="../../controller/checkInsert_root.php">
		<p>student_id : <input type="text" name="student_idstudent"/>
		logincode : <input type="text" name="login_codestudent"/>
		firstname : <input type="text" name="firstnamestudent"/>
		prefix : <input type="text" name="prefixstudent"/>
		lastname : <input type="text" name="lastnamestudent"/>
		group_name : <input type="text" name="group_namestudent"/>
		email : <input type="text" name="emailstudent"/>
		Team  : <input type="text" name="team_namestudent"/>
		<input type="Submit"  value="Enter"></p>
	</form>
	</table>

    
    <?php 
    
      } 
      if($_POST['list'] == 'teacher'){

 	
?>

<table>
	<form method="POST" action="../../controller/checkInsert_root.php">
		<p>teacher_id : <input type="text" name="teacher_idteacher"/>
		logincode : <input type="text" name="logincodeteacher"/>
		firstname : <input type="text" name="firstnameteacher"/>
		prefix : <input type="text" name="prefixteacher"/>
		lastname : <input type="text" name="lastnameteacher"/>
		email : <input type="text" name="emailteacher"/>
		<input type="Submit"  value="Enter"></p>
	</form>
	</table>

    
    <?php 
    
      } 
      
      if($_POST['list'] == 'subscription'){

 	
?>

<table>
	<form method="POST" action="../../controller/checkInsert_root.php">
		<p>event_name : <input type="text" name="event_namesubscription"/>
		student_id : <input type="text" name="student_idsubscription"/>
		date : <input type="date" name="datesubscription"/>
		time : <input type="time" name="timesubscription"/>
		<input type="Submit"  value="Enter"></p>
	</form>
	</table>

    
    <?php 
    
      } 
      
       if($_POST['list'] == 'event'){
       		
?>

<table>
	<form method="POST" action="../../controller/checkInsert_root.php">
		<p>event_name : <input type="text" name="event_nameevent"/>
		teacher_id : <input type="text" name="teacher_idevent"/>
		startdate : <input type="date" name="startdateevent"/>
		endate : <input type="date" name="endateevent"/>
		location : <input type="text" name="locationevent"/>
		remarks : <input type="text" name="remarksevent"/>
		
		<input type="Submit"  value="Enter"></p>
	</form>
	</table>

    
    <?php 
    
 	     } 
 	}
 }

?>


</body>
</html>