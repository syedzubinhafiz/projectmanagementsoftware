<?php

require_once('dbconnect.php');

$id = $_POST['submit'];

$sql = "SELECT * FROM sprint where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

    if ($_POST['name'] == '') {
        $name = $row[1];
    } else { $name = $_POST['name']; }

    if ($_POST['start_date'] == '') {
        $start_date = $row[2];
    } else { $start_date = $_POST['start_date']; }

    if ($_POST['end_date'] == '') {
        $end_date = $row[5];
    } else { $end_date = $_POST['end_date']; }

    
    $sql = " UPDATE sprint SET name='$name', start_date='$start_date', end_date='$end_date' WHERE id=$id;";
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn)) {
		//echo "Inserted Successfully";
		header("Location: sprintBoard.php");
	} else {
		header("Location: sprintBoard.php");
	}



?>