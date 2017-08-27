<?php

	$db = new mysqli('localhost', 'root', '', 'coaching_system');

	if($db->connect_errno){
		echo "Failed to connect to Mysqli:", $db->connect_errno;
	}

	session_start();
?>