<?php
session_start();

unset($_SESSION['user_name']);
header("Location: http://localhost:8080/");
die();