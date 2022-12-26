<?php

require_once('dbconnect.php');
$id = $_POST['submit'];

$sql = "UPDATE sprint SET status='Completed' WHERE id='$id';";
$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
		//echo "Inserted Successfully";
		header("Location: sprintBoard.php");
	} else {
		header("Location: sprintBoard.php");
	}

?>