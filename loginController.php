<?php
session_start();
include_once('kernel/autoload.php');
LogAndRegAuth();
require_once 'models/User.php';
$user = new User();

if($user->authorization($_POST['login'],$_POST['password'])){
    header("Location: home.php");
} else {
    $_SESSION['errorAuth'] = 'Неверно введенное имя или пароль!';
    header("Location: auth.php");
    session_write_close();
}


