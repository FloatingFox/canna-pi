<?php require "login/loginheader.php"; ?>
<?php $config = include 'conf.php'; ?>
<?php
$stat = file_get_contents("http://".$config['rpiaddress']."/fanstat.php");
echo $stat;
?>