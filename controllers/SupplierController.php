<?php
require_once __DIR__ . "/../controllers/Controller.php";
require_once __DIR__ . "/../models/SupplierModel.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../interfaces/IForm.php";

class SupplierController extends Controller
{
    private $redirect = "index.php?page=dashboard&content=supplier&menu=list";

    private $formHelper;
    private $supplierModel;

    /**
     * Define a CategoryController constructor .
     */
    function __construct()
    {
        $this->formHelper = new formHelper();
        $this->supplierModel = new SupplierModel();
    }

    /**
     * Get All Category .
     * @return array
     */
    public function getAll(): array
    {
        return $this->supplierModel->show();
    }

    /**
     * Get Category By Id .
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->supplierModel->getById($id);
    }

    /**
     * Insert new Category .
     * @return void
     */
    public function save(): void
    {
        $this->filterForm();

        $this->supplierModel->save();
        alertHelper::successAndRedirect("Berhasil tambah supplier", $this->redirect);
    }

    /**
     * update current Category .
     * @return void
     */

    public function update(int $id): void
    {
        $this->filterForm();
        $this->supplierModel->update($id);
        alertHelper::successAndRedirect("Berhasil update supplier", $this->redirect);
    }

    /**
     * delete Category .
     * @return void
     */

    public function delete(int $id): void
    {
        $redirect = $this->redirect;
        $this->supplierModel->delete($id);
        header("location: $redirect");
    }

    /**
     * Filter Form .
     * @return void
     */
    public function filterForm(): void
    {
        formHelper::isNotNull(['name', 'address', 'phone_number']);
        $phone_number = formHelper::changePhoneFormat($_POST['phone_number']);
        formHelper::validDigit($phone_number);
        $this->formHelper->checkUnique("user", "phone_number", $phone_number, 'Nomor Telepon');
        formHelper::minimumLength("Nomor Telepon", $phone_number, 10);
        formHelper::maximumLength("Nomor Telepon", $phone_number, 15);
    }
}
