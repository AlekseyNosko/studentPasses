<?php
class Group {

    function __construct()
    {
        $this->db = mysqli_connect(HOST, USER, PASS, DB) or die ('Нет соединения с БД');
        mysqli_set_charset($this->db, 'utf8') or die ('Не установлена кодировка');
    }

    public function get_all() {
        $query = "SELECT * FROM `group`";
        $res = mysqli_query($this->db, $query);
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if ($data){
            return $data;
        } else {
            return false;
        }
    }

    public function get($id_group) {
        $query = "SELECT * FROM `group` WHERE `id` = '$id_group'";
        $res = mysqli_query($this->db, $query);
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if ($data){
            return $data;
        } else {
            return false;
        }
    }
}