<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CPi | Overview</title>
	<link rel='shortcut icon' type='image/x-icon' href='icon/favicon.ico' />
	<link rel="stylesheet" href="css/cannapi.css">
  </head>
 </html>
<?php require 'login/loginheader.php'; ?>
<?php include 'navbar.php'; ?>	
<?php $config = include 'conf.php'; ?>
<?php 
// FETCH CURRENT FANSPEED FROM RASPBERRY
$stat = file_get_contents("http://".$config['rpiaddress']."/fanstat.php");

//GET CURRENT DATE AND ADD TIME 00:00:00


$currentDate =  date('Y-m-d');
$Date = $currentDate.' 00:00:00';

//CREATE FUNCTION TO COUNT IN Y-M-D 00:00:00
//SAVE CURRENT DATE
$start_date = $currentDate;
$date = DateTime::createFromFormat('Y-m-d',$start_date);

// -2 DAYS IN NEW VARIABLE
$date->modify('-2 day');
$dateMin3 = $date->format('Y-m-d').' 00:00:00';


//SAVE CURRENT DATE +1 IN NEW VARIABLE
$date->modify('+4 day');
$datePlus1 = $date->format('Y-m-d').' 00:00:00';


// CATCH VARIABLE FOR fromDate & untilDate FROM INPUT FIELDS

$fromDate = $_GET["fromDate"];
$untilDate = $_GET["untilDate"];

if(isset($fromDate) && isset($untilDate)){
	require "getTemp.php";
}else{
	
$untilDate = "";
$fromDate = "";

$url = 'index.php?fromDate='.$fromDate.'&untilDate='.$untilDate;
header( "Location: $url" );
}	



 ?>

<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
	
	
	
	
	
    var jsonData = <?php echo json_encode($table); ?>;

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
	  
      var options = {
	<!-- title: 'title', -->
	<!-- width: 100%, -->
		height: 500,
		backgroundColor: '#FAFAFA',
		selectionMode: 'multiple',
		  <!-- tooltip: {trigger: 'selection'}, -->  
		curveType: 'function',
        legend: { position: 'top' }
		
	};
	
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
	
	
    </script>    
  </head>
  <body>
		<!-- DIV FOR THE GOOGLEAPI CHART-->
	 
	 <div id="chart_div" class="chart_style" align="center"></div>
	  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	 <script type="text/javascript">
	 
		var stat = '<?php echo $stat;?>';
		window.onload = function () { document.getElementById(stat).classList.toggle('btnFanOn') }
	</script>
	  <!-- DATEFIELDS -->
		<div id="dateFields" align="center">
		<form><br />	
				<table class="dateFields" align="center">
				<tr><td><b>From:<b></td><td><input id="fromDate" type="date" name="fromDate"></td></tr>
				<tr><td><b>To:<b></td><td><input id="untilDate" type="date" name="untilDate"></td></tr>
				</table>
				<br />
				<input id="sendDate" type="submit" action="index.php" value="Send">
		</form>
		</div>
		
	 
    
  </body>
</html>
<?php include 'fanctrl.php'; ?>

