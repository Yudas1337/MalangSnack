<?php
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

    public static function isNotLoggedIn(): void
    {
        if (!isset($_SESSION['role'])) {
            echo "Anda tidak punya hak akses";
            die;
        }
    }

    public static function isLoggedIn(): void
    {
        if (isset($_SESSION['role'])) {
            header("location: index.php?page=dashboard");
        }
    }
}
