<?php
session_start();

if(isset($_POST['type'])){
    $cat = $_POST['type'];
    $_SESSION['type'] = $cat;
    header('Location: task.php');
}

?>