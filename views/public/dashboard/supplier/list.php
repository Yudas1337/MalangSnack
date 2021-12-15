<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../controllers/SupplierController.php";
$supplier = new SupplierController();
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
                        <h4 class="card-title">List Supplier</h4>
                        <a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=supplier&menu=add") ?>" class="btn btn-primary btn-md"><i class="fa fa-plus-circle"></i> Tambah Supplier</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($supplier->getAll() as $list) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $list->name; ?></td>
                                            <td><?= $list->address ?></td>
                                            <td><?= $list->phone_number ?></td>
                                            <td>
                                                <a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=supplier&menu=edit&id=" . $list->id) ?>" class="badge badge-warning"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=supplier&menu=delete&id=" . $list->id) ?>" class="badge badge-danger hapus"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";
?>