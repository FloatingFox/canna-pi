<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CPi | RAW Data</title>
  </head>
 </html>

<?php require "login/loginheader.php"; ?>
<?php include 'navbar.php'; ?>
<?php require "conf.php"; ?>

<html lang="en">
  
<body>

<?php
//GET CURRENT DATE AND ADD TIME 00:00:00


$currentDate =  date('Y-m-d');
$Date = $currentDate.' 00:00:00';

//SUBSTRACT 2 DAYS to CURRENT DATE
$start_date = $currentDate;
$date = DateTime::createFromFormat('Y-m-d',$start_date);

$date->modify('-1 day');

//SAVE CURRENT DATE -2 DAYS IN NEW VARIABLE
$dateMin3 = $date->format('Y-m-d').' 00:00:00';

$connection = mysql_connect($host.':'.$port, $username, $password); //The Blank string is the password
mysql_select_db($db_name);

$query = 'SELECT * FROM Klima WHERE datetime BETWEEN "'.$dateMin3.'" and "2018-12-31 00:00:00" ORDER BY datetime DESC;';
$result = mysql_query($query);

?>


	<br /><div class="raw-data">
	<table class="raw-data"><tr><td class="output_table_collum_names">Date</td><td class="output_table_collum_names">Temperature</td><td class="output_table_collum_names">Humidity</td></tr>
	<?php 
		while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
		echo "<tr class='output_table_rows'><td>" . $row['datetime'] . "</td><td>" . $row['temperature'] . "</td><td>" . $row['humidity'] . "</td></tr>";  //$row['index'] the index here is a field name
		}
		mysql_close(); //Make sure to close out the database connection humidity
	?>
	</table>
	</div> 


</body>
</html>
