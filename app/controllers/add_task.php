<?php

require_once './connect.php';

$newTask = $_GET['name'];

$sql = "INSERT INTO task(name) VALUES ('$newTask')";

$result = mysqli_query($conn, $sql);

if($result === TRUE) {
	echo 'new task added successfully';
} else {
	echo 'error:' . $sql . "<br>" . mysql_error($conn);
}

//Close a previously opened database connection:
mysql_close($conn);

?>