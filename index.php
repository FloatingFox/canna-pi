<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CPi | Overview</title>
	<link rel='shortcut icon' type='image/x-icon' href='icon/favicon.ico' />
	<link rel="stylesheet" href="css/cannapi.css">
	<link rel="apple-touch-icon" sizes="57x57" href="icon/apple-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-icon-144x144.png" />
  </head>
 </html>
<?php require 'login/loginheader.php'; ?>
<?php include 'navbar.php'; ?>	
<?php $config = include 'conf.php'; ?>
<?php 
// FETCH CURRENT FANSPEED FROM RASPBERRY IF ADDRESS IS SET IN CONFIG

$stat = file_get_contents("http://".$config['rpiaddress']."/fanstat.php");

// CHECK IF LIGHTSCHEDULE IS SET
if( isset($config['lightOn']) && isset($config['lightOff']) ){
	
}else{
	$config['lightOn'] = "00:00:00";
	$config['lightOff'] = "00:00:00";
}
//GET CURRENT DATE
//CREATE FUNCTION TO COUNT IN Y-M-D
//SAVE CURRENT DATE
$currentDate =  date('Y-m-d');
$start_date = $currentDate;
$date = DateTime::createFromFormat('Y-m-d',$start_date);

// SUBSTRACT AMOUNT OF DAYS FROM CONFIG

$date->modify('-'.$config['shownDays'].' day');
//$date->modify('+1 day');
$dateMin = $date->format('Y-m-d').' '.$config['lightOn'];


//GET CURRENT DATE
//CREATE FUNCTION TO COUNT IN Y-M-D
//SAVE CURRENT DATE
$currentDate =  date('Y-m-d');
$start_date = $currentDate;
$date = DateTime::createFromFormat('Y-m-d',$start_date);


//SAVE CURRENT DATE +1 IN NEW VARIABLE
$date->modify('+1 day');
$datePlus = $date->format('Y-m-d').' '.$config['lightOff'];



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
	  <link rel="stylesheet" href="css/cannapi.css">
	 
	
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

