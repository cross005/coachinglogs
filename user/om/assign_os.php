<?php
  //Check connection
  include("../../include/connection_om.php");

  $results = $db->query("SELECT * FROM users WHERE supervisor_name = '$username' ORDER BY user_fullname ASC");
  $results_os = $db->query("SELECT * FROM users WHERE username != '$username' 
                            AND position = 'OM' ORDER BY user_fullname ASC");
?>
<!Doctype html>
<html>
<head>
<title><?php echo $_SESSION['username']; ?> Create Coaching Log</title>
<link rel="stylesheet" type="text/css" href="../../styles/swa-custom-page-styles2.css" /> 
<link rel="stylesheet" href="../../styles/style.css" />
<script src="../../scripts/sys_coaching.js"></script>
<body onload = "resetField()">
  <div id="header">
    <div id="banner">
      <span id="textbanner">agent history records</span> 
    </div>
    <div id="phplog">
      <?php include("../../include/header_om.php");?>
    </div>
    <div id="version">
      08242015v1.11
    </div>    
  </div>
 
<form id="uploadimage" action="" method="post" name="form" enctype="multipart/form-data">
    <div id="body3">
        <span class="smart">My Current OS List:
            <select id = 'os_name'  name = 'os_name'>
               <option value = "OS">Select Operation Supervisor</option>
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
        <span class="smart">Assign selected OS to OM:
            <select id = 'om_name'  name = 'om_name'>
               <option value = "OM">Select Operations Manager</option>
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
        </span><br />
        <input type = "submit" name = "submit" value="Click here to assign now!" onclick="return check();" />
        <br/>
    </div>
</form>
</body>
</html>
<?php
  if(isset($_POST['submit'])){
    $os_name = $_POST['os_name'];
    $om_name = $_POST['om_name'];

      $results = $db->query("UPDATE users SET supervisor_name = '$om_name' WHERE username = '$os_name'");
      header("location:assign_os.php");

  }
?>