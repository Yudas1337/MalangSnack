<?php
require_once __DIR__ . "/../configs/Config.php";

class UserController extends Config
{
    public static function logout(): void
    {
        $_SESSION['user'] = FALSE;
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        unset($_SESSION['role']);

        header('location: index.php?page=login');
    }

    public function getUser(): array
    {
        $arr = array();
        $id = $_SESSION['user_id'];
        $fetch = $this->db->query("SELECT * FROM user WHERE id = '$id'")->fetch_object();

        $arr['user_id'] = $fetch->id;
        $arr['email'] = $fetch->email;
        $arr['name'] = $fetch->name;
        $arr['phone_number'] = $fetch->phone_number;
        $arr['photo'] = $fetch->photo;

        return $arr;
    }
}
