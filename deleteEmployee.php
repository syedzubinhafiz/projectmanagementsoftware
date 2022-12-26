<?php

require_once('dbconnect.php');
$name = $_POST['submit'];

$sql = "DELETE FROM employee where name='$name'";

$result = mysqli_query($conn, $sql);

header('Location: teamDashboard.php');

?>