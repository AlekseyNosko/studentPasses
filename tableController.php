<?php
session_start();
include_once('kernel/autoload.php');
Auth();
require_once 'models/DaysOmission.php';
$omis = new DaysOmission();
$omis->set_group_omissions($_POST['date'],$_POST['group_id'],$_POST['check_user']);
$_SESSION['success'] = 'Успешно!';
header("Location: home.php");
session_write_close();