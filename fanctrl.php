<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CPi | Fancontrol</title>
	<link rel='shortcut icon' type='image/x-icon' href='icon/favicon.ico' />
	<link rel="stylesheet" href="css/cannapi.css">
  </head>
 </html>
 
<?php require 'login/loginheader.php'; ?>
<?php $config = include 'conf.php'; ?>
<?php

$lti = $_GET["lti"];

$stat = file_get_contents("http://".$config['rpiaddress']."/fanstat.php");

// CHANGING FANSPEED 
if(isset($lti)){
	echo file_get_contents("http://".$config['rpiaddress']."/fanctrl.php?lti=".$lti);
	
}

?>

<html>
  <head>
    
	<script src="https://cdn.jsdelivr.net/npm/jquery@1.11.3/dist/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/round-slider@1.3/dist/roundslider.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/round-slider@1.3/dist/roundslider.min.js"></script>
	<link rel="stylesheet" href="css/slider.css">
	<script type="text/javascript">
	 
		var stat = '<?php echo $stat;?>';
		
		window.onload = function () { 
		//document.getElementById(stat).classList.toggle('btnFanOn');
		
		switch(stat) {
					case "0":
						currentspeed = 0;
						break;
					case "80":
						currentspeed = 35;
						break;
					case "100":
						currentspeed = 44;
						break;
					case "120":
						currentspeed = 53;
						break;
					case "150":
						currentspeed = 65;
						break;
					case "170":
						currentspeed = 74;
						break;
					case "190":
						currentspeed = 83;
						break;
					default:
						currentspeed = 0;
				} 
		
				$("#handle1").roundSlider({
				sliderType: "min-range",
				editableTooltip: false,
				radius: 85,
				width: 14,
				value: currentspeed,
				handleSize: 0,
				handleShape: "square",
				circleShape: "pie",
				startAngle: 315,
				stop: "traceEvent",
				tooltipFormat: "changeTooltip"
			});

			
			
		}
		
		function traceEvent(e) {
			var val = e.value;
			if (val < 35) var lti = 0;
			else if (val >= 35 && val < 44) var lti = 80;
			else if (val >= 44 && val < 53) var lti = 100;
			else if (val >= 53 && val < 65) var lti = 120;
			else if (val >= 65 && val < 74) var lti = 150;
			else if (val >= 74 && val < 83) var lti = 170;
			else if (val >= 83) var lti = 190;
			if(confirm('Set Fanspeed to '+lti+'V ?'))
            window.location.href='?lti='+lti+'';
			
		}
		
		function changeTooltip(e) {
			var val = e.value, speed;
			if (val < 35) speed = "Off";
			else if (val >= 35 && val < 44) speed = "80V";
			else if (val >= 44 && val < 53) speed = "100V";
			else if (val >= 53 && val < 65) speed = "120V";
			else if (val >= 65 && val < 74) speed = "150V";
			else if (val >= 74 && val < 83) speed = "170V";
			else if (val >= 83) speed = "190V";

			return "<b>" + val + " %</b>" + "<div>" + speed + "<div>";
			
		}
		
		
		
	</script>
  </head>
  <body>
    
<div id="fanctrl" align="center">
	<div id="handle1"></div>
</div>
 

</body>
</html>