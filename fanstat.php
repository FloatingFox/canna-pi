<?php require "login/loginheader.php"; ?>
<?php require "conf.php"; ?>
<?php
$stat = file_get_contents("http://".$rpiaddress."/fanstat.php");
echo $stat;
?>