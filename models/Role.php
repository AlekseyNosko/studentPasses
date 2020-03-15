<?php
class Role {

    function __construct()
    {
        $this->db = mysqli_connect(HOST, USER, PASS, DB) or die ('Нет соединения с БД');
        mysqli_set_charset($this->db, 'utf8') or die ('Не установлена кодировка');
    }

    public function get_all() {
        $query = "SELECT * FROM `role`";
        $res = mysqli_query($this->db, $query);
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if ($data){
            return $data;
        } else {
            return false;
        }
    }

    public function get($id) {
        $query = "SELECT `name` FROM `role` WHERE `id` = '$id'";
        $res = mysqli_query($this->db, $query);
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if ($data){
            return $data[0]['name'];
        } else {
            return false;
        }
    }
}