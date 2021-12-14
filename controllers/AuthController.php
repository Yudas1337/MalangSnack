<?php
session_start();
require_once __DIR__ . "/../models/AuthModel.php";
require_once __DIR__ . "/../helpers/formHelper.php";

class AuthController
{
    private $authModel;
    private $formHelper;

    /**
     * Define an AuthController constructor .
     */
    function __construct()
    {
        $this->authModel = new AuthModel();
        $this->formHelper = new formHelper();
    }

    /**
     * Define login method.
     *
     * @return void
     */
    public function login(): void
    {
        formHelper::isNotNull(["email", "password"]);
        formHelper::validEmail($_POST['email']);

        $email = $this->formHelper->sanitizeInput($_POST['email']);
        $password = $this->formHelper->sanitizeInput($_POST['password']);

        $this->authModel->_doLogin($email, $password);

        alertHelper::successAndRedirect("Berhasil login. selamat datang " . $_SESSION['name'], "index.php?page=dashboard");
    }

    /**
     * Define register method.
     *
     * @return void
     */
    public function register(): void
    {
    }
}
