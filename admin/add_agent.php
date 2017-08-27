<?php
//Check connection
include("../include/connection.php");
$results = $db->query("SELECT * FROM users WHERE position = 'OS' ORDER BY user_fullname ASC");


?>
<?php include("../include/header_admin.php") ?>  
<div id="spacing"></div>
 

<form action = '' method = 'post' enctype = 'multipart/form-data'>
	Agent Username: <input type = 'text' name = 'username' required="required" /><br />
	Select Supervisor Name: 
	<select  name = 'os_name'>
	    <?php while($row = $results->fetch_assoc()){ ?>
	   	    <option value="<?php echo $row['username']; ?>">
	          	<?php echo $row['user_fullname']; ?> 
	        <?php }?>
	        </option>
    </select><br />
	Temporary-Password: <input type = 'password' name = 'temp_password' required="required" /><br />
	Employee ID: <input type = 'text' name = 'emp_id' required="required" /><br />
	Agent Fullname : <input type = 'text' name = 'agent_fullname' required="required" /><br />
	Signature: <input type="file" name="fileUpload" id="fileUpload" required="required"><br />
	<input type = 'submit' name = 'submit' value = 'Register' />
</form>

<?php
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$os_name = $_POST['os_name'];
	$temp_password = $_POST['temp_password'];
	$emp_id = $_POST['emp_id'];
	$agent_fullname = $_POST['agent_fullname'];
	$position = 'Agent';
	$filename = $_FILES["fileUpload"]["name"];



  	if($filename != null){
	    $validextensions = array("jpeg", "jpg", "png");
	    $temporary = explode(".", $_FILES["fileUpload"]["name"]);
	    $file_extension = end($temporary);

		if (
		       (
		       ($_FILES["fileUpload"]["type"] == "image/png") || 
		       ($_FILES["fileUpload"]["type"] == "image/jpg") || 
		       ($_FILES["fileUpload"]["type"] == "image/jpeg")
		        )
		        && ($_FILES["fileUpload"]["size"] < 1000000) && in_array($file_extension, $validextensions)
		        )
		        {

		          if ($_FILES["fileUpload"]["error"] > 0){
		            echo "Return Code: " . $_FILES["fileUpload"]["error"] . "<br/><br/>";
		          }

		          else{
		            if (file_exists("../cms/coaching/upload/" . $_FILES["fileUpload"]["name"])){

		              echo "<script>alert('$filename already exists.')</script>";
		            }

		            else{
		                  //For filename
		                  $sourcePath = $_FILES['fileUpload']['tmp_name']; // Storing source path of the file in a variable
		                  $targetPath = "../cms/coaching/upload/".$_FILES['fileUpload']['name']; // Target path where file is to be stored
		                  move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

		                  $results = $db->query("INSERT INTO `users`(`username`,`password`,`employee_id`,`user_fullname`,`position`,`supervisor_name`,`signature`) 
							   VALUES('$username','$temp_password','$emp_id','$agent_fullname','$position','$os_name','$filename')");

		                  echo "<script>alert('Agent Added')</script>";
		                  echo "<script>location.href='add_agent.php'</script>";           
		            }
		          }
		      }
	}
}

?>


</body>
</html>