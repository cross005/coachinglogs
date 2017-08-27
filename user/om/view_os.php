<?php
//Check connection
include("../../include/connection_om.php");

$id = $_GET['id'];

$results = $db->query("SELECT * FROM coaching_information WHERE reference_no = '$id'");
while ($row = $results->fetch_assoc()) {
  $agent_username = $row['agent_username'];
  $agent_fullname = $row['agent_fullname'];
  $shift = $row['shift'];
  $date = $row['date'];
  $mv_fb = $row['motivational_feedback'];
  $dev_fb = $row['developmental_feedback'];
  $action_plan = $row['action_plan'];
  $timeline = $row['timeline'];
  $agent_signature = $row['agent_signature'];
  $os_signature = $row['os_signature'];
  $om_signature = $row['om_signature'];
  $mf_screenshot = $row['mf_screenshot'];
  $df_screenshot = $row['df_screenshot'];
  $os_name = $row['supervisor_name'];
  $agent_confirmation = $row['agent_confirmation'];
  $os_confirmation = $row['os_confirmation'];
  $om_confirmation = $row['om_confirmation'];
  $dir_confirmation = $row['dir_confirmation'];
  $agent_commitment = $row['agent_commitment'];
  $om_name = $row['om_name'];
  $db_agent_date_confirmation = $row['agent_date_confirmation'];
  $db_os_date_confirmation = $row['os_date_confirmation'];
  $db_om_date_confirmation = $row['om_date_confirmation'];
  $db_dir_date_confirmation = $row['dir_date_confirmation'];
  $dir_name = $row['dir_name'];
}

$results = $db->query("SELECT * FROM users WHERE username = '$dir_name'");
while ($row = $results->fetch_assoc()) {
  $dir_fullname = $row['user_fullname'];
}

