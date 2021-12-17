<?php
require_once __DIR__ . "/../models/HomeProductModel.php";

class HomeProductController
{
    private $homeProductModel;

    function __construct()
    {
        $this->homeProductModel = new HomeProductModel();
    }

    /**
     * Get All Category .
     * @return array
     */
    public function getCategory(): array
    {
        return $this->homeProductModel->getCategory();

    }

    public function getProduct(): array
    {
        return $this->homeProductModel->getProduct();

    }

    public function getProductDetail($id): object
    {
        return $this->homeProductModel->getProductDetail($id);

    }
}
