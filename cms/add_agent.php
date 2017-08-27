<?php
//Check connection
include("../include/connection.php");
$os_name = $_SESSION['username'];
?>
<!Doctype html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../styles/local_cdn/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="../styles/datatables.css" />
	<link rel="stylesheet" type="text/css" href="../styles/swa-custom-page-styles2.css" />	
	<link rel="stylesheet" href="../styles/style.css" />
</head>
<body>
	<div id="header">
		<div id="banner">
			<span id="textbanner">coaching records</span> 
		</div>
		<div id="phplog">
			<?php include("../include/header_os.php") ?>
		</div>
		</div>
		<div id="version">
			08242015v1.11
		</div>		
	</div>
	<div id="spacing"></div>
 

<form action = '' method = 'post' enctype = 'multipart/form-data'>
	Username: <input type = 'text' name = 'username' required="required" /><br />
	Temporary-Password: <input type = 'password' name = 'temp_password' required="required" /><br />
	Employee ID: <input type = 'text' name = 'emp_id' required="required" /><br />
	Agent Fullname : <input type = 'text' name = 'agent_fullname' required="required" /><br />
	<input type = 'submit' name = 'submit' value = 'Register' />
</form>

<?php
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$temp_password = $_POST['temp_password'];
	$emp_id = $_POST['emp_id'];
	$agent_fullname = $_POST['agent_fullname'];
	$position = 'Agent';


    $results = $db->query("INSERT INTO `users`(`username`,`password`,`employee_id`,`user_fullname`,`position`,`supervisor_name`) 
						   VALUES('$username','$temp_password','$emp_id','$agent_fullname','$position','$os_name')");
}

?>


</body>
</html>