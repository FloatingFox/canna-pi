<?php require "login/loginheader.php"; ?>
<?php require "conf.php"; ?>
<?php

$data = file_get_contents("http://".$rpiaddress."/preview-data.php");


?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CPi | Data Preview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
  
  </head>
  <body>
  
  <div id="preview-data" align="center">
  <?php echo $data; ?>
  </div>
  
  
  </body>
</html> 
