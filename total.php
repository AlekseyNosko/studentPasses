<?php
session_start();
include_once('kernel/autoload.php');
require_once 'models/DaysOmission.php';
require_once 'models/Role.php';
Auth();
$_SESSION['refer'] = $_SERVER['HTTP_REFERER'];
$days = new DaysOmission();
$role = new Role();
$user_role = $role->get($_COOKIE['role']);
$user_id = $_COOKIE['id'];
$date_start = $_POST['date_ot'];
$date_end = $_POST['date_do'];
if ($user_role == 'Student') {
    $rows = $days->get_one_student($date_start,$date_end,$user_id);
} else {
    if ($_POST['total_group'] == 'all') {
        $rows = $days->get_students_for_date($date_start,$date_end);
    } else {
        $rows = $days->get_students_for_date($date_start,$date_end, $_POST['total_group']);
    }
}
include "views/total.php";