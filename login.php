<?php

$secureLogin = 'admin';
$securePassword = 'password';

if(empty($_POST['login']) || empty($_POST['password'])){
  echo 'Please provide credentionals!!!';
  die();  
}

$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);

if(!($secureLogin == $login && $securePassword = $password)){
    echo 'Wrong credentionals';
    die();
}

setcookie('user_name','admin', time()+3600);
header("Location: http://localhost:8080/");
die();