<?php

session_start();
$_SESSION['first_load'] = 0;

if(isset($_POST['type'])){
    $cat = $_POST['type'];
    $_SESSION['type'] = $cat;
    header('Location: backlogs.php');
}

?>