<?php
require_once __DIR__ . "/../middleware/sessionMiddleware.php";
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

    /**
     * Manage site global route
     *
     * @return void
     */
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
                case "403":
                    require_once __DIR__ . $this->errors . "403.php";
                    break;
                default:
                    require_once __DIR__ . $this->errors . "404.php";
            }
        } else {
            header('location: index.php?page=main');
        }
    }

    /**
     * Manage dashboard route
     *
     * @return void
     */
    public function dashboardRoute(string $content): void
    {
        sessionMiddleware::isNotLoggedIn();
        switch ($content) {
            case "main":
                require_once __DIR__ . $this->loggedIn . "index.php";
                break;
            case "product":
                (isset($_GET['menu']) ? $this->productRoute($_GET['menu']) : $this->dashboardRoute("main"));
                break;
            case "category":
                (isset($_GET['menu']) ? $this->categoryRoute($_GET['menu']) : $this->dashboardRoute("main"));
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

    /**
     * Manage product menu's route
     *
     * @return void
     */
    public function productRoute(string $content): void
    {
        sessionMiddleware::adminSession();
        switch ($content) {
        }
    }

    /**
     * Manage category menu's route
     *
     * @return void
     */
    public function categoryRoute(string $content): void
    {
        sessionMiddleware::adminSession();
        switch ($content) {
            case "list":
                require_once __DIR__ . $this->loggedIn . "kategori/list.php";
                break;
            case "add":
                require_once __DIR__ . $this->loggedIn . "kategori/add.php";
                break;
            case "edit":
                require_once __DIR__ . $this->loggedIn . "kategori/edit.php";
                break;
            case "delete":
                require_once __DIR__ . $this->loggedIn . "kategori/delete.php";
                break;
            default:
                require_once __DIR__ . $this->errors . "404.php";
        }
    }
}
