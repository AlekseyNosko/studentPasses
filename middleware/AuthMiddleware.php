<?php
function Auth()
{
    if(!empty($_COOKIE['login'])) {
        return;
    } else {
        header("Location: auth.php");
    }
}

function is_Auth()
{
    if(!empty($_COOKIE['login'])) {
        return true;
    } else {
        return false;
    }
}

function LogAndRegAuth()
{
    if(!empty($_COOKIE['login'])) {
        header("Location: home.php");
    } else {
        return;
    }
}