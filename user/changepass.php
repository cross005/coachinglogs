<?php
//Check connection
include("../include/connection_agent.php");
$results = $db->query("SELECT * FROM users WHERE username = '$username'");
while ($row = $results->fetch_assoc()) {
   $agent_pass = $row['password'];
}

?>
<!Doctype html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
    <link rel="stylesheet" type="text/css" href="../styles/swa-custom-page-styles2s.css">
	<script type="text/javascript" src = "../scripts/sys_validation.js"></script>
</head>
<body>

  <div id="header">
    <div id="banner">
      <span id="textbanner">change password</span> 
    </div>
    <div id="phplog">
      <?php include("../include/header_agent.php") ?>
    </div>
    <div id="version">
      08242015v1.11
    </div>    
  </div>

<br />

<div>
    <form action = '' method = 'post' enctype = 'multipart/form-data'>
	<div style='height:300px; border:1px solid #1f6e0c'>
	<div align='center'>
		Enter your old/temporary password: <br /> <input  class="inputs" type = 'password' name = 'old_pass' id = 'old_pass' required = 'required' onchange = 'togglePass(this)' />
		<br/><span id="confirmMessage_old"></span><br/>
        <div class="fieldWrapper">
            <label for="pass1">Enter your new password:</label><br />
            <input class="inputs" type="password" name="pass1" id="pass1">
        </div>
        <div class="fieldWrapper">
            <label for="pass2">Re-type your new password:</label><br />
            <input type="password" class="inputs" name="new_pass" id="pass2" onchange="checkPass();">
            <br/><span id="confirmMessage"></span>
        </div>
        <input disabled="disabled" class="inputs" type = 'submit' name = 'submit' id = 'submit' value = 'Change now' onclick='return theFunction();'/>
        <input type = 'hidden' value = '<?php echo $agent_pass; ?>' id = 'agent_pass' /><br />
</div>
    </form>
</div>
</div>

<?php
if(isset($_POST['submit'])){
	$new_pass = $_POST['new_pass'];
	

	$results = $db->query("UPDATE users SET password = '$new_pass' WHERE username = '$username'");
	header("location:index.php");
}

?>


</body>
</html>