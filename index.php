

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to SWA Coaching Log System</title>
	<link rel="stylesheet" type="text/css" href="styles/swa-custom-page-styles2.css">
	<script type="text/javascript">
		function FocusOnInput()
		{
		     document.getElementById("InputID").focus();
		}
</script>

<style type="text/css">
.removediv {
display: none !important;
}
</style>

</head>

<body onload="FocusOnInput();">

<form action = "" method = "post">

	<div id="header">
		<div id="phplog">
			
		</div>
		<div id="banner">
			<span id="textbanner">swa coaching logs system</span> 
		</div>
		<div id="version">
			01192016v1.39
		</div>		
	</div>

<div id="spacing"></div>
<br/><br/><br/><br/><br/><br/>

	<div id="div100">
		<div id="div101">
			<strong>Username</strong>
		</div>
		<div id="div102">
			<input type="text" class="inputs" name = "txt_username" required id="InputID"/>
		</div>
		<div id="div103">
			<strong>Password</strong>
		</div>
		<div id="div104">
			<input type="password" class="inputs" style="" required name = "txt_password" id="pass" />
		</div>
		<button type="submit" id="submit-button" class="myButton" name = "btn_login">Log in</button>
		
	</div>
	<div id="div105"></div>

<center>
</center>

</form>


</body>
</html>

<?php
//Check connection
include("include/connection_login.php");

	if(isset($_POST['btn_login'])){
		$username = $_POST['txt_username'];
		$password = $_POST['txt_password'];


		//Login for Admin
		$results = $db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' AND position = 'Admin'");
		$chk_rows = mysqli_num_rows($results);

		if($chk_rows != 0){
			while($row = $results->fetch_assoc()){
				$db_uname = $row['username'];
				$db_password = $row['password'];
				$position = $row['position'];
			}

			if($username == $db_uname && $password = $db_password){
				$_SESSION['logged_in'] = true;
				$_SESSION['username'] = $username;
				header("location:admin/index.php");
			}
		}


		//Login for Director
		$results = $db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' 
			AND position = 'Dir'");
		$chk_rows = mysqli_num_rows($results);

		if($chk_rows != 0){
			while($row = $results->fetch_assoc()){
				$db_uname = $row['username'];
				$db_password = $row['password'];
				$position = $row['position'];
			}

			if($username == $db_uname && $password = $db_password){
				$_SESSION['logged_in'] = true;
				$_SESSION['username'] = $username;
				header("location:director/index.php");
			}
		}

		//Login for OS
		$results = $db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' AND position = 'OS'");
		$chk_rows = mysqli_num_rows($results);

		if($chk_rows != 0){
			while($row = $results->fetch_assoc()){
				$db_uname = $row['username'];
				$db_password = $row['password'];
				$position = $row['position'];
			}

			if($username == $db_uname && $password = $db_password){
				$_SESSION['logged_in'] = true;
				$_SESSION['username'] = $username;
				header("location:cms/index.php");
			}
		}

		//Login for Agent
		$results = $db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' AND position = 'Agent'");
		$chk_rows = mysqli_num_rows($results);

		if($chk_rows != 0){
			while($row = $results->fetch_assoc()){
				$db_uname = $row['username'];
				$db_password = $row['password'];
			}

			if($username == $db_uname && $password = $db_password){
				$_SESSION['logged_in'] = true;				
				$_SESSION['agent_username'] = $username;
				header("location:user/index.php");
			}
		}


		//Login for OM
		$results = $db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password' AND position = 'OM'");
		$chk_rows = mysqli_num_rows($results);

		if($chk_rows != 0){
			while($row = $results->fetch_assoc()){
				$db_uname = $row['username'];
				$db_password = $row['password'];
			}

			if($username == $db_uname && $password = $db_password){
				$_SESSION['logged_in'] = true;				
				$_SESSION['om_username'] = $username;
				header("location:user/om/index.php");
			}
		}

		else{
			//$error = 'Try Again!';
			echo "<script> document.getElementById('div105').innerHTML = 'User name or password is incorrect, \\n please try again!' </script>";
		}

		mysqli_close($db);
	}

	if(isset($_POST['btn_register'])){
		header("location:register.php");
	}


?>