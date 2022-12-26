<?php
session_start();

if(isset($_POST['tag'])){
    $type = $_POST['tag'];
    $_SESSION['tag'] = $type;
    header('Location: task.php');
}

?>