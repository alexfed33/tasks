<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];


$pdo = new PDO('mysql:host=localhost;dbname=tasks', 'root', '');

$stmt = $pdo->query('SELECT * FROM users ');

foreach ($stmt as $row) {
    if ($email == $row['email'] and  password_verify($password, $row['password']))
    {
        $user = $row['email'];
        $_SESSION['user'] = $user;
        header('Location:/task_14.php');
        exit;
    }
};


unset($_SESSION['user']);
$danger = 'Неверный логин или пароль';
$_SESSION['danger'] = $danger;
header('Location:/task_14.php');

