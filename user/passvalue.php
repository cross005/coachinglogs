<?php session_start();

$_SESSION['SESS_LANGUAGE'] = $_POST['lang'];

$_SESSION['SESS_LANGUAGE'] = $_SESSION['SESS_LANGUAGE'];

print json_encode(array('message' => $_SESSION['SESS_LANGUAGE']));
die();


?>