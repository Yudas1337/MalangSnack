<?php
session_start();

class sessionMiddleware
{
    public static function adminSession(): void
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != "admin") {
            echo "Anda tidak punya hak akses";
            die;
        }
    }

    public static function publicSession(): void
    {
        if (!isset($_SESSION['role']) && $_SESSION['role'] != "public") {
            echo "Anda tidak punya hak akses";
            die;
        }
    }

    public static function checkSession(): void
    {
        if (isset($_SESSION['role'])) {
            header("location: index.php?page=dashboard");
        }
    }
}
