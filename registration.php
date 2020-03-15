<?php
session_start();
include 'kernel/autoload.php';
require_once 'models/Group.php';
require_once  'models/Role.php';
Auth();
$groups = new Group();
$roles = new Role();
$rows_groups = $groups->get_all();
$rows_roles = $roles->get_all();
include ('views/registration.php');