$results = $db->query("SELECT * FROM users WHERE username = '$om_name'");
while ($row = $results->fetch_assoc()) {
  $om_fullname = $row['user_fullname'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Agent's Coaching Log</title>
    <link rel="stylesheet" type="text/css" href="../../styles/swa-custom-page-styles2.css" />  
    <script src="../../scripts/jquery.min.js.js"></script>
    <script src="../../scripts/modal.js"></script>
    <link href="../../scripts/jquery-min/themes/base/jquery-ui.css" rel="stylesheet">
    <script src="../../scripts/jquery-min/ui/minified/jquery-ui.min.js"></script>

    <script type="text/javascript">




    function hidValue(){
      var hidden = document.getElementById("hid_val").value;
      var hid_om_confirmation = document.getElementById("hid_om_confirmation").value;

      if(hidden != "Ok"){
        document.getElementById("button").style.visibility = "hidden";
      }
      if(hid_om_confirmation == "Ok"){
        document.getElementById("button").style.visibility = "hidden";
      }

    }

      $(document).ready(function() {
      $(function() {
        $("#dialog").dialog({
        autoOpen: false
        });

        $("#button").on("click", function() {
          $("#dialog").dialog("open");
        });
      });
    });

      $(document).ready(function(){
        $(window).load(function(e) {
            while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                $(this).height($(this).height()+1);
            };
        });


      $(function() {
  $('textarea').each(function()
  {
    $(this).height($(this).prop('scrollHeight'));
  });
});
});
    </script>
</head>
<body onload = "hidValue()">
  <div id="header">
    <div id="banner">
      <span id="textbanner">view record</span> 
    </div>
    <div id="phplog">
      <?php include("../../include/header_om.php");?>
    </div>
    <div id="version">
      08242015v1.11
    </div>    
  </div>

<div id="spacing"></div>


    <div id="main">
      <div id="wrapper1">
        <div id="swalogo"><img id="swa-logo" src="../../images/swa-logo3.jpg" /></div>
        <div id="wrapper2">
          <div id="spacer"></div>
          <div id="realans">FOR REAL ANSWERS, TIMELY SOLUTIONS</div>
          <div id="bar"></div>
        </div>
      </div>


        <div id="body"><span class="smart">SMART Objective</span>: <span class="smart">S</span>-specific <span class="smart">M</span>-measurable <span class="smart">A</span>-agreed <span class="smart">R</span>-realistic <span class="smart">T</span>-timed</div>

        <div id="body2"><span class="smart">V2T OPERATIONS<br />Scopeworks Asia, Inc.</span></div>

        <form action="" method="post" name="form" enctype="multipart/form-data">
        <input type = "hidden" name = "hid_val" id = "hid_val" value = "<?php echo $agent_confirmation; ?>" />
        <input type = "hidden" id = "hid_om_confirmation" value = "<?php echo $om_confirmation; ?>" />
            <div id="body3">
              <span class="smart">
                OS Name: <?php echo $agent_fullname; ?> 
                Shift: <?php echo $shift; ?> 
                Date: <?php echo $date; ?>
              </span>
            </div>


            <div class = "body4">MOTIVATIONAL FEEDBACK</div>
            <div class = "content"><span class = "smart">1. Identify the Issue:</span>
              <textarea name = "motiv_fb">
                <?php echo $mv_fb; ?>
              </textarea>
              <?php  
                if($mf_screenshot){
                  echo "<img src='coaching/upload/$mf_screenshot'>";
                }
               ?>
            </div>

            <div class = "body4">DEVELOPMENTAL FEEDBACK</div>
            <div class = "content"><span class = "smart">2. Discuss the Problem:</span>
              <textarea readonly="readonly" name = "dev_fb">
                <?php echo $dev_fb; ?>  
              </textarea>
              <?php
                if($df_screenshot){
                  echo "<img src='coaching/upload/$df_screenshot'>";
                }
                 ?>
            </div>

            <div class = "body4">ACTION PLAN</div>
            <div class = "content"><span class = "smart">3. OS Commitment:</span>
              <textarea readonly="readonly" name = "action_plan"><?php echo $action_plan; ?></textarea>
              <textarea><?php echo $agent_commitment;?></textarea>
            </div>

            <div class="body4">TIMELINE</div>
            <div class="content"><span class="smart">4. Follow Ups:</span>
              <textarea readonly="readonly" name = "time_line"><?php echo $timeline; ?></textarea>
            </div>

            <div id="body5">
              <span class="italic">
                *By affixing my signature below, I hereby confirm that the contents of this document have been fully discussed with me and that I accept and agree to all commitments, goal or agreement set herein.
              </span>
            </div>

          <div id="sigwrapper">

                 <div id="agentsigparent">
                    <div id="agentsigchild1">
                      <?php
                        if($agent_signature && $agent_confirmation == 'Ok'){
                           echo "<img src='../../images/$agent_signature' id='sigheight'>"; 
                        }
                        else{
                          echo "No signature found.";
                        }
                      ?>
                    </div>
                    <div id="agentsigchild2"><br /><br /><br />
                      <span id="empname"><?php echo $agent_fullname; ?></span><br />
                      <span id="empposition">OS Signature</span>
                    </div>                    
                 </div>

                 <div id="omsigparent">
                    <div id="omsigchild1">
                      <?php
                        if($om_confirmation == 'Ok'){
                           echo "<img src='../../images/$dir_signature' id='sigheight'>"; 
                        }
                        else{
                          echo "No signature found.";
                        }
                      ?>
                    </div>
                    <div id="omsigchild2"><br /><br /><br />

                      <span id="empname"><?php echo $dir_fullname; ?></span><br />
                      <span id="empposition">Directors's Signature</span><br />
                    </div>                    
                 </div>

                 <div id="ossigparent">
                    <div id="ossigchild1">
                      <?php
                        if($om_signature && $om_confirmation == 'Ok'){
                           echo "<img src='../../images/$om_signature' id='sigheight'>"; 
                        }
                        else{
                          echo "No signature found.";
                        }
                      ?>
                    </div>

                    <div id="ossigchild2"><br /><br /><br />
                      <span id="empname"><?php echo $om_fullname; ?></span><br />
                      <span id="empposition">Operation Manager's Signature</span><br/>
                      <input id="button" type="button" value="Accept">
                    </div> 
                 </div>


            </div>

        </form>
    </div>                       

      <div id="dialog" title="Authentication">
        <form action="" method="post">
          <label>Input your password:</label>
          <input id="name" name="password" type="password">
          <input name="submit" type="submit" value="Submit">
        </form>
      </div>

              <span>
                OS Confirmation: <?php echo $db_agent_date_confirmation; ?><br />
                OM Confirmation: <?php echo $db_om_date_confirmation; ?><br/>
                Director Confirmation: <?php echo $db_om_date_confirmation; ?>
              </span>
    <div id="spacer100">
      
    </div>    
    <div id="footer"><div id="insidespacer100">Copyright &copy; 2015. All Rights Reserved.</div></div>

</body>
</html>

<?php
$Today = date('m/d/y g:i');

$results = $db->query("SELECT * FROM users WHERE username = '$username'");
while ($row = $results->fetch_assoc()) {
  $om_password = $row['password'];
}

$results = $db->query("SELECT * FROM users WHERE username = '$dir_name'");
while ($row = $results->fetch_assoc()) {
  $dir_signature = $row['signature'];
}


if(isset($_POST['submit'])){
  $password = $_POST['password'];
  if($password == $om_password){

    $results = $db->query("UPDATE coaching_information SET om_date_confirmation = '$Today', 
                                                           om_confirmation = 'Ok', 
                                                           dir_signature = '$dir_signature'
                           WHERE reference_no = '$id'");

    echo "<script>alert('Acknowledgement Successful!')</script>";
    echo "<script>location.href='os_coaching.php'</script>"; 
  }
  else{
    echo "<script>alert('Incorrect password!')</script>";
  }

}




?>

