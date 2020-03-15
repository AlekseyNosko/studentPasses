<?php
session_start();
include_once 'kernel/autoload.php';// подкл. конфигов и тд.
require_once 'models/Role.php';
require_once 'models/Group.php';
Auth();//проверка на авторизацию
$smarty = new Smarty();

// то что я запихну либо в конфиг либо в абстракт класс
$smarty->template_dir = '/views';
$smarty->compile_dir = '/compiled';
$smarty->config_dir = '/configs';
//


$role = new Role();
$user_role = $role->get($_COOKIE['role']);
if ($user_role == 'Director' || $user_role == 'Admin') {
    $groups = new Group();
    $rows_groups =  $groups->get_all();
} else  {
    $groups = new Group();
    $rows_groups =  $groups->get($_COOKIE['group']);
}
$success = null;
if (isset($_SESSION['success'])){
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}
$smarty->assign('rows_groups',$rows_groups);
$smarty->assign('user_role', $user_role);
$smarty->assign('success', $success);

$smarty->display('views/home.tpl');
//include('views/home.php');// отображение страници