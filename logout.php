<?php
include_once 'kernel/autoload.php';
setcookie('login','',time()-1,'/');
setcookie('id','',time()-1,'/');
setcookie('fio','',time()-1,'/');
setcookie('role','',time()-1,'/');
header("Location: home.php");

