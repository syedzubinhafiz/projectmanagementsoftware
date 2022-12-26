<?php

require_once('dbconnect.php');
$id = $_POST['submit'];

$sql = "DELETE FROM sprint where id=$id";
$result = mysqli_query($conn, $sql);

$sql = "UPDATE task SET sprint_id=-1 WHERE sprint_id=$id";
$result = mysqli_query($conn, $sql);

header('Location: sprintBoard.php');

?>