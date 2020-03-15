<?php session_start();
include_once ('kernel/autoload.php');
LogAndRegAuth();
include ('views/auth.php');
session_write_close();