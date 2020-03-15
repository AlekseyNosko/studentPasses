<?php
Class DaysOmission
{
    function __construct()
    {
        $this->db = mysqli_connect(HOST, USER, PASS, DB) or die ('Нет соединения с БД');
        mysqli_set_charset($this->db, 'utf8') or die ('Не установлена кодировка');
    }

    public function set_group_omissions($date, $group_id, $arr_students)
    {

        foreach ($arr_students as $student_id) {

            $date = date("Y-m-d", strtotime($date));
            $query = "INSERT INTO `days_omissions`(`group_id`, `user_id`, `date`) VALUES ('$group_id', '$student_id', '$date')";
            mysqli_query($this->db, $query);
            if (mysqli_error($this->db)) {
                return false;
                var_dump($group_id);
            }
        }
    }

    public function get_students_for_date($date_start, $date_end, $group = null)
    {
        $date_start = date("Y-m-d", strtotime($date_start));
        $date_end = date("Y-m-d", strtotime($date_end));
        if ($group) {
            $query = "SELECT days_omissions.id, days_omissions.date, `user`.fio, `group`.`name` FROM `days_omissions` 
            JOIN `user` ON (`user`.id = days_omissions.user_id) JOIN `group` ON (days_omissions.group_id = `group`.id)
            WHERE days_omissions.date >= '$date_start' AND days_omissions.date <= '$date_end' AND `group`.id = '$group' ORDER BY days_omissions.date";
        } else {
            $query = "SELECT days_omissions.id, days_omissions.date, `user`.fio, `group`.`name` FROM `days_omissions` 
            JOIN `user` ON (`user`.id = days_omissions.user_id) JOIN `group` ON (days_omissions.group_id = `group`.id) WHERE days_omissions.date >= 
            '$date_start' AND days_omissions.date <= '$date_end' ORDER BY days_omissions.date";
        }
        $res = mysqli_query($this->db, $query);
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC);

        if ($data) {
            return $data;
        } else {
            return false;
        }
    }

    public function get_one_student($date_start, $date_end, $student)
    {
        $date_start = date("Y-m-d", strtotime($date_start));
        $date_end = date("Y-m-d", strtotime($date_end));
        $query = "SELECT days_omissions.id, days_omissions.date, `user`.fio, `group`.`name` FROM `days_omissions` 
            JOIN `user` ON (`user`.id = days_omissions.user_id) JOIN `group` ON (days_omissions.group_id = `group`.id)
            WHERE days_omissions.date >= '$date_start' AND days_omissions.date <= '$date_end' AND `user`.id = '$student' ORDER BY days_omissions.date";
        $res = mysqli_query($this->db, $query);
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC);

        if ($data) {
            return $data;
        } else {
            return false;
        }
    }

    public function get_all()
    {
        $query = "SELECT * FROM `group`";
        $res = mysqli_query($this->db, $query);
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }

    public function get($id)
    {
        $query = "SELECT * FROM `group` WHERE `id` = '$id'";
        $res = mysqli_query($this->db, $query);
        $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }
}