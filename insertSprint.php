<?php

require_once('dbconnect.php');

$name = $_POST['name'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];


$sql = " INSERT INTO sprint (name, start_date, end_date) VALUES ('$name', '$start_date', '$end_date'); ";

$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
	//echo "Inserted Successfully";
	header("Location: sprintBoard.php");
} else {
	echo "Insertion Failed";
}

?>