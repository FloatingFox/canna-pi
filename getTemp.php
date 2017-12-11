<?php require "login/loginheader.php"; ?>
<?php $config = include '././conf.php'; ?>
<?php 
$dsn = 'mysql:host='.$config['host'].':'.$config['port'].';dbname='.$config['db_name'];

$conn = new PDO($dsn, $config['username'], $config['password']);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  

//CATCH EMPTY QUERY
if($fromDate == "" || $untilDate == ""){
	$fromDate = $dateMin.' '.$config['lightOn'];
	$untilDate = $datePlus.' '.$config['lightOff'];
}else{
	if(isset($fromDate) && isset($untilDate) ){
		$fromDate = $_GET["fromDate"].' '.$config['lightOn'];
		$untilDate = $_GET["untilDate"].' '.$config['lightOff'];
		
	}
}
//GET SQL DATA FROM SPECIFIC TIMEFRAME
  $connString = 'SELECT * FROM '.$config['table'].' WHERE datetime BETWEEN "'.$fromDate.'" and "'.$untilDate.'";';
  
try {
  $result = $conn->query($connString);
  $rows = array();
  $table = array();
  $table['cols'] = array(array('label' => 'Datetime', 'type' => 'string'),array('label' => 'Temperature', 'type' => 'number'),array('label' => 'Humidity', 'type' => 'number'));
    
  foreach($result as $r) {

  $data = array();
  $data[] = array('v' => (string) $r['datetime']);
  $data[] = array('v' => (int) $r['temperature']);
  $data[] = array('v' => (int) $r['humidity']);
      
  $rows[] = array('c' => $data);
  
  }

$table['rows'] = $rows;

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
	
}



	
?>