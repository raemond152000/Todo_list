<?php

$host = "db4free.net";
$username = "raemond152000";
$password = "babybaboonking123";
$dbname = "raemond_todolist";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
	die('Connection failed: ' . mysqli_error($conn));
}

echo 'connected successfully';

?>