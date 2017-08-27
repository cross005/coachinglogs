<?php
include("../include/connection_agent.php");

$results = $db->query("SELECT * FROM users WHERE username = '$username'");
while ($row = $results->fetch_assoc()) {
  $agent_password = $row['password'];
}

if(isset($_POST['password']) || isset($_POST['hid_id'])){
	$password = $_POST['password'];
	$id = $_POST['hid_id'];
	if($agent_password != $password){
		
		header('location:view.php?id='.$id.'');
	}
}



$results = $db->query("SELECT * FROM users WHERE username = '$os_name'");
while ($row = $results->fetch_assoc()) {
  $os_signature1 = $row['signature'];
}

$results = $db->query("SELECT * FROM coaching_information WHERE reference_no = '$id'");
while ($row = $results->fetch_assoc()) {
  $os_name = $row['supervisor_name'];
}

if(isset($_POST['submit'])){
	  $password = $_POST['password'];
	  $hid_text1 = $_POST['hid_text'];
	  $hid_text = htmlentities($hid_text1, ENT_QUOTES);
	  if($password == $agent_password){
	    $results = $db->query("UPDATE coaching_information SET agent_confirmation = 'Ok', agent_commitment = '$hid_text', os_signature = '$os_signature1'  WHERE reference_no = '$id'");
	    header("location:index.php");
	  }
}

?>