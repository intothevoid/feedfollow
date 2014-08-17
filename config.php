<?php

$hostname = "localhost";
$username = "admin";
$password = "passpass";
$database = "feedfollow";

// Connect to database
$link = mysql_connect($hostname, $username, $password) or die("Cannot connect to the database!");
mysql_select_db($database) or die("Cannot select database");

?>
