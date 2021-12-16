<?php

class customerRoute
{

    /**
     * Manage customer menu's route
     *
     * @return void
     */
    public static function manageRoute(string $content): void
    {
        sessionMiddleware::adminSession();
        switch ($content) {
            case "list":
                require_once __DIR__ . Router::$loggedIn . "customer/list.php";
                break;
            default:
                require_once __DIR__ . Router::$errors . "404.php";
        }
    }
}
