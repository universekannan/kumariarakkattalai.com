<?php

$preferences = parse_ini_file("settings.ini");

$session_timeout = $preferences['session_timeout'];

$idle_time = 60 * $session_timeout;

if (time()-$_SESSION['timestamp']>$idle_time){

  session_destroy();

  session_unset();

  header("location: index.php");

}else{

  $_SESSION['timestamp']=time();

}

$_SESSION['timestamp']=time();

