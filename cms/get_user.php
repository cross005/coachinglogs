<link rel="stylesheet" type="text/css" href="../styles/swa-custom-page-styles2.css" /> 
<link rel="stylesheet" href="../styles/style.css" />
<?php
 	 //Check connection
    include("../include/connection_om.php");
	$username = $_SESSION['username'];

	$q = $_GET['q'];
    $results = $db->query("SELECT * FROM coaching_information WHERE agent_username = '".$q."'");

    echo "<table id='' class='display' cellspacing='0' width='100%'>";
    echo "<tbody>";
	echo "<thead>";
	echo "<tr>";

	echo "<th>Reference #</th>";
	echo "<th>Date</th>";
	echo "<th>Employee #</th>";
	echo "<th>Agent</th>";
	echo "<th>OS</th>";
	echo "<th>OM</th>";
	echo "<th>Status</th>";
	echo "<th>Info Link</th>";
	echo "</tr>";
	echo "</thead>";
	while($row = $results->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$row['reference_no']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "<td>".$row['agent_employee_id']."</td>";
		echo "<td>".$row['agent_fullname']."</td>";
		echo "<td>".$row['supervisor_name']."</td>";
		echo "<td>".$row['om_name']."</td>";
		echo "<td>".$row['status']."</td>";
		echo "<td><a class='change_status' href='view_info.php?id=".$row['reference_no']."'>View Information</a></td>";
		echo "</tr>";
	}

	echo "</tbody>";
	echo "</table>";

?>