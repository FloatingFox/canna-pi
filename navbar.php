<?php require "login/loginheader.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CPi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
	<link rel="stylesheet" href="css/cannapi.css">
  </head>
  <body>
	<!-- 1. Dropdown -->
 <div class="navbar">
  <a href="index.php">CPI | Home</a>
  <div class="dropdown">
    <button class="dropbtn">Advanced
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
	  <a href="rawdata.php">RAW Data</a>
	  <a href="loginattempts.php">Last Logins</a>
	</ul>
    </div>
	
  </div>
	<a href="settings.php">Settings</a>
	<!-- 2. Dropdown -->
	<!--
    <div class="dropdown">
    <button class="dropbtn">Syno 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a target="blank" href="">NAS</a>
      <a target="blank" href="">X-GW</a>
	</ul>
    </div>
  </div>
  -->
	<!-- Logut Button -->
      <a href="login/logout.php">Logout</a>
</div>
  </body>
</html>



