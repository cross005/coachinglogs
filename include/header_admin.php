<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $_SESSION['username']; ?> Coaching Records</title>
 	<link rel="stylesheet" type="text/css" href="../styles/swa-custom-page-styles2.css" />	
	<link rel="stylesheet" href="../styles/style.css" />
</head>

<body>
	<div id="header">
		<div id="banner">
			<span id="textbanner">coaching records</span> 
		</div>
		<div id="phplog">
			<?php echo "Hello <span id='user'>".$_SESSION['username']."</span>!"; ?>
			|<a class="whitetext" href="index.php"> Reset Password</a>  
			|<a class="whitetext" href="add_agent.php"> Enroll Agent</a>  
			<!--| <a class="whitetext" href="assign_role.php">assign role(including pending tickets)</a>-->
			| <a class="whitetext" href="../include/logout.php"> Logout</a>  
		</div>
		</div>
		<div id="version">
			08242015v1.11
		</div>		
	</div>