<?php require "login/loginheader.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Temperature Monitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
	<link rel="stylesheet" href="css/cannapi.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
	<!-- 1. Dropdown -->
 <div class="navbar" >
 
 
 
  <!-- <a href="index.php">Home</a> -->
  
	<a href="index.php"><i class="fa fa-home"></i></a>
  <div class="dropdown">
    <button class="dropbtn"><i class="fa fa-thermometer-half"></i></button>
    <div class="dropdown-content">
      <a href="index.php">Climate</a>
      <!-- <a href="climate.php">Climate Control</a> -->
       <a href="rawdata.php">RAW Data</a>
    </div>
  </div> 
	<!-- 2. Dropdown -->
  <div class="dropdown">
    <button class="dropbtn"><i class="fa fa-cogs"></i> </button>
    <div class="dropdown-content">
      <a href="settings.php">Settings</a>

    </div>
  </div>
	<!-- Logut Button -->
	
	
	
	  <div class="dropdown-login">
    <button class="dropbtn-login"><i class="fa fa-user"></i> </button>
    <div class="dropdown-content-login">
      <a href="loginattempts.php">Login Attempts</a>
      <a href="login/logout.php">Logout</a>
    </div>
  </div>
  
  
</div>
  </body>
</html>