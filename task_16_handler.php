<?php

for ($i=0; $i < count($_FILES['image']['name']); $i++) {
    upload_file($_FILES['image']['name'][$i], $_FILES['image']['tmp_name'][$i]);
}

function upload_file($filename, $tmp_name) {
    $result = pathinfo($filename);
    $filename = uniqid() . "." .$result['extension'];

    $pdo = new PDO('mysql:host=localhost;dbname=tasks', 'root', '');
    $sql = 'INSERT INTO image (images) VALUES (?)';
    $statement = $pdo->prepare($sql);
    $statement->execute([$filename]);

    move_uploaded_file($tmp_name, 'img/uploads/' . $filename);
}

header('Location:/task_16.php');
