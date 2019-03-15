<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

 <?php   
session_start();
require 'vendor/autoload.php';
require 'db/db.php';
require 'libs/auth.php';

check_db();

if(isset($_SESSION['login'])){
    echo 'Protected info. If you see this you are logged in.';
    echo '<a href="templates/logout.php">logout</a>';
}
else {
    require 'templates/login.php';
}

?>

</body>
</html>
<?php



