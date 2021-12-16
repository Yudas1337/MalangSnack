<?php

class supplierRoute
{

    /**
     * Manage supplier menu's route
     *
     * @return void
     */
    public static function manageRoute(string $content): void
    {
        sessionMiddleware::adminSession();
        switch ($content) {
            case "list":
                require_once __DIR__ . Router::$loggedIn . "supplier/list.php";
                break;
            case "add":
                require_once __DIR__ . Router::$loggedIn . "supplier/add.php";
                break;
            case "edit":
                require_once __DIR__ . Router::$loggedIn . "supplier/edit.php";
                break;
            case "delete":
                require_once __DIR__ . Router::$loggedIn . "supplier/delete.php";
                break;
            default:
                require_once __DIR__ . Router::$errors . "404.php";
        }
    }
}
