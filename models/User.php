<?php
class User {
    private $db;
    private $id;
    private $login;
    private $group;
    private $role;
    private $fio;

    function __construct()
    {
        $this->db = mysqli_connect(HOST, USER, PASS, DB) or die ('Нет соединения с БД');
        mysqli_set_charset($this->db, 'utf8') or die ('Не установлена кодировка');
    }

    public function get($id) {

    }

    public function get_users_this_group($id_group) {
        $query = "SELECT `id`, `fio` FROM `user` WHERE group_id = '$id_group'";
        $res = mysqli_query($this->db, $query);
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if ($data){
            $result['users'] = $data;
        } else {
            return false;
        }
        $query = "SELECT `id`, `name` FROM `group` WHERE id = '$id_group'";
        $res = mysqli_query($this->db, $query);
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if ($data){
            $result['group'] = $data;
            return $result;
        } else {
            return false;
        }
    }

    public function authorization($login,$password) {
        $query = "SELECT * FROM `user` WHERE `login` = '$login' AND `pass` = '$password'";
        $res = mysqli_query($this->db, $query);
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if($data){
            $this->id = $data[0]['id'];
            $this->login = $data[0]['login'];
            $this->fio = $data[0]['fio'];
            $this->group = $data[0]['group_id'];
            $this->role = $data[0]['role_id'];
            setcookie('login',$this->login,time()+3600*24,'/');
            setcookie('id',$this->id,time()+3600*24,'/');
            setcookie('fio',$this->fio,time()+3600*24,'/');
            setcookie('role',$this->role,time()+3600*24,'/');
            setcookie('group',$this->group,time()+3600*24,'/');
            return true;
        } else {
            return false;
        }
        return $res;
    }

    public function registration($reg_data) {
        $log = mysqli_real_escape_string($this->db, $reg_data['login']);
        $pass = mysqli_real_escape_string($this->db, $reg_data['password']);
        $fio = mysqli_real_escape_string($this->db, $reg_data['fio']);
        $role = mysqli_real_escape_string($this->db, $reg_data['role']);
        if($reg_data['group'] !== 'not'){
            $group = mysqli_real_escape_string($this->db, $reg_data['group']);
            $query = "INSERT INTO `user`(`group_id`, `role_id`, `fio`, `login`, `pass`) VALUES ('$group', '$role', '$fio', '$log', '$pass')";
        } else {
            $query = "INSERT INTO `user`(`role_id`, `fio`, `login`, `pass`) VALUES ('$role', '$fio', '$log', '$pass')";
        }

        mysqli_query($this->db, $query);
        if (!mysqli_error($this->db))
        {
            // это было для регистрации пользователей
//            if($this->authorization($log,$pass)){
//                return true;
//            } else {
//                return false;
//            }
            return true;
        }
        else {
            return false;
        }
    }
}