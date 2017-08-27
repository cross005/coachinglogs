<?php
include("../include/connection_agent.php");

$id = $_GET['id'];

$results = $db->query("SELECT * FROM coaching_information WHERE coaching_info_id = '$id'");
while ($row = $results->fetch_assoc()) {
	$agent_fullname = $row['agent_fullname'];
	$shift = $row['shift'];
	$date = $row['date'];
	$mv_fb = $row['motivational_feedback'];
	$dev_fb = $row['developmental_feedback'];
	$action_plan = $row['action_plan'];
	$timeline = $row['timeline'];
}
?>
<!Doctype html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
<?php include("../include/header_agent.php") ?>
<span>V2T OPERATIONS</span><br />
<span>ScopeWorks Asia, Inc.</span><br /><br />

<span id = "head_info">Agent's Name:</span> <?php echo $agent_fullname; ?> 
<span id = "head_info">Shift:</span> <?php echo $shift; ?> 
<span id = "head_info">Date:</span> <?php echo $date; ?><br /><br /><br />

	<center>MOTIVATIONAL FEEDBACK</center> <hr>
  	<textarea disabled = 'disabled' name = "motiv_fb" cols = '175px' rows = '5px' ><?php echo $mv_fb; ?></textarea><br /><br />
  	<center>DEVELOPMENTAL FEEDBACK</center> <hr>
  	<textarea disabled = 'disabled' name = "dev_fb" cols = '175px' rows = '5px' ><?php echo $dev_fb; ?></textarea><br /><br />
  	<center>ACTION PLAN</center> <hr>
  	<textarea disabled = 'disabled' name = "action_plan" cols = '175px' rows = '5px' ><?php echo $action_plan; ?></textarea><br /><br />
  	<center>TIMELINE</center> <hr>
  	<textarea disabled = 'disabled' name = "time_line" cols = '175px' rows = '5px' ><?php echo $timeline; ?></textarea><br /><br />

  	<i>*By affixing my signature below, I hereby confirm that contents of this document have been fully
  		discussed with me and that I accept ang agree to all commitments, goal or aggreement set herin.</i><br /><br />

  	_________________________________________<br/>
  	<span id = 'signature'> Agents Signature </span> <br/><br/><br/>


  	_________________________________________<br/>
  	<span id = 'os_signature'> Operation's Supervisor Signature </span> <br/><br/><br/>


  	_________________________________________<br/>
  	<span id = 'om_signature'> Shift Manager's Signature </span> <br/><br/><br/>

</body>
</html>
