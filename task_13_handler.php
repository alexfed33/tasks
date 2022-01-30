<?php
session_start();

    if(isset($_POST['submit']))
    {
        $_SESSION['count'] ++;
        header('Location:/task_13.php');
    };


