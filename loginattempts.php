<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CPi | Login Attempts/title>
  </head>
 </html>

<?php require "login/loginheader.php"; ?>
<?php include 'navbar.php'; ?>
<?php $config = include 'conf.php'; ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>RAW Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='shortcut icon' type='image/x-icon' href='icon/favicon.ico' />
	<link rel="stylesheet" href="css/cannapi.css">
  </head>
<body>

<?php
$dsn = $config['host'].':'.$config['port'];

//GET CURRENT DATE AND ADD TIME 00:00:00


$currentDate =  date('Y-m-d');
$Date = $currentDate.' 00:00:00';

//SUBSTRACT 2 DAYS to CURRENT DATE
$start_date = $currentDate;
$date = DateTime::createFromFormat('Y-m-d',$start_date);

$date->modify('-1 day');

//SAVE CURRENT DATE -2 DAYS IN NEW VARIABLE
$dateMin3 = $date->format('Y-m-d').' 00:00:00';

$connection = mysql_connect($dsn, $config['username'], $config['password']); 
mysql_select_db($config['db_name']);

$query = 'SELECT * FROM loginAttempts ORDER BY LastLogin DESC;';
$result = mysql_query($query);

?>

	<br /><div class="loginattempts">
	<table class="loginattempts"><tr><td class="output_table_collum_names">Date</td><td class="output_table_collum_names">Username</td><td class="output_table_collum_names">IP</td><td class="output_table_collum_names">Attempts</td></tr>
	<?php 
		while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
		echo "<tr class='output_table_rows'><td>" . $row['LastLogin'] . "</td><td>" . $row['Username'] . "</td><td><a href='https://geoiptool.com/de/?ip=". $row['IP'] ."' target='blank'>". $row['IP'] ."</a></td><td>" . $row['Attempts'] . "</td></tr>";  //$row['index'] the index here is a field name
		}
		mysql_close(); //Make sure to close out the database connection humidity
	?>
	</table></div> 
</div>

</body>
</html>
