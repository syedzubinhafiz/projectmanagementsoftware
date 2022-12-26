<?php

require_once('dbconnect.php');
session_start();
$task_id = $_POST['submit'];
$sprint_id = $_SESSION['sprint_id'];
$_SESSION['first_load'] = 0;

$sql = " UPDATE task SET sprint_id=$sprint_id WHERE id=$task_id;";

$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
	//echo "Inserted Successfully";
	header("Location: backlogs.php");
} else {
	echo "Insertion Failed";
}

?>