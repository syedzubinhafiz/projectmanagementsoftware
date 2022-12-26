<?php
session_start();
echo $_SESSION['type_'];
?>

<?php

require_once('dbconnect.php');

$sql = "SELECT * FROM task where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

    $id = $_POST['submit'];
    $name = $_POST['name'];
    if ($_POST['name'] == '') {
        $name = $row[1];
    } else { $name = $_POST['name']; }
	$description = $_POST['description'];
    $assigned_to = $_POST['assigned_to'];
    $type = $_POST['type'];
    $tag = $_POST['tag'];
    $progress = $_POST['progress'];
    $priority = $_POST['priority'];
    $story_point = $_POST['story_point'];

    $sql = " UPDATE task SET name='$name', description='$description', type='$type', tag='$tag', progress='$progress', priority='$priority', story_point='$story_point' WHERE id=$id;";
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn)) {
		//echo "Inserted Successfully";
		header("Location: task.php");
	} else {
		echo "Insertion Failed";
	}



?>

<?php

require_once('dbconnect.php');

$sql = "SELECT * FROM task where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

    $id = $_POST['submit'];

    if (isset($_POST['name'])) {
        $name = $row[1];
    } else { $name = $_POST['name']; }

    if (isset($_POST['description'])) {
        $description = $row[2];
    } else { $description = $_POST['description']; }

    if (isset($_POST['assigned_to'])) {
        $assigned_to = $row[5];
    } else { $assigned_to = $_POST['assigned_to']; }

    if (isset($_POST['type'])) {
        $type = $row[3];
    } else { $type = $_POST['type']; }

    if (isset($_POST['tag'])) {
        $tag = $row[4];
    } else { $tag = $_POST['tag']; }
    
    if (isset($_POST['progress'])) {
        $progress = $row[6];
    } else { $progress = $_POST['progress']; }

    if (isset($_POST['priority'])) {
        $priority = $row[7];
    } else { $priority = $_POST['priority']; }

    if (isset($_POST['story_point']))) {
        $story_point = $row[8];
    } else { $story_point = $_POST['story_point']; }


    $sql = " UPDATE task SET name='$name', description='$description', type='$type', tag='$tag', progress='$progress', priority='$priority', story_point='$story_point' WHERE id=$id;";
    
    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn)) {
		//echo "Inserted Successfully";
		header("Location: task.php");
	} else {
		echo "Insertion Failed";
	}

?>