<?php
require_once __DIR__ . "/../models/CategoryModel.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../interfaces/IForm.php";

class CategoryController implements IForm
{
    private $redirect = "index.php?page=dashboard&content=category&menu=list";

    private $categoryModel;

    /**
     * Define a CategoryController constructor .
     */
    function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Get All Category .
     * @return array
     */
    public function getAll(): array
    {
        return $this->categoryModel->show();
    }

    /**
     * Get Category By Id .
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->categoryModel->getById($id);
    }

    /**
     * Insert new Category .
     * @return void
     */
    public function save(): void
    {
        $this->filterForm();
        formHelper::shouldUpload($_FILES['icon']['name'], "Icon Kategori");

        $this->categoryModel->save();
        alertHelper::successAndRedirect("Berhasil tambah kategori", $this->redirect);
    }

    /**
     * update current Category .
     * @return void
     */

    public function update(int $id): void
    {
        $this->filterForm();
        $this->categoryModel->edit($id);
        alertHelper::successAndRedirect("Berhasil update kategori", $this->redirect);
    }

    /**
     * delete Category .
     * @return void
     */

    public function delete(int $id): void
    {
        $redirect = $this->redirect;
        $this->categoryModel->delete($id);
        header("location: $redirect");
    }

    /**
     * Filter Form .
     * @return void
     */
    public function filterForm(): void
    {
        formHelper::isNotNull(['name']);
        formHelper::validString("Nama Kategori", $_POST['name']);
    }
}
