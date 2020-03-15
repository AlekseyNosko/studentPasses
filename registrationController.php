<?php
session_start();
include_once('kernel/autoload.php');
Auth();
require_once 'models/User.php';
$user = new User();
if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['fio']) && !empty($_POST['group']) && !empty($_POST['role']) ){
    if($user->registration([
        'login' => $_POST['login'],
        'password'=> $_POST['password'],
        'fio' => $_POST['fio'],
        'group' => $_POST['group'],
        'role' => $_POST['role']
    ])){
        header("Location: home.php");
    } else {
        $_SESSION['errorReg'] = 'Ошибка регистрации!';
        header("Location: registration.php");
        session_write_close();
    }
} else {
    $_SESSION['errorReg'] = 'Введены не все поля!';
    header("Location: registration.php");
    session_write_close();
}



