<?php
session_start();
include_once('kernel/autoload.php');
require_once 'models/Group.php';
require_once 'models/User.php';
Auth();
$_SESSION['refer'] = $_SERVER['HTTP_REFERER'];
$group = new Group();
$users = new User();

$date = $_POST['date_table'];
$tmp = $group->get($_POST['group']);
$users_group = $users->get_users_this_group($tmp[0]['id']);
include "views/table.php";