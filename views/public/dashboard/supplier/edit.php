<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../controllers/SupplierController.php";

if (isset($_GET['id'])) {
    $supplier = new SupplierController();
    $id = abs($_GET['id']);
    $data = $supplier->getById($id);
}

?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Supplier</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table id="example" style="min-width: 845px">
                                    <tbody>
                                        <tr>
                                            <td>Nama <span class="text-danger">*</span></td>
                                            <td><input type="text" placeholder="Keripik" class="form-control" name="name" autocomplete="off" value="<?= $data['name'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat <span class="text-danger">*</span></td>
                                            <td><textarea placeholder="Malang Raya" class="form-control" name="address" autocomplete="off"><?= $data['address'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Telepon <span class="text-danger">*</span></td>
                                            <td><input type="number" placeholder="6282257181273" class="form-control" name="phone_number" autocomplete="off" value="<?= $data['phone_number'] ?>"></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: right;">
                                    <button class="btn btn-warning light btn-md" name="submit" type="submit">Update Data</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<?php
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";

if (isset($_POST['submit'])) {
    $supplier = new SupplierController();
    $supplier->update($id);
}
?>