<html>
  <head>
    <meta charset="utf-8">
    <title>CPi | Settings</title>
  </head>
 </html>
 
<?php 
include 'navbar.php';
$config = include 'conf.php'; 

if(isset($_GET["host"]) || isset($_GET["port"]) || isset($_GET["db_name"]) || isset($_GET["table"]) || isset($_GET["username"])){
	$config['host'] = $_GET["host"];
	$config['port'] = $_GET["port"];
	$config['db_name'] = $_GET["db_name"];
	$config['table'] = $_GET["table"];
	$config['username'] = $_GET["username"];
	$config['rpiaddress'] = $_GET["rpiaddress"];
	$config['lightOn'] = $_GET["lightOn"];
	$config['lightOff'] = $_GET["lightOff"];
	
	$newConfig = array(
	'host'=> $config['host'], 
	'port'=> $config['port'],
	'db_name'=> $config['db_name'],
	'table'=> $config['table'],
	'username'=> $config['username'], 
	'password'=> $config['password'],
	'rpiaddress'=> $config['rpiaddress'],
	'lightOn'=> $config['lightOn'],
	'lightOff'=> $config['lightOff'],
	);
	
	$config = array_merge($config, $newConfig);
	file_put_contents('conf.php', '<?php return ' . var_export($config, true) . ';?>');
	}
?>

<html>
  <head>
  <link rel='shortcut icon' type='image/x-icon' href='icon/favicon.ico' />
  <link rel="stylesheet" href="css/cannapi.css">
  </head>
  <body>
  <div id="settings" align="center">
  <h2>Database Connection</h2>
  <form><br />
	<table class="db_settings_table">
		<tr><td><b>MySQL-Host:<b></td><td><input name="host" id="host" type="string" value="<?php echo $config['host']?>"></td></tr>
		<tr><td><b>Port:<b></td><td><input name="port" id="port" type="integer" value="<?php echo $config['port']?>"></td></tr>
		<tr><td><b>Database:<b></td><td><input name="db_name" id="db_name" type="string" value="<?php echo $config['db_name']?>"></td></tr>
		<tr><td><b>Table:<b></td><td><input name="table" id="table" type="string" value="<?php echo $config['table']?>"></td></tr>
		<tr><td><b>Username:<b></td><td><input name="username" id="username" type="string" value="<?php echo $config['username']?>"></td></tr>
	</table>
	<br />
	<h2>Raspberry</h2>
	<table class="rpi_settings_table">
	<tr><td><b>IP-Address:<b></td><td><input name="rpiaddress" id="rpiaddress" type="string" value="<?php echo $config['rpiaddress']?>"></td></tr>
	</table>
	<br />
	<h2>Light Schedule</h2>
	<table class="light_settings_table">
	<tr><td><b>Light On:<b></td><td><input name="lightOn" id="lightOn" type="string" value="<?php echo $config['lightOn']?>"></td></tr>
	<tr><td><b>Light Off:<b></td><td><input name="lightOff" id="lightOff" type="string" value="<?php echo $config['lightOff']?>"></td></tr>
	</table>
	<br />
	<input type="submit" action="settings.php" value="Save">
  </form>
  </div>
  </body>
</html>