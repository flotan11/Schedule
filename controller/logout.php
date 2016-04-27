<?php
session_start ();
session_destroy ();
require_once dirname(__FILE__).'/../data/pathFinder.php';
$pathFinder=new pathFinder;
header ( 'Location: '.$pathFinder->getIndex());
?>