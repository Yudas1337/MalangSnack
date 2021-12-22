<?php

class invoiceRoute
{

    /**
     * Manage product menu's route
     *
     * @return void
     */
    public static function manageRoute(string $content): void
    {
        sessionMiddleware::publicSession();
        switch ($content) {
            case "list":
                require_once __DIR__ . Router::$loggedIn . "invoice/list.php";
                break;
            case "detail":
                require_once __DIR__ . Router::$loggedIn . "invoice/detail.php";
                break;
            default:
                require_once __DIR__ . Router::$errors . "404.php";
        }
    }
}
