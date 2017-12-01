<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CPi | Fancontrol</title>
  </head>
 </html>
 
<?php require "login/loginheader.php"; ?>
<?php require "conf.php"; ?>
<?php

$lti = $_GET["lti"];

// FETCH CURRENT FANSPEED FROM RASPBERRY
$stat = file_get_contents("http://".$rpiaddress."/fanstat.php");

// CHANGING FANSPEED 
if(isset($lti)){
	echo file_get_contents("http://".$rpiaddress."/fanctrl.php?lti=".$lti);
	
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
    <link rel="stylesheet" href="css/cannapi.css">
	<script type="text/javascript">
	

	</script> 
  </head>
  <body>
    
 


<div id="GPIOctrl" align="center">
	<button onclick="window.location.href='?lti=0'"><a id="0" class="btnFan">LTI-OFF</a></button>
	<button onclick="window.location.href='?lti=80'"><a id="80" class="btnFan">LTI80</a></button>
	<button onclick="window.location.href='?lti=100'"><a id="100" class="btnFan">LTI100</a></button>
	<button onclick="window.location.href='?lti=120'"><a id="120" class="btnFan">LTI120</a></button>
	<button onclick="window.location.href='?lti=150'"><a id="150" class="btnFan">LTI150</a></button>
	<button onclick="window.location.href='?lti=170'"><a id="170" class="btnFan">LTI170</a></button>
	<button onclick="window.location.href='?lti=190'"><a id="190" class="btnFan">LTI190</a></button>
	
	

  </div>
 

</body>
</html>