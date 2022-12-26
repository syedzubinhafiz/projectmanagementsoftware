<?php

require_once('dbconnect.php');

$name = $_POST['name'];
$description = $_POST['description'];
$type = $_POST['type'];
$tag = $_POST['tag'];
$progress = $_POST['progress'];
$priority = $_POST['priority'];
$story_point = $_POST['story_point'];

$sql = " INSERT INTO task (name, description, type, tag, progress, priority, story_point) VALUES ('$name', '$description', '$type', '$tag', '$progress', '$priority', '$story_point'); ";

$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn)) {
	//echo "Inserted Successfully";
	header("Location: task.php");
} else {
	echo "Insertion Failed";
}

?>