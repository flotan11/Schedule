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
require '../../controller/check.php';
$check=new check;
if (!$check->rejectIfDiffer('root')){
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
   <hr>
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
		<p><div id="text">student_id : </div><input type="text" name="student_idstudent"/>
		<p><div id="text">logincode : </div><input type="text" name="login_codestudent"/>
		<p><div id="text">firstname : </div><input type="text" name="firstnamestudent"/>
		<p><div id="text">prefix : </div><input type="text" name="prefixstudent"/>
		<p><div id="text">lastname : </div><input type="text" name="lastnamestudent"/>
		<p><div id="text">group_name : </div><input type="text" name="group_namestudent"/>
		<p><div id="text">email : </div><input type="text" name="emailstudent"/>
		<p><div id="text">Team  : </div><input type="text" name="team_namestudent"/>
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
		<p><div id="text">teacher_id :</div> <input type="text" name="teacher_idteacher"/>
		<p><div id="text">logincode : </div><input type="text" name="logincodeteacher"/>
		<p><div id="text">firstname : </div><input type="text" name="firstnameteacher"/>
		<p><div id="text">prefix : </div><input type="text" name="prefixteacher"/>
		<p><div id="text">lastname : </div><input type="text" name="lastnameteacher"/>
		<p><div id="text">email :</div> <input type="text" name="emailteacher"/>
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
		<p><div id="text">event_name : </div><input type="text" name="event_namesubscription"/>
		<p><div id="text">student_id : </div><input type="text" name="student_idsubscription"/>
		<p><div id="text">date :</div> <input type="date" name="datesubscription"/>
		<p><div id="text">time :</div></div> <input type="time" name="timesubscription"/>
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
		<p><div id="text">event_name : </div><input type="text" name="event_nameevent"/>
		<p><div id="text">teacher_id : </div><input type="text" name="teacher_idevent"/>
		<p><div id="text">startdate : </div><input type="date" name="startdateevent"/>
		<p><div id="text">endate : </div><input type="date" name="endateevent"/>
		<p><div id="text">location : </div><input type="text" name="locationevent"/>
		<p><div id="text">remarks : </div><input type="text" name="remarksevent"/>
		
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