<?php

class productRoute
{
    /**
     * Manage product menu's route
     *
     * @return void
     */
    public static function manageRoute(string $content): void
    {
        sessionMiddleware::adminSession();
        switch ($content) {
            case "list":
                require_once __DIR__ . Router::$loggedIn . "product/list.php";
                break;
            case "add":
                require_once __DIR__ . Router::$loggedIn . "product/add.php";
                break;
            case "edit":
                require_once __DIR__ . Router::$loggedIn . "product/edit.php";
                break;
            case "delete":
                require_once __DIR__ . Router::$loggedIn . "product/delete.php";
                break;
            default:
                require_once __DIR__ . Router::$errors . "404.php";
        }
    }
}
