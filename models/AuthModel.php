<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../interfaces/IAuth.php";


class AuthModel extends Config implements IAuth
{
    /**
     * Override register method from IAuth.
     *
     * @return void
     */

    public function _doRegister(): void
    {
    }

    /**
     * Override login method from IAuth
     *
     * @return void
     */
    public function _doLogin($email, $password): void
    {
        $sql = $this->db->query("SELECT * FROM user WHERE email = '$email'");
        $fetch = $sql->fetch_object();
        $rowCount = $sql->num_rows;

        if ($rowCount > 0) {
            if (password_verify($password, $fetch->password)) {
                $_SESSION['user'] = TRUE;
                $_SESSION['user_id'] = $fetch->id;
                $_SESSION['name'] = $fetch->name;
                $_SESSION['role'] = $fetch->role;
            } else {
                alertHelper::failedActions("Email atau password salah");
            }
        } else {
            alertHelper::failedActions("Akun tidak ditemukan");
        }
    }
}
