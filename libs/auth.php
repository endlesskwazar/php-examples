<?php

function is_user_logged(){
    if(isset($_SESSION['login']))
        return true;
    return false;
}