<?php

	$db = new mysqli('localhost', 'root', '', 'coaching_system');

	if($db->connect_errno){
		echo "Failed to connect to Mysqli:", $db->connect_errno;
	}

	session_start();

if (empty($_SESSION['logged_in']))
{
	header("location:../index.php");
}
$username = $_SESSION['agent_username'];
?>