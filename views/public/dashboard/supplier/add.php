<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../controllers/SupplierController.php";
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
                        <h4 class="card-title">Tambah Supplier</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="table-responsive">
                                <table id="example" style="min-width: 845px">
                                    <tbody>
                                        <tr>
                                            <td>Nama <span class="text-danger">*</span></td>
                                            <td><input type="text" placeholder="Oleh-oleh khas Malang" class="form-control" name="name" autocomplete="off" value="<?= (isset($_POST['name']) ? $_POST['name'] : '') ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat <span class="text-danger">*</span></td>
                                            <td><textarea placeholder="Malang Raya" class="form-control" name="address" autocomplete="off"><?= (isset($_POST['address']) ? $_POST['address'] : '') ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Telepon <span class="text-danger">*</span></td>
                                            <td><input type="number" placeholder="6282257181273" class="form-control" name="phone_number" autocomplete="off" value="<?= (isset($_POST['phone_number']) ? $_POST['phone_number'] : '') ?>"></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: right;">
                                    <button class="btn btn-primary btn-md" name="submit" type="submit">Tambah Data</button>
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
    $supplier->save();
}
?>