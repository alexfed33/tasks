<?php
$pdo = new PDO('mysql:host=localhost;dbname=tasks', 'root', '');

$images = $_FILES["image"];

$normalizeImages = [];

foreach ($images as $key => $attrs) {
    foreach ($attrs as $index => $attr) {
        $normalizeImages[$index][$key] = $attr;
    }
}

foreach ($normalizeImages as $normalizeImage) {

    $img = uniqid() . $normalizeImage["name"];
    $uploaddir = 'img/uploads/';
    $uploadfile = $uploaddir . $img;

    $sql = 'INSERT INTO image (images) VALUES (?)';
    $statement = $pdo->prepare($sql);
    $statement->execute([$img]);

    if (!move_uploaded_file($normalizeImage['tmp_name'], $uploadfile)) {
        echo "Error uploading file";
        die();
    }
}

header('Location:/task_16.php');




