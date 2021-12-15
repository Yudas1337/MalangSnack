<?php
class sessionMiddleware
{
    public static function adminSession(): void
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != "admin") {
            header('location: index.php?page=403');
            die;
        }
    }

    public static function publicSession(): void
    {
        if (!isset($_SESSION['role']) && $_SESSION['role'] != "public") {
            header('location: index.php?page=403');
            die;
        }
    }

    public static function isNotLoggedIn(): void
    {
        if (!isset($_SESSION['role'])) {
            header('location: index.php?page=403');
        }
    }

    public static function isLoggedIn(): void
    {
        if (isset($_SESSION['role'])) {
            header("location: index.php?page=dashboard");
        }
    }
}
