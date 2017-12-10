
<html>
  <head>
    <meta charset="utf-8">
    <title>CPi | RAW Data</title>
  </head>
  <link rel='shortcut icon' type='image/x-icon' href='icon/favicon.ico' />
  <link rel="stylesheet" href="css/cannapi.css">
<body>

<script type="text/javascript">
     
        function link(target) {
          if(confirm('Do you realy want to delete this record?'))
            top.location.href = target;
        }
    
    </script>
	
<?php 

require "login/loginheader.php";
include 'navbar.php';
$config = include 'conf.php';

$dsn = $config['host'].':'.$config['port'];
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
$date->modify('+1 day');
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


$connection = mysql_connect($dsn, $config['username'], $config['password']); 
mysql_select_db($config['db_name']);
$query = 'SELECT * FROM '.$config['table'].' WHERE datetime BETWEEN "'.$dateMin.'" and "'.$datePlus.'"ORDER BY datetime DESC;';
$result = mysql_query($query);


if(isset($_GET['del']) and !empty($_GET['del'])){
	
	mysql_query('DELETE FROM `Klima` WHERE record_id = '.$_GET['del']);	
	// echo "<br />";
	// echo "Record deleted";
	// echo "<br />";
	header("Refresh:0; url=rawdata.php");
	}
    
?>

	<br /><div class="raw-data">
	<table class="raw-data"><tr><td class="output_table_collum_names">Date</td><td class="output_table_collum_names">Temperature</td><td class="output_table_collum_names">Humidity</td><td class="output_table_collum_names">Delete</td><td class="output_table_collum_names">Delete</td></tr>
	<?php 
		while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
		echo "<tr class='output_table_rows'><td class='output_table_rows'>" . $row['datetime'] . "</td><td class='output_table_rows'>" . $row['temperature'] . "</td><td class='output_table_rows'>" . $row['humidity'] . "</td><td class='output_table_rows'> <a href='#' onclick='link(\"rawdata.php?del=". $row['record_id'] ."\");'>" . $row['record_id'] ."</a></td></td><td class='output_table_rows'><input type='checkbox' name='record_id' value='" . $row['record_id'] ."'></td></tr>";  //$row['index'] the index here is a field name
		}
		mysql_close(); //Make sure to close out the database connection humidity
	?>
	</table>
	</div>
</body>
</html>

