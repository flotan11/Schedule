<?php
$servername = "home.spijkerman.nl";
$username = "subs";
$password = "sub564-A";
$dbname = "subs";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
   /* $sql = "INSERT INTO teacher (teacher_id,logincode,firstname, prefix,lastname,email)
    VALUES (3,'teacher3','f_teacher3','pteacher3','l_teacher3','em_teacher3')";
    
    $sql = "INSERT INTO event (event_name,teacher_id,startdate,endate,location,remarks)
    VALUES ('event_name15','1','2017-01-01','2017-01-01','Avans','remarks15')";
   
    $sql = "INSERT INTO subscription (event_name,student_id,date, time)
    VALUES ('',123456789,'2017-01-01', '11:00:00')";
    */
    $sql = "INSERT INTO student (student_id,login_code,firstname, prefix,lastname,group_name ,email)
    VALUES (123, '123', 'azertyuiop', 'deer' ,'84^qsdfghjklm', 'Lille1', '..@gmail.com')";
  /*
   * 
    $sql = "INSERT INTO belong (student_id,team_id)
    VALUES (123456987,123)";
    */
    /*
    $sql = "INSERT INTO team (team_id,event_name,name)
    VALUES (123,'event_name3','name')";*/
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