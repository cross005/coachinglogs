<?php
include("../../include/connection2.php");

$q = $_GET['q'];

$results = $db->query("SELECT * FROM users WHERE username = '".$q."'");
while ($row = $results->fetch_assoc()) {
    echo  $row['user_fullname'];

}

?>