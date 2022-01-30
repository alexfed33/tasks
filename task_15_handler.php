<?php

$image = uniqid().$_FILES['image']['name'];
$uploaddir = 'img/uploads/';
$uploadfile = $uploaddir.($image);


$pdo = new PDO('mysql:host=localhost;dbname=tasks', 'root', '');
$sql = 'INSERT INTO image (images) VALUES (?)';
$statement = $pdo->prepare($sql);
$result = $statement->execute([$image]);

//проверка на тип файла
$img = $_FILES["image"];
$supportTypes = ["image/jpeg", "image/png"];

if(!in_array($img["type"], $supportTypes)) {
    echo "Incorrect file type"; die(); }

//проверка на загрузку картинки
if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    header('Location:/task_15.php'); die();
} else {
    echo 'Error uploading file'; die(); }


