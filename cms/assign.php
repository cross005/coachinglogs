<?php
  //Check connection
  include("../include/connection.php");
  $username = $_SESSION['username'];
  $results = $db->query("SELECT * FROM users WHERE supervisor_name = '$username' OR supervisor_name = '' ORDER BY user_fullname ASC");
  $results_os = $db->query("SELECT * FROM users WHERE username !=  '$username' AND position = 'OS' ORDER BY user_fullname ASC");
?>
<!Doctype html>
<html>
<head>
<title><?php echo $_SESSION['username']; ?> Create Coaching Log</title>
<link rel="stylesheet" type="text/css" href="../styles/swa-custom-page-styles2.css" /> 
<link rel="stylesheet" href="../styles/style.css" />
<script src="../scripts/sys_coaching.js"></script>
<body onload = "resetField()">
  <div id="header">
    <div id="banner">
      <span id="textbanner">agent history records</span> 
    </div>
    <div id="phplog">
      <?php include("../include/header_os.php") ?>
    </div>
    <div id="version">
      08242015v1.11
    </div>    
  </div>
 
<form id="uploadimage" action="" method="post" name="form" enctype="multipart/form-data">
    <div id="body3">
        <span class="smart">My Current Agents List:
            <select id = 'agent_name'  name = 'agent_name'>
               <option value = "Agent">Select agent</option>
               <?php
                 while($row = $results->fetch_assoc()){            
               ?>
                   <option value="<?php echo $row['username']; ?>">
                   <?php
                      echo $row['user_fullname'];
                    ?> <?php 
                  }?>
                   </option>
            </select>         
        </span><br />
        <span class="smart">Assign selected agent to OS:
            <select id = 'os'  name = 'assigned_to'>
               <option value = "OS">Select supervisor</option>
               <?php
                 while($row1 = $results_os->fetch_assoc()){            
               ?>
                   <option value="<?php echo $row1['username']; ?>">
                   <?php
                      echo $row1['user_fullname'];
                    ?> <?php 
                  }?>
                   </option>
            </select>         
        </span>
        <input type = "submit" name = "submit" value="Click here to assign now!" onclick="return check();" />
        <br/>


                  <span id="osname"></span>

    </div>
</form>
</body>
</html>
<?php
  if(isset($_POST['submit'])){
    $agent_name = $_POST['agent_name'];
    $assigned_to = $_POST['assigned_to'];

      $results = $db->query("UPDATE users SET supervisor_name = '$assigned_to' WHERE username = '$agent_name'");
      $results1 = $db->query("UPDATE coaching_information SET current_os = '$assigned_to' WHERE agent_username = '$agent_name' AND status = 'Approved' ");
      echo "<script type='text/javascript'>
              alert('Acknowledgement Successful!');
              location.href='assign.php'
            </script>";

  }
?>