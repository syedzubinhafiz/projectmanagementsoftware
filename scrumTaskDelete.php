<?php

require_once('dbconnect.php');
$_SESSION['first_load'] = 0;

$id = $_POST['submit'];

$sql = "DELETE FROM task where id=$id";
$result = mysqli_query($conn, $sql);

header('Location: scrumBoard.php')

?>