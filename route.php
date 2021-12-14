<?php

class Route
{
    private $public = "/views/public/";
    private $auth = "/views/public/auth/";
    private $errors = "/views/errors/";

    function __construct()
    {
        $this->manageRoute();
    }

    public function manageRoute(): void
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case "main":
                    require_once __DIR__ . $this->public . "index.php";
                    break;
                case "login":
                    require_once __DIR__ . $this->auth . "index.php";
                    break;
                case "register":
                    require_once __DIR__ . $this->auth . "register.php";
                    break;

                default:
                    require_once __DIR__ . $this->errors . "404.php";
            }
        } else {
            header('location: index.php?page=main');
        }
    }
}
