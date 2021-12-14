<?php

/**
 * Define site routing method.
 *
 * @return void
 */
class Router
{
    private $public = "/../views/public/home/";
    private $auth = "/../views/public/auth/";
    private $errors = "/../views/errors/";
    private $loggedIn = "/../views/public/dashboard/";

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
                case "dashboard":
                    (isset($_GET['content']) ? $this->dashboardRoute($_GET['content']) : $this->dashboardRoute("main"));
                    break;
                default:
                    require_once __DIR__ . $this->errors . "404.php";
            }
        } else {
            header('location: index.php?page=main');
        }
    }

    public function dashboardRoute(string $content): void
    {
        switch ($content) {
            case "main":
                require_once __DIR__ . $this->loggedIn . "index.php";
                break;
            case "product":
                require_once __DIR__ . $this->auth . "index.php";
                break;
            case "register":
                require_once __DIR__ . $this->auth . "register.php";
                break;
            case "profile":
                require_once __DIR__ . $this->loggedIn . "profile.php";
                break;

            case "logout":
                require_once __DIR__ . $this->loggedIn . "logout.php";
                break;
            default:
                require_once __DIR__ . $this->errors . "404.php";
        }
    }
}
