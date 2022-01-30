<?php
session_start();

if (isset($_POST['exit'])){
    unset($_SESSION['user']);
    header('Location:/task_14_1.php');
    exit;
}

header('Location:/task_14_1.php');



