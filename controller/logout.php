<?php
session_start ();
session_destroy ();
header ( 'Location: ../viewer/index.php' );
?>