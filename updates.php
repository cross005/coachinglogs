<?php


include("include/connection_login.php");

	$results = $db->query("SELECT * FROM push");
	while ($row = $results->fetch_assoc()) {
  		$message = $row['message'];
  		$date_today = $row['date_today'];
  		$updated_by = $row['updated_by'];
	}
?>

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
		setInterval(function() {
                  window.location.reload();
                }, 60000); 
	</script>
</head>

<body onload="FocusOnInput();">

<form action = "" method = "post">

	<div id="header">
		<div id="phplog">
			
		</div>
		<div id="banner">
			<span id="textbanner">system updates</span> 
		</div>
		<div id="version">
			01192016v1.39
		</div>		
	</div>



<center>
<p>
<strong>MESSAGE BOARD LAST UPDATED on <?php echo $date_today; ?></strong> by <?php echo $updated_by; ?><br \><br \>
<textarea disabled="disabled" style="width:40em;height:30em;overflow:hidden"><?php echo $message;?></textarea>
<br /><br />
</p>
<a href='index.php'>Back to login page</a>

</center>

</form>


</body>
</html>
