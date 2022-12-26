<?php

require_once('dbconnect.php');

$name = $_POST['submit'];

$sql = "SELECT * FROM employee where name='$name'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

    if ($_POST['name'] == '') {
        $name = $row[0];
    } else { $name = $_POST['name']; }

    if ($_POST['email'] == '') {
        $email = $row[1];
    } else { $email = $_POST['email']; }

    
    $sql = " UPDATE employee SET name='$name', email='$email' WHERE name='$name';";
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn)) {
		//echo "Inserted Successfully";
		header("Location: teamDashboard.php");
	} else {
		header("Location: teamDashboard.php");
	}



?>