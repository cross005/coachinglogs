<?php
  //Check connection
  include("../include/connection.php");
  $username = $_SESSION['username'];
  $results = $db->query("SELECT * FROM users WHERE supervisor_name = '$username' ORDER BY user_fullname ASC");
?>
<!Doctype html>
<html>
<head>
<title><?php echo $_SESSION['username']; ?> Create Coaching Log</title>
<link rel="stylesheet" type="text/css" href="../styles/swa-custom-page-styles2.css" /> 
<link rel="stylesheet" href="../styles/style.css" />
<script src="../scripts/jquery.min.js.js"></script>
<body>
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
 
<form action="view_history_result.php" method="post" name="form" enctype="multipart/form-data">
    <div id="body3">
        <span class="smart">My Current Agents List:
            <select  name = 'agent_name' id = 'agent_name'>
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
        </span>
        <input type="submit" name="submit" value="Search"/>
         <br/>
    </div>
</form>
</body>
</html>
