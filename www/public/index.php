<?php
try{
    $conn = "mysql:host=mariadb;dbname=mysql;charset=utf8";
    $pdo = new PDO($conn, "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET CHARACTER SET utf8");
    $pdo=null;
}catch(PDOException $e){
    print("Error:".$e->getMessage());
    die();
}
phpinfo();