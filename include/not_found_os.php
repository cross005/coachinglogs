<!Doctype html>
<html>
<head>
<title>Error 404 - Content not available</title>
<link rel="stylesheet" type="text/css" href="./../styles/swa-custom-page-styles2.css" />	
<link rel="stylesheet" href="./../styles/style.css" />
<script src="./../scripts/jquery.min.js.js"></script>
	<script>
      function showUser(str) {
          if (str == "") {
              document.getElementById("osname").innerHTML = "";
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
                      document.getElementById("osname").innerHTML = xmlhttp.responseText;
                  }
              }
              xmlhttp.open("GET","getuser.php?q="+str,true);
              xmlhttp.send();
          }
      }
		</script>
</head>
<body onload = "resetField()">
  <div id="header">
    <div id="banner">
      <span id="textbanner">record currently not available</span> 
    </div>
    <div id="phplog">

    </div>
    <div id="version">
      
    </div>    
  </div>
  <center><br/><br/><br/><br/><br/>The record you requested cannot be displayed right now. <br/> It may be temporarily unavailable or you may not have permission to view this page. <br/>Please click <a href="../cms/index.php"><strong>here</strong></a> to go to coaching records.</center>
</body>
</html>