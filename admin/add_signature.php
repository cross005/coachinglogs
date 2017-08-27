<?php
//Check connection
include("../include/connection.php");
$results = $db->query("SELECT * FROM users WHERE signature = ''  ORDER BY user_fullname ASC");
  

?>
<!DOCTYPE html>
<html>
<body>
<?php include("../include/header_admin.php") ?>  
	<div id="spacing"></div>
	<form action="upload.php" method="post" name="form" enctype="multipart/form-data">
   		<select  name = 'agent_name'>
	        <option value = "Agent">Upload Signature:</option>
	            <?php while($row = $results->fetch_assoc()){ ?>
	        <option value="<?php echo $row['username']; ?>">
	            <?php echo $row['user_fullname']; ?> 
	              <?php }?>
	        </option>
       </select><br />
       Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    </form>

</body>
</html>