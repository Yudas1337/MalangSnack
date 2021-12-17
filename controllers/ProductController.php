<?php
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../models/ProductModel.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../interfaces/IForm.php";

class ProductController extends Controller implements iForm
{
    private $redirect = "index.php?page=dashboard&content=product&menu=list";

    private $productModel;

    function __construct()
    {
        $this->productModel = new ProductModel();
    }

    /**
     * Get All Category .
     * @return array
     */
    public function getAll(): array
    {
        return $this->productModel->show();
    }

    /**
     * Get Category By Id .
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->productModel->getById($id);
    }

    /**
     * Insert new Category .
     * @return void
     */
    public function save(): void
    {
        $this->filterForm();
        formHelper::shouldUpload($_FILES['thumbnail']['name'], "Foto Produk");

        $this->productModel->save();
        alertHelper::successAndRedirect("Berhasil tambah Produk", $this->redirect);
    }

    /**
     * update current Category .
     * @return void
     */

    public function update(int $id): void
    {
        $this->filterForm();
        $this->productModel->update($id);
        alertHelper::successAndRedirect("Berhasil update Produk", $this->redirect);
    }

    /**
     * delete Category .
     * @return void
     */

    public function delete(int $id): void
    {
        $redirect = $this->redirect;
        $this->productModel->delete($id);
        header("location: $redirect");
    }

    /**
     * Filter Form .
     * @return void
     */
    public function filterForm(): void
    {
        formHelper::isNotNull(['product_id', 'name', 'category_id', 'description', 'supplier_id', 'merk', 'price', 'stock']);
        formHelper::digitAndChar('Kode Produk', $_POST['product_id']);
        formHelper::validDigit($_POST['category_id']);
        formHelper::validDigit($_POST['supplier_id']);
        formHelper::validDigit($_POST['price']);
        formHelper::validDigit($_POST['stock']);
    }
}
