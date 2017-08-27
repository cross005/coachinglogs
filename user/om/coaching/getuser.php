<?php
include("../../../include/connection_om.php");

$q = $_GET['q'];

$results = $db->query("SELECT * FROM users WHERE username = '".$q."'");
while ($row = $results->fetch_assoc()) {
    echo  $row['user_fullname'];

}

?>