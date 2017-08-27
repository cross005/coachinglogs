<?php
include("../../include/connection2.php");

$results = $db->query("SELECT * FROM users WHERE username = '$username'");
while ($row = $results->fetch_assoc()) {
   $agent_pass = $row['password'];
}

?>
<!Doctype html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../styles/styles.css">
	<script type="text/javascript" src = "../../scripts/sys_validation.js"></script>
</head>
<body>
<?php include("../../include/header_os1.php") ?>  
<hr><br />

<div class="tutorialWrapper">
    <form action = '' method = 'post' enctype = 'multipart/form-data'>
		Old Password: <input type = 'password' name = 'old_pass' id = 'old_pass' required = 'required' onchange = 'togglePass(this)' />
		<span id="confirmMessage_old" class="confirmMessage_old"></span><br/>
        <div class="fieldWrapper">
            <label for="pass1">Password:</label>
            <input type="password" name="pass1" id="pass1">
        </div>
        <div class="fieldWrapper">
            <label for="pass2">Confirm Password:</label>
            <input type="password" name="new_pass" id="pass2" onchange="checkPass();">
            <span id="confirmMessage" class="confirmMessage"></span>
        </div>
        <input disabled="disabled" type = 'submit' name = 'submit' id = 'submit' value = 'Submit' onclick='return theFunction();'/>
        <input type = 'hidden' value = '<?php echo $agent_pass; ?>' id = 'agent_pass' /><br />

    </form>
</div>

<?php
if(isset($_POST['submit'])){
	$new_pass = $_POST['new_pass'];
	

	$results = $db->query("UPDATE users SET password = '$new_pass' WHERE username = '$username'");
	header("location:../index.php");
}

?>


</body>
</html>