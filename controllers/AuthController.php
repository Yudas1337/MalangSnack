<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../models/AuthModel.php";

class AuthController extends Config
{
    private $authModel;

    function __construct()
    {
        parent::__construct();
        $this->authModel = new AuthModel();
    }
    public function login()
    {
        echo "<script>
        swal('Gotcha!','Berhasil Login','success')
        </script>";
        return true;
    }

    public function register()
    {
    }
}
