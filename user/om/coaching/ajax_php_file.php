<?php
  include("../../../include/connection_om.php");

  $today1 = substr((string)microtime(), 1, 0);
  $ref_no = date('YmdHis'.$today1);

  $Today = date('m/d/y g:i A');
    
  //Process for uploading screenshot in Motivational Feedback 
  $filename = $_FILES['file']['name'];
  $filename1 = $_FILES['file1']['name'];

  $agent_name = $_POST['agent_name'];
  $shift = $_POST['shift'];
  $motiv_fb1 = $_POST['motiv_fb'];
  $motiv_fb = htmlentities($motiv_fb1, ENT_QUOTES);
  $dev_fb1 = $_POST['dev_fb'];
  $dev_fb = htmlentities($dev_fb1, ENT_QUOTES);
  $action_plan1 = $_POST['action_plan'];
  $action_plan = htmlentities($action_plan1, ENT_QUOTES);
  $time_line1 = $_POST['time_line'];
  $time_line = htmlentities($time_line1, ENT_QUOTES);
  $dir_name = $_POST['hidden1'];
  $status = 'Pending';



  $results1 = $db->query("SELECT * FROM users WHERE username = '$agent_name'");
  while ($row = $results1->fetch_assoc()) {
    $agent_fullname = $row['user_fullname'];
    $signature = $row['signature'];
    $employee_id = $row['employee_id'];
  }


  if($agent_name == "Agent"){
    echo "<script>alert('You have not selected an os on the list. Please try again!')</script>";
    return false;
  }

  if($filename != "" && $filename1 == ""){
    

    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    
    if (
       (
       ($_FILES["file"]["type"] == "image/png") || 
       ($_FILES["file"]["type"] == "image/jpg") || 
       ($_FILES["file"]["type"] == "image/jpeg")
        )
        && ($_FILES["file"]["size"] < 1000000) && in_array($file_extension, $validextensions)
        )
        {
          
          if ($_FILES["file"]["error"] > 0){
            echo "Return Code: " . $_FILES["file1"]["error"] . "<br/><br/>";
          }

          else{
            if (file_exists("upload/" . $_FILES["file"]["name"]) || file_exists("upload/" . $_FILES["file"]["name"]) ){

              echo "<script>alert('$filename already exists.')</script>";
            }

            else{
                  //For filename
                  $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                  $targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
                  move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

                  $results = $db->query("INSERT INTO `coaching_information`(`reference_no`, `status`, `agent_employee_id`, `agent_username`, `agent_fullname`, `date`, `om_name`, `dir_name`, `shift`, `motivational_feedback`, `developmental_feedback`, `action_plan`, `timeline`, `agent_signature`, `df_screenshot`, `mf_screenshot`)

                           VALUES ('$ref_no', '$status', '$employee_id', '$agent_name', '$agent_fullname', '$Today', '$username', '$dir_name', '$shift', '$motiv_fb', '$dev_fb', '$action_plan', '$time_line', '$signature', '$filename1', '$filename')");

                  echo "<script>location.href='../index.php'</script>";           
            }
          }
      }
  }

  //Process for uploading screenshot in Developmental Feedback 
  if($filename1 != "" && $filename == ""){
    

    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file1"]["name"]);
    $file_extension = end($temporary);

    if (
       (
       ($_FILES["file1"]["type"] == "image/png") || 
       ($_FILES["file1"]["type"] == "image/jpg") || 
       ($_FILES["file1"]["type"] == "image/jpeg")
        )
        && ($_FILES["file1"]["size"] < 1000000) && in_array($file_extension, $validextensions)
        )
        {
          echo "<script type='text/javascript'>alert('asdasdasd');</script>";
          if ($_FILES["file1"]["error"] > 0){
            echo "Return Code: " . $_FILES["file1"]["error"] . "<br/><br/>";
          }

          else{
            if (file_exists("upload/" . $_FILES["file1"]["name"])){

              echo "<script>alert('$filename1 already exists.')</script>";
            }

            else{
                  //For filename
                  $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                  $targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
                  move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

                  //for filename1
                  $sourcePath1 = $_FILES['file1']['tmp_name']; // Storing source path of the file in a variable
                  $targetPath1 = "upload/".$_FILES['file1']['name']; // Target path where file is to be stored
                  move_uploaded_file($sourcePath1,$targetPath1) ; // Moving Uploaded file

                  $results = $db->query("INSERT INTO `coaching_information`(`reference_no`, `status`, `agent_employee_id`, `agent_username`, `agent_fullname`, `date`, `om_name`, `dir_name`, `shift`, `motivational_feedback`, `developmental_feedback`, `action_plan`, `timeline`, `agent_signature`, `df_screenshot`, `mf_screenshot`)

                           VALUES ('$ref_no', '$status', '$employee_id', '$agent_name', '$agent_fullname', '$Today', '$username', '$dir_name', '$shift', '$motiv_fb', '$dev_fb', '$action_plan', '$time_line', '$signature', '$filename1', '$filename')");

                  echo "<script>location.href='../index.php'</script>";           
            }
          }
      }
  }

  //Process for uploading screenshot for both Motivational and Developmental feedback
  if($filename != null && $filename1 != null){
    

    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file1"]["name"]);
    $file_extension = end($temporary);

    if (
       (
       ($_FILES["file1"]["type"] == "image/png") || 
       ($_FILES["file1"]["type"] == "image/jpg") || 
       ($_FILES["file1"]["type"] == "image/jpeg")
        )
        && ($_FILES["file1"]["size"] < 1000000) && in_array($file_extension, $validextensions)
        )
        {

          if ($_FILES["file1"]["error"] > 0){
            echo "Return Code: " . $_FILES["file1"]["error"] . "<br/><br/>";
          }

          else{
            if (file_exists("upload/" . $_FILES["file1"]["name"]) || file_exists("upload/" . $_FILES["file"]["name"]) ){

              echo "<script>alert('$filename and $filename1 already exists.')</script>";
            }

            else{
                  //For filename
                  $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                  $targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
                  move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

                  //for filename1
                  $sourcePath1 = $_FILES['file1']['tmp_name']; // Storing source path of the file in a variable
                  $targetPath1 = "upload/".$_FILES['file1']['name']; // Target path where file is to be stored
                  move_uploaded_file($sourcePath1,$targetPath1) ; // Moving Uploaded file

                  $results = $db->query("INSERT INTO `coaching_information`(`reference_no`, `status`, `agent_employee_id`, `agent_username`, `agent_fullname`, `date`, `om_name`, `dir_name`, `shift`, `motivational_feedback`, `developmental_feedback`, `action_plan`, `timeline`, `agent_signature`, `df_screenshot`, `mf_screenshot`)

                           VALUES ('$ref_no', '$status', '$employee_id', '$agent_name', '$agent_fullname', '$Today', '$username', '$dir_name', '$shift', '$motiv_fb', '$dev_fb', '$action_plan', '$time_line', '$signature', '$filename1', '$filename')");

                  echo "<script>location.href='../index.php'</script>";           
            }
          }
      }
  }

  //Process for no screenshot in both motivational and developmental feedback
  if($filename1 == null && $filename == null){

    $results = $db->query("INSERT INTO `coaching_information`(`reference_no`, `status`, `agent_employee_id`, `agent_username`, `agent_fullname`, `date`, `om_name`, `dir_name`, `shift`, `motivational_feedback`, `developmental_feedback`, `action_plan`, `timeline`, `agent_signature`)

                           VALUES ('$ref_no', '$status', '$employee_id', '$agent_name', '$agent_fullname', '$Today', '$username', '$dir_name', '$shift', '$motiv_fb', '$dev_fb', '$action_plan', '$time_line', '$signature')");

                  echo "<script>location.href='../index.php'</script>";   
  }
?>