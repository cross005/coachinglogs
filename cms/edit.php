<?php
//Check connection
include("../include/connection.php");
$username = $_SESSION['username'];

$id = $_GET['id'];

$results = $db->query("SELECT * FROM coaching_information WHERE reference_no = '$id'");
while ($row = $results->fetch_assoc()) {
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
  $agent_confirmation = $row['agent_confirmation'];
  $os_confirmation = $row['os_confirmation'];
  $om_confirmation = $row['om_confirmation'];
  $mf_screenshot = $row['mf_screenshot'];
  $df_screenshot = $row['df_screenshot'];
  $agent_commitment = $row['agent_commitment'];
  $status = $row['status'];
}


$results = $db->query("SELECT * FROM users WHERE username = '$username'");
while ($row = $results->fetch_assoc()) {
  $os_password = $row['password'];
  $os_fullname = $row['user_fullname'];
  $om_name = $row['supervisor_name'];
}

$results = $db->query("SELECT * FROM users WHERE username = '$om_name'");
while ($row = $results->fetch_assoc()) {
  $om_name1 = $row['user_fullname'];
  $om_signature1 = $row['signature'];
}



if($status == 'Approved'){
  header("location:index.php");
}





?>
<!DOCTYPE html>
<html>
<head>
    <title>Agent's Coaching Log</title>
    <link rel="stylesheet" type="text/css" href="../styles/swa-custom-page-styles2.css" />  
    <script src="../scripts/jquery.min.js.js"></script>
    <script src="../scripts/modal.js"></script>
    <link href="../scripts/jquery-min/themes/base/jquery-ui.css" rel="stylesheet">
    <script src="../scripts/jquery-min/ui/minified/jquery-ui.min.js"></script>

    <script type="text/javascript">

    function hidValue(){
      var hidden = document.getElementById("hid_val").value;

      //Agent Confrimation hidden value
      var hid_agent_confirmation = document.getElementById("hid_agent_confirmation").value;

      //OM Confirmation hidden value
      var om_hid = document.getElementById("om_hid_confirmation").value;

      if(hidden == "Ok"){
        document.getElementById("button").style.visibility = "hidden";
      }
      //Disable button if agent confirmation is not 'Ok'
      if(hid_agent_confirmation != "Ok"){
        document.getElementById("button").disabled = true;
      }

      //Disable button if om confirmation is not 'Ok'
      if(om_hid != "Ok"){
        document.getElementById("pdf").disabled = true;
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
      });

$(function() {
  $('textarea').each(function()
  {
    $(this).height($(this).prop('scrollHeight'));
  });
});

    </script>
</head>
<body onload = "hidValue()">

  <div id="header">
    <div id="banner">
      <span id="textbanner">edit record</span> 
    </div>
    <div id="phplog">
      <?php include("../include/header_os.php") ?>
    </div>
    <div id="version">
      08242015v1.11
    </div>    
  </div>

