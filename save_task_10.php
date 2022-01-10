<?php

session_start();

$text = $_POST['text'];

$pdo = new PDO('mysql:host=localhost;dbname=tasks', 'root', '');


$sql = 'SELECT * FROM save_table WHERE text=:text';
$stmt = $pdo->prepare($sql);
$stmt->execute(['text' => $text]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if(!empty($result)){
    $danger = 'Данная запись уже существует!';
    $_SESSION['danger'] = $danger;
    header('Location:/task_10.php');
    exit;
};


$sql = 'INSERT INTO save_table (text) VALUES(:text)';
$stmt = $pdo->prepare($sql);
$stmt->execute(['text' => $text]);

$success  = 'Запись успешно добавлена!';
$_SESSION['success'] = $success;

header('Location:/task_10.php');