<?php

require_once('dbconnect.php');
$_SESSION['first_load'] = 0;

$id = $_POST['submit'];

$sql = "SELECT * FROM task where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

    if ($_POST['name'] == '') {
        $name = $row[1];
    } else { $name = $_POST['name']; }

    if ($_POST['description'] == '') {
        $description = $row[2];
    } else { $description = $_POST['description']; }

    if ($_POST['assigned_to'] == '') {
        $assigned_to = $row[5];
    } else { $assigned_to = $_POST['assigned_to']; }

    if ($_POST['type'] == '') {
        $type = $row[3];
    } else { $type = $_POST['type']; }

    if ($_POST['tag'] == '') {
        $tag = $row[4];
    } else { $tag = $_POST['tag']; }
    
    if ($_POST['progress'] == '') {
        $progress = $row[6];
    } else { $progress = $_POST['progress']; }

    if ($_POST['priority'] == '') {
        $priority = $row[7];
    } else { $priority = $_POST['priority']; }

    if ($_POST['story_point'] == '') {
        $story_point = $row[8];
    } else { $story_point = $_POST['story_point']; }


    $sql = " UPDATE task SET name='$name', description='$description', type='$type', tag='$tag', assigned_to='$assigned_to', progress='$progress', priority='$priority', story_point='$story_point' WHERE id=$id;";
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn)) {
		//echo "Inserted Successfully";
		header("Location: scrumBoard.php");
	} else {
		echo "Insertion Failed";
	}



?>