<div id="spacing"></div>


    <div id="main">
      <div id="wrapper1">
        <div id="swalogo"><img id="swa-logo" src="./../images/swa-logo3.jpg" /></div>
        <div id="wrapper2">
          <div id="spacer"></div>
          <div id="realans">FOR REAL ANSWERS, TIMELY SOLUTIONS</div>
          <div id="bar"></div>
        </div>
      </div>

        <div id="body"><span class="smart">SMART Objective</span>: <span class="smart">S</span>-specific <span class="smart">M</span>-measurable <span class="smart">A</span>-agreed <span class="smart">R</span>-realistic <span class="smart">T</span>-timed</div>

        <div id="body2"><span class="smart">V2T OPERATIONS<br />Scopeworks Asia, Inc.</span></div>     
        <form action="" method="post" name="form" enctype="multipart/form-data">
            <input type = "hidden" name = "hid_val" id = "hid_val" value = "<?php echo $os_confirmation; ?>" />
            <input type = "hidden" id = "hid_agent_confirmation" value = "<?php echo $agent_confirmation; ?>" />

            <div id="body3">
              <span class="smart">
                Agent's Name: <?php echo $agent_fullname; ?> 
                Shift: <?php echo $shift; ?> 
                Date: <?php echo $date; ?>
              </span>
            </div>


            <div class = "body4">MOTIVATIONAL FEEDBACK</div>
            <div class = "content"><span class = "smart">1. Identify the Issue:</span>
              <textarea  name="motiv_fb"><?php echo $mv_fb;?></textarea>
              <?php  
                if($mf_screenshot){
                  echo "<img src='../cms/coaching/upload/$mf_screenshot'>";
                }
               ?>
            </div>

            <div class = "body4">DEVELOPMENTAL FEEDBACK</div>
            <div class = "content"><span class = "smart">2. Discuss the Problem:</span>
              <textarea name="dev_fb"><?php echo $dev_fb;?></textarea>
              <?php
                if($df_screenshot){
                  echo "<img src='../cms/coaching/upload/$df_screenshot'>";
                }
                 ?>
            </div>

            <div class = "body4">ACTION PLAN</div>
            <div class = "content"><span class = "smart">3. Agent's Commitment:</span>
              <textarea name="action_plan"><?php echo $action_plan;?></textarea>
            </div>


            <div class="body4">TIMELINE</div>
            <div class="content"><span class="smart">4. Follow Ups:</span>
              <textarea name="time_line"><?php echo $timeline;?></textarea>
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
                           echo "<img src='./../images/$agent_signature' id='sigheight'>"; 
                        }
                        else{
                          echo "No signature found.";
                        }
                      ?>
                    </div>
                    <div id="agentsigchild2"><br /><br /><br />
                      <span id="empname"><?php echo $agent_fullname; ?></span><br />
                      <span id="empposition">Agent's Signature</span>
                    </div>                    
                 </div>

                 <div id="omsigparent">
                    <div id="omsigchild1">
                      <?php
                        if($om_signature && $om_confirmation == 'Ok'){
                           echo "<img src='../images/$om_signature' id='sigheight'>"; 
                        }
                        else{
                          echo "No signature found.";
                        }
                      ?>
                    </div>
                    <div id="omsigchild2"><br /><br /><br />

                      <span id="empname"><?php echo $om_name1; ?></span><br />
                      <span id="empposition">Operations Manager's Signature</span>
                    </div>                    
                 </div>

                 <div id="ossigparent">
                    <div id="ossigchild1">
                      <?php
                        if($os_confirmation == 'Ok'){
                           echo "<img src='../images/$os_signature' id='sigheight'>"; 
                        }
                        else{
                          echo "No signatures found.";
                        }
                      ?>
                    </div>

                    <div id="ossigchild2"><br /><br /><br />
                      <span id="empname"><?php echo $os_fullname; ?></span><br />
                      <span id="empposition">Operations Supervisor's Signature</span><br />
                    </div> 
                 </div>
            </div>
            <center>
                    <input type="submit" name = "submit" value="Update Now" class="submit1"/>
                    <input type="button" id = "cancel" value="Cancel" onclick="window.location.href='index.php';"/>
            </center>
        </form>
    </div>                       
      
    <div id="spacer100">
      
    </div>    
    <div id="footer"><div id="insidespacer100">Copyright &copy; 2015. All Rights Reserved.</div></div>

</body>
</html>

<?php
if(isset($_POST['submit'])){


  $motiv_fb1 = $_POST['motiv_fb'];
  $motiv_fb = htmlentities($motiv_fb1, ENT_QUOTES);
  $dev_fb1 = $_POST['dev_fb'];
  $dev_fb = htmlentities($dev_fb1, ENT_QUOTES);
  $action_plan1 = $_POST['action_plan'];
  $action_plan = htmlentities($action_plan1, ENT_QUOTES);
  $time_line1 = $_POST['time_line'];
  $time_line = htmlentities($time_line1, ENT_QUOTES);

  $results = $db->query("UPDATE coaching_information SET motivational_feedback = '$motiv_fb', 
                                                         developmental_feedback = '$dev_fb', 
                                                         action_plan = '$action_plan', 
                                                         timeline = '$time_line' 
                          WHERE reference_no = '$id'");
  echo "<script>alert('Acknowledgement Successful!')</script>";
  echo "<script>location.href='index.php'</script>"; 
}
?>

