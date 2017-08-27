<?php
//Check connection
include("../../include/connection_om.php");
  
$results = $db->query("SELECT * FROM coaching_information WHERE status = 'Pending' AND dir_name !='jay.talosig'");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $_SESSION['username']; ?> Create Coaching Log</title>
	<link rel="stylesheet" type="text/css" href="../../styles/local_cdn/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="../../styles/swa-custom-page-styles2.css" />	
	<link rel="stylesheet" href="../../styles/style.css" />
	<script type="text/javascript" language="javascript" src="../../scripts/local_cdn/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" language="javascript" src="../../scripts/local_cdn/jquery.dataTables.min.js">
	</script>
	<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
		$("a.change_status").click(function(e) {

		   	    var status_id = $(this).attr('href').split('=');                    
		        var dataString = 'lang=' + status_id[1];

		        $.ajax({
		           type: "POST",
		            url: "passvalue.php",
		            data: dataString,
		            dataType: 'json',
		            cache: false,
		            success: function(response) {
		                	 }
		        });
		        return true;
		    });

		$('table.display').DataTable({
			"order": [[ 1, "desc" ]]
		});
	});
	</script>
</head>

<body>
	<div id="header">
		<div id="banner">
			<span id="textbanner">coaching records</span> 
		</div>
		<div id="phplog">
 			<?php include("../../include/header_om.php");?>
		</div>
		<div id="version">
			08242015v1.11
		</div>		
	</div>
	<div id="spacing"></div>
	<div>
		<section>
			<table id="" class="display" cellspacing="0" width="100%">
				<thead>
					<tr align="left">
						<th>Ref #</th>
						<th>Date</th>
						<th>Emp #</th>
						<th>Agent</th>
						<th>OS</th>
						<th>OM</th>
						<th>Status</th>
						<th>Info Link</th>
					</tr>
				</thead>


				<tbody>
					<?php
					while($row = $results->fetch_assoc()){
						echo "<tr>";
						echo "<td>".$row['reference_no']."</td>";
						echo "<td>".$row['date']."</td>";
						echo "<td>".$row['agent_employee_id']."</td>";
						echo "<td>".$row['agent_fullname']."</td>";
						echo "<td>".$row['supervisor_name']."</td>";
						echo "<td>".$row['om_name']."</td>";
						echo "<td>".$row['status']."</td>";
						echo "<td><a class='change_status' href='view.php?id=".$row['reference_no']."'>View Information</a></td>";
						echo "</tr>";
					}
					?>

				</tbody>
			</table>	
		</section>
	</div>
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <div id="spacer100">
      
    </div>    
    <div id="footer"><div id="insidespacer100">Copyright &copy; 2015. All Rights Reserved.</div></div>
</body>
</html>