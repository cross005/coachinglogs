<?php
//Check connection
include("../include/connection.php");

$results = $db->query("SELECT * FROM users WHERE position = 'Sub' ORDER BY user_fullname ASC");
$results1 = $db->query("SELECT * FROM users WHERE position = 'OM' ORDER BY user_fullname ASC");
$results2 = $db->query("SELECT * FROM coaching_information WHERE status = 'Pending' ORDER BY user_fullname ASC");

?>
<?php include("../include/header_admin.php") ?>  
  <div id="spacing"></div>

  <form action="" method="post" name="form" enctype="multipart/form-data">
      <b>Assign Role:<b/>
      <select name = 'om'>
              <?php while($row = $results1->fetch_assoc()){ ?>
          <option value="<?php echo $row['username']; ?>">
              <?php echo $row['user_fullname']; ?> 
                <?php }?>
          </option>
       </select>  
      ------><select  name = 'sub_om'>
              <?php while($row = $results->fetch_assoc()){ ?>
          <option value="<?php echo $row['username']; ?>">
              <?php echo $row['user_fullname']; ?> 
                <?php }?>
          </option>
       </select>
       <input type = 'submit' name = 'submit' />
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
  $om = $_POST['om'];
  $sub_om = $_POST['sub_om'];


  $results4 = $db->query("UPDATE coaching_information SET om_name = '$sub_om' 
                          WHERE status = 'Pending' AND om_name = '$om'");

  $results = $db->query("UPDATE users SET position = 'OM' WHERE username = '$sub_om'");
  $results1 = $db->query("UPDATE users SET position = 'Sub' WHERE username = '$om'");
  $results2 = $db->query("UPDATE users SET supervisor_name = '$sub_om' WHERE supervisor_name = '$om'");

  


  echo "<script>alert('Acknowledgement Successful!')</script>";
  echo "<script>location.href='index.php'</script>"; 
}

?>