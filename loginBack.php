<?php

session_start();
require_once('dbconnect.php');

if(isset($_POST['email']) && isset($_POST['password'])){
	$e = $_POST['email'];
	$p = $_POST['password'];

	$sql = "SELECT * FROM admin WHERE email = '$e' AND password = '$p'";
	
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) != 0) {
        $_SESSION['active'] = 'True';
        header('Location: productBacklog.php');
    }
    else {
        header('Location: log_in.php');
    }
}

?>
