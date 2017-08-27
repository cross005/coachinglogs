<?php
//Check connection
include("../../include/connection_om.php");

$id = $_GET['id'];

$results = $db->query("SELECT * FROM coaching_information WHERE reference_no = '$id'");
while ($row = $results->fetch_assoc()) {
  $status = $row['status'];

}




if($status == 'Approved'){
  header("location:index.php");
}
if($status == 'Pending'){
  echo "<script type='text/javascript'>alert('Successfully delete your coaching record.');</script>";
  $delete_coaching_logs = $db->query("DELETE FROM coaching_information WHERE reference_no = '$id'");
  header("location:os_coaching.php");

}




?>
