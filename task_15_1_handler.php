<?php
//подключение к БД
$pdo = new PDO('mysql:host=localhost;dbname=tasks', 'root', '');


//удаление картинки
if(isset($_POST['delete']))
{
    $file_path = $_POST['file_path'];
    $stmt = $pdo->prepare("DELETE FROM image WHERE images = ?");
    $stmt->execute([$file_path]);
    unlink("img/uploads/$file_path");
    header('Location:/task_15_1.php');
    exit();
}

//проверка на тип расширения картинки
$img = $_FILES["image"];
$supportTypes = ["image/jpeg", "image/png"];

if(!in_array($img["type"], $supportTypes)) {
    echo "Incorrect file type"; die();
}

//сохрание картинки в БД
$image = uniqid().$_FILES['image']['name'];
$uploaddir = 'img/uploads/';
$uploadfile = $uploaddir.($image);

$sql = "INSERT INTO image (images) VALUES (?)";
$statement = $pdo->prepare($sql);
$statement -> execute([$image]);

//загрузка картинки
if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    header('Location:/task_15_1.php'); die();
} else {
    echo 'Error uploading file'; die();
}






