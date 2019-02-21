<?php

session_start();

if (isset($_SESSION['user_name']))
{
    echo "Hello: " . $_SESSION['user_name'];
    echo ' <a href="logout.php">Logout</a>';
}
else
{
    require_once 'login-form.php';
}
 