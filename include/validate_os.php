  <?php
	  $username = $_SESSION['username'];
	  $results = $db->query("SELECT position FROM users WHERE username = '$username'");
	  while ($row = $results->fetch_assoc()) {
		$position = $row['position'];
	  }
  ?>