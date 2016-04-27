<?php
Class eventsButtons{
/* Display events for teacher or student (specified 'teacher' or 'student' in entries) */
	public function listEvents($where){
		require_once dirname(__FILE__).'/../data/pathFinder.php';
		$pathFinder=new pathFinder;
		require_once $pathFinder->getDBAsker();
		$conn = DBAsker::iniServ ();
		if ($where=='teacher'){
			$reponse_e = $conn->query ( "Select event_name from event where teacher_id=" . $_SESSION ['logged'] );
		}else if($where=='student'){
			$reponse_e = $conn->query ( "Select event_name from subscription where student_id=" . $_SESSION ['logged'] );
		}else{
			echo '<p>Erreur d\'utilisation de la fonction, utiliser \'teacher\' ou \'student\'';
			exit();
		}
		echo '<table class=\'event_list\'>';
		echo '<tr>';
		$count = 0;
		while ( $donnee_e = $reponse_e->fetch () ) {
			if ($count < 10) {
				$count ++;
				echo '<td><button name=\'' . $donnee_e ['event_name'] . '\' value=\'' . $donnee_e ['event_name'] . '\'>' . $donnee_e ['event_name'] . '</button></td>';
			} else {
				if ($count == 10) {
					echo '<td><select name="extra-event" selected="0">';
					echo '<option value="0" selected disabled>More</option>';
				}
				$count ++;
				echo '<option value=\'' . $donnee_e ['event_name'] . '\'>' . $donnee_e ['event_name'] . '</option>';
			}
		}
		if ($count >= 10) {
			echo '</select></td>';
		}
		echo '</tr>';
		echo '</table>';
	}
}
?>