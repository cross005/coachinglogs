<?php
//Check connection
include("../../include/connection_om.php");

?>
<!Doctype html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../styles/styles.css">
</head>
<body>
<?php include("../../include/header_om.php");?>
<br /><br />

Add Operation Supervsior Account | <a href = 'index.php'>Back</a>
<hr><br />

<form action = '' method = 'post' enctype = 'multipart/form-data'>
	Username: <input type = 'text' name = 'username' required="required" /><br />
	Temporary-Password: <input type = 'password' name = 'temp_password' required="required" /><br />
	Employee ID: <input type = 'text' name = 'emp_id' required="required" /><br />
	OS Fullname : <input type = 'text' name = 'os_fullname' required="required" /><br />
	Signature: <input type="file" name="fileUpload" id="fileUpload" required="required"><br />
	<input type = 'submit' name = 'submit' value = 'Register' />
</form>

<?php
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$temp_password = $_POST['temp_password'];
	$emp_id = $_POST['emp_id'];
	$os_fullname = $_POST['os_fullname'];
	$position = 'OS';
	$db_picture = $_FILES["fileUpload"]["name"];




 if($_FILES["fileUpload"]["name"] == ""){
    	$results = $db->query("INSERT INTO `users`(`username`,`password`,`employee_id`,`user_fullname`,`position`) 
							   VALUES('$username','$temp_password','$emp_id','$os_fullname','$position')");
 }
 else{
    	$results = $db->query("INSERT INTO `users`(`username`,`password`,`employee_id`,`user_fullname`,`position`,`signature`) 
							   VALUES('$username','$temp_password','$emp_id','$os_fullname','$position','$db_picture')"); 	
 }

}

?>


</body>
</html>