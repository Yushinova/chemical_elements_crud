<?php
 function pingDb(): void{
     try {
        $conn = openDbConnection();
        echo "connection Ok! <br/>";
        $conn->close();
        echo "connection closed, ping OK <br>";
     } catch (Exeption $ex) {
        die ("ping failed: ".$ex->getMessage());
     }
 }

 //создание подключения
 function openDbConnection() : mysqli{
    //нужно все вынести в отдельный файл
    $host = "db";
    $port = 3306;
    $username = "root";
    $password = "root";
    $database = "chemical_elements_db";
    //создать и вернуть подключение
    return new mysqli($host, $username, $password, $database, $port);
 }