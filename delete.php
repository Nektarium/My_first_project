<?php

    $id = isset($_GET['id']) ? $_GET['id'] : '';  // ID пользователя
    $pathUpload = "uploads/";   // Директория файлов

    // Подключаемся к БД
    try {
        $connection = new PDO('mysql:host=localhost;dbname=my_new_DB;charset=utf8;', 'root', '123');
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage();
        die();
    }

    // Отправляю запрос на выборку всех элементов из БД
    $statement = $connection->prepare("SELECT * FROM `users` WHERE id = :id");
    $statement->bindParam(":id", $id);
    $statement->execute();
    $user = $statement->fetch();

    // Отправляю запрос на удаление записей по указанному id из БД
    $statement = $connection->prepare("DELETE FROM `users` WHERE id = :id");
    $statement->bindParam(":id", $id);
    $statement->execute();

    // Закрываю соединение с БД
    $statement->connection = null;

    header("Location:index.php");
?>