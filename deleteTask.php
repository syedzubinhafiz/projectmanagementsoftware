<?php

require_once('dbconnect.php');
$id = $_POST['submit'];

$sql = "DELETE FROM task where id=$id";
$result = mysqli_query($conn, $sql);

header('Location: task.php')

?>