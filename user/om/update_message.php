<?php
//Check connection
include("../../include/connection_om.php");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $_SESSION['username']; ?> Create Coaching Log</title>
  <link rel="stylesheet" type="text/css" href="../../styles/swa-custom-page-styles2.css" /> 
  <link rel="stylesheet" href="../../styles/style.css" />
<script type="text/javascript">
      function theFunction () {

      if (confirm("Are you sure you want to post this message?") == true) {       
          return true;
      } else {
          return false;
      }

    }
</script>
</head>

<body>
  <div id="header">
    <div id="banner">
      <span id="textbanner">message board</span> 
    </div>
    <div id="phplog">
      <?php include("../../include/header_om.php");?>
    </div>
    <div id="version">
      08242015v1.40
    </div>    
  </div>
  <div id="spacing"></div>
  <div align="center">
  <form action='' method="post">
    What would you want to say?<br /><br />
    <textarea style="width:40em;height:20em;border:1px solid orange" name = 'message' required = 'required' id = 'message' placeholder="Enter updates here..."></textarea>
    <br /><br />
    <input type = 'submit' name = 'submit' value = 'post message' onclick='return theFunction();' />
  </form>
  </div>
  <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <div id="spacer100">
      
    </div>    
    <div id="footer"><div id="insidespacer100">Copyright &copy; 2015. All Rights Reserved.</div></div>

    
</body>
</html>

<?php
$Today = date('m/d/y G:i');

if(isset($_POST['submit'])){

  $message1 = $_POST['message'];
  $message = htmlentities($message1, ENT_QUOTES);

  $results = $db->query("INSERT INTO `push`(`message`,`date_today`,`updated_by`) 
                         VALUES('$message','$Today','$username')");

}
?>




