<?php

class orderRoute
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
                require_once __DIR__ . Router::$loggedIn . "order/list.php";
                break;
            case "detail":
                require_once __DIR__ . Router::$loggedIn . "order/detail.php";
                break;
            case "update":
                require_once __DIR__ . Router::$loggedIn . "order/update.php";
                break;
            default:
                require_once __DIR__ . Router::$errors . "404.php";
        }
    }
}
