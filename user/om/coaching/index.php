<?php
  //Check connection
  include("../../../include/connection_om.php");
  $results = $db->query("SELECT * FROM users WHERE supervisor_name = '$username' AND position='OS'");

  $results1 = $db->query("SELECT * FROM users WHERE username = '$username'");
  while ($row1 = $results1->fetch_assoc()) {
    $dir_name = $row1['supervisor_name'];
  }

  $results1 = $db->query("SELECT * FROM users WHERE username = '$dir_name'");
  while ($row1 = $results1->fetch_assoc()) {
    $dir_name1 = $row1['user_fullname'];
  }

  $results1 = $db->query("SELECT * FROM users WHERE username = '$username'");
  while ($row1 = $results1->fetch_assoc()) {
    $os_fullname = $row1['user_fullname'];
  }
?>
<!Doctype html>
<html>
<head>
<title><?php echo $_SESSION['username']; ?> Create Coaching Log</title>
<link rel="stylesheet" type="text/css" href="../../../styles/swa-custom-page-styles2.css" />	
<link rel="stylesheet" href="../../../styles/style.css" />
<script src="../../../scripts/jquery.min.js.js"></script>
<script src="../../../scripts/om_script_upload_image.js"></script>
		<script>
      function showUser(str) {
          if (str == "") {
              document.getElementById("empname").innerHTML = "";
              return;
          } else { 
              if (window.XMLHttpRequest) {
                  // code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp = new XMLHttpRequest();
              } else {
                  // code for IE6, IE5
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                      document.getElementById("empname").innerHTML = xmlhttp.responseText;
                  }
              }
              xmlhttp.open("GET","getuser.php?q="+str,true);
              xmlhttp.send();
          }
      }

      function resetField(){
        document.getElementById("shift").value = "";
        document.getElementById("motiv_fb").value = "";
        document.getElementById("dev_fb").value = "";
        document.getElementById("action_plan").value = "";
        document.getElementById("time_line").value = "";

      }

			$(document).ready(function(){
				$("textarea").keyup(function(e) {
    				while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
        				$(this).height($(this).height()+1);
    				};
				});
			});
		</script>
</head>
<body onload = "resetField()">
  <div id="header">
    <div id="banner">
      <span id="textbanner">create coaching log</span> 
    </div>
    <div id="phplog">
      <?php include("../../../include/header_om1.php") ?>     
    </div>
    <div id="version">
      08242015v1.11
    </div>    
  </div>

<div id="spacing"></div>

    <div id="main">
      <div id="wrapper1">
        <div id="swalogo"><img id="swa-logo" src="../../../images/swa-logo3.jpg" /></div>
        <div id="wrapper2">
          <div id="spacer"></div>
          <div id="realans">FOR REAL ANSWERS, TIMELY SOLUTIONS</div>
          <div id="bar"></div>
        </div>
      </div>

<div id="body"><span class="smart">SMART Objective</span>: <span class="smart">S</span>-specific <span class="smart">M</span>-measurable <span class="smart">A</span>-agreed <span class="smart">R</span>-realistic <span class="smart">T</span>-timed</div>

 <div id="body2"><span class="smart">V2T OPERATIONS<br />Scopeworks Asia, Inc.</span></div>      
<form id="uploadimage" action="" method="post" name="form" enctype="multipart/form-data">
  <input type="hidden" name="hidden1" value = "<?php echo $dir_name; ?>"/>
      			<div id="body3">
              <span class="smart">OS Name:
                <select  name = 'agent_name' onchange="showUser(this.value)">
                <option value = "Agent">Select agent:</option>
                <?php
                  while($row = $results->fetch_assoc()){            
                ?>
                    <option value="<?php echo $row['username']; ?>">
                    <?php
                       echo $row['user_fullname'];
                     ?> <?php 
                   }?>
                    </option>
                  </select>         

                Shift: <input type="text" name="shift" id="shift" placeholder="Enter shift here" required="required" /> 
              </span>
            </div>

      			<div class = "body4">MOTIVATIONAL FEEDBACK</div>
      			<div class = "content"><span class = "smart">1. Identify the Issue:</span>
      				<textarea name="motiv_fb" id="motiv_fb" required placeholder="Required field. Enter text here..."></textarea>
        			<div id="image_preview"><img id="previewing"/></div>
        			<div id="selectImage"><input type="file" name="file" id="file" />
        			</div>
      			</div>


      			<div class = "body4">DEVELOPMENTAL FEEDBACK</div>
      			<div class = "content"><span class = "smart">2. Discuss the Problem:</span>
      				<textarea name="dev_fb" id="dev_fb" required placeholder="Required field. Enter text here..."></textarea>
              <div id="image_preview1"><img id="previewing1"/></div>
              <div id="selectImage">
                <input type="file" name="file1" id="file1" />
              </div>
      			</div>

      			<div class = "body4">ACTION PLAN</div>
      			<div class = "content"><span class = "smart">3. Agent's Commitment:</span>
      				<textarea name="action_plan" id="action_plan" required placeholder="Required field. Enter text here..."></textarea>
      			</div>

      			<div class="body4">TIMELINE</div>
      			<div class="content"><span class="smart">4. Follow Ups:</span>
      				<textarea name="time_line" id="time_line" required placeholder="Required field. Enter text here..."></textarea>
      			</div>

      			<div id="body5">
              <span class="italic">
                *By affixing my signature below, I hereby confirm that the contents of this document have been fully discussed with me and that I accept and agree to all commitments, goal or agreement set herein.
              </span>
            </div>


            <div id="sigwrapper">
                 <div id="agentsigparent">
                    <div id="agentsigchild1">
                    </div>
                    <div id="agentsigchild2"><br /><br /><br />
                      <span id="empname">SCOPEWORKS AGENT</span><br />
                      <span id="empposition">Operation Supevisor's Signature</span>
                    </div>                    
                 </div>
                 <div id="omsigparent">
                    <div id="omsigchild1">
                    </div>
                    <div id="omsigchild2"><br /><br /><br />
                      <span id="empname"><?php echo $dir_name1; ?></span><br />
                      <span id="empposition">Directors Manager's Signature</span>
                    </div>                    
                 </div>
                 <div id="ossigparent">
                    <div id="ossigchild1">
                    </div>
                    <div id="ossigchild2"><br /><br /><br />
                      <span id="empname"><?php echo $os_fullname; ?></span><br />
                      <span id="empposition">Operations Manager's Signature</span>
                    </div> 
                 </div>
            </div>    
              <center><input type="submit" name = "submit" value="Create Now" class="submit1"/>
              <input type="button" id = "cancel" value="Cancel" onclick="window.location.href='../index.php';"/></center>

        </form>
<h4 id="loading"></h4>
<div id="message"></div>


  </div>

  <div id="spacer100">
  
</div>    
<div id="footer"><div id="insidespacer100">Copyright &copy; 2015. All Rights Reserved.</div></div>
</body>
</html>