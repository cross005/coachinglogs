<?php
//Check connection
include("../include/connection.php");
$results = $db->query("SELECT * FROM users WHERE position != 'Admin' ORDER BY user_fullname ASC");
  

?>
<?php include("../include/header_admin.php") ?>  
	<div id="spacing"></div>
	<form action="" method="post" name="form" enctype="multipart/form-data">
   		<select  name = 'agent_name'>
	        <option value = "Agent">Reset Password:</option>
	            <?php while($row = $results->fetch_assoc()){ ?>
	        <option value="<?php echo $row['username']; ?>">
	            <?php echo $row['user_fullname']; ?> 
	              <?php }?>
	        </option>
       </select><br />
       <input type = 'text' name = 'res_pass1' /><br />
       <input type = 'submit' name = 'submit' />
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
  $agent_name = $_POST['agent_name'];
  $res_pass1 = $_POST['res_pass1'];
  $res_pass = htmlentities($res_pass1, ENT_QUOTES);  

  $results = $db->query("UPDATE users SET password = '$res_pass' WHERE username = '$agent_name'");
  echo "<script>alert('Acknowledgement Successful!')</script>";
  echo "<script>location.href='index.php'</script>"; 
}

?>