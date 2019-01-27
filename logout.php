<?php
setcookie('user_name','admin', time()-3600);
header("Location: http://localhost:8080/");
die();