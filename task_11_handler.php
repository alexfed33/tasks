<?php
session_start();

$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$pdo = new PDO('mysql:host=localhost;dbname=tasks', 'root', '');

$sql = 'SELECT * FROM users WHERE email=:email';
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if(!empty($result)){
    $danger = 'Этот эл адрес уже занят другим пользователем';
    $_SESSION['danger'] = $danger;
    header('Location:/task_11.php');
    exit;
};


$sql = 'INSERT INTO users (email, password) VALUE (?,?)';
$stmt = $pdo->prepare($sql);
$stmt->execute([$email, $password]);

header('Location:/task_11.php');

