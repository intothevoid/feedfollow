/* Feed Follow - RSS based alerting system for new content on websites
 * Copyright (C) 2013-2014 Karan Kadam
 * License: http://www.gnu.org/licenses/gpl.html GPL version 2 or higher
*/


<?php

$hostname = "localhost";
$username = "admin";
$password = "passpass";
$database = "feedfollow";

// Connect to database
$link = mysql_connect($hostname, $username, $password) or die("Cannot connect to the database!");
mysql_select_db($database) or die("Cannot select database");

?>
