<?php

require_once('dbconnect.php');

$name = $_POST['name'];
$email = $_POST['email'];

$sql = " INSERT INTO employee (name, email) VALUES ('$name', '$email'); ";

$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
	//echo "Inserted Successfully";
	header("Location: teamDashboard.php");
} else {
	echo "Insertion Failed";
}

?>