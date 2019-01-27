<?php

if (isset($_COOKIE['user_name']))
{
    echo "Hello: " . $_COOKIE['user_name'];
    echo ' <a href="logout.php">Logout</a>';
}
else
{
    require_once 'login-form.php';
}
 