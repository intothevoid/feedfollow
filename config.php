<?php

$hostname = "HOSTNAME";
$username = "USERNAME";
$password = "PASSWORD";
$database = "DATABASE";

$link = mysql_connect($hostname, $username, $password) or die("Cannot connect to the database!");
mysql_select_db($database) or die("Cannot select database");
?>
