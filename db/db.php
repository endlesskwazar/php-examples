<?php

function check_db(){
    $pdo = new PDO("mysql:host=localhost;dbname=auth_hash;", 'root', NULL);
    $res = $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id int not NULL AUTO_INCREMENT,
        login varchar(15) not null,
        password varchar(1000) not NULL,
        PRIMARY KEY(id)
    );");
}

function is_user_exists($login, $password){
    $pdo = new PDO("mysql:host=localhost;dbname=auth_hash;", 'root', NULL);
    $params = array(':login' => $login, ':password' => $password);
    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = :login AND password = :password");

    if ($stmt->execute($params)) {
        while ($row = $stmt->fetch()) {
          return true;
        }
      }

    return false;
}