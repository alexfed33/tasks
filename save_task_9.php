<?php

$text = $_POST['text'];

$pdo = new PDO('mysql:host=localhost;dbname=tasks', 'root', '');
$sql = 'INSERT INTO save_table (text) VALUES(:text_s)';
$stmt = $pdo->prepare($sql);
$stmt->execute(['text_s' => $text]);

header('Location:/task_9.php');