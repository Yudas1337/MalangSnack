<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../controllers/ProductController.php";
require_once __DIR__ . "/../../../../controllers/CategoryController.php";
require_once __DIR__ . "/../../../../controllers/SupplierController.php";

if (isset($_GET['id'])) {
    $id = trim(abs($_GET['id']));
    $product = new ProductController();
    $data = $product->getById($id);
    $category = new CategoryController();
    $supplier = new SupplierController();
}

?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-12 col-md-9">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Detail Produk</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3 pb-3">
                                        <label class="font-w600">Kode Produk <span class="text-danger">*</span></label>
                                        <input type="text" autocomplete="off" autofocus name="product_id" class="form-control solid" placeholder="K3345B21" value="<?= $data['product_id']; ?>">
                                    </div>
                                    <div class="form-group mb-3 pb-3">
                                        <label class="font-w600">Nama Produk <span class="text-danger">*</span></label>
                                        <input autocomplete="off" type="text" class="form-control solid" placeholder="Keripik Kentang" name="name" value="<?= $data['name'] ?>">
                                    </div>
                                    <div class="form-group mb-3 pb-3">
                                        <label class="font-w600">Kategori Produk <span class="text-danger">*</span></label>
                                        <select required name="category_id" id="category-select" class="form-control" aria-hidden="true">
                                            <?php foreach ($category->getAll() as $list) : ?>
                                                <option value="<?= $list->id ?>" <?= ($list->id == $data['category_id'] ? 'selected' : '') ?>><?= $list->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3 pb-3">
                                        <label class="font-w600">Deskripsi Produk <span class="text-danger">*</span></label>
                                        <textarea placeholder="keripik kentang dengan bumbu..." autocomplete="off" name="description" rows="5" class="form-control solid"><?= $data['description'] ?></textarea>
                                    </div>
                                    <div class="form-group mb-3 pb-3">
                                        <img width="300" height="300" src="<?= $uriHelper->assetUrl('images/product/' . $data['thumbnail']) ?>" alt="<?= $data['name'] ?>" />
                                    </div>
                                    <div class="form-group mb-3 pb-3">
                                        <label class="font-w600">Foto Produk <span class="text-danger">*</span></label>
                                        <input type="file" name="thumbnail" class="form-control solid" accept="image/*"></input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-6">
                            <div class="card h-auto">
                                <div class="card-header">
                                    <h4 class="card-title">Detail Supplier</h4>
                                </div>
                                <div class="card-body">
                                    <div class="loadmore-content" id="uploadItemContent">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group mb-3 pb-3">
                                                    <label class="font-w600">Supplier <span class="text-danger">*</span></label>
                                                    <select required name="supplier_id" id="supplier-select" class="form-control" aria-hidden="true">
                                                        <?php foreach ($supplier->getAll() as $list) : ?>
                                                            <option value="<?= $list->id ?>" <?= ($data['supplier_id'] == $list->id ? 'selected' : '') ?>><?= $list->name ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="form-group mb-3 pb-3">
                                                    <label class="font-w600">Merk Produk <span class=text-danger>*</span></label>
                                                    <input autocomplete="off" name="merk" type="text" class="form-control solid" placeholder="Keripik kentang enak poll" value="<?= $data['merk'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card h-auto">
                                <div class="card-header">
                                    <h4 class="card-title">Harga & Stok Produk</h4>
                                </div>
                                <div class="card-body">
                                    <div class="loadmore-content" id="uploadItemContent">
                                        <div class="row">
                                            <div class="col-xl-7">
                                                <div class="form-group mb-3 pb-3">
                                                    <label class="font-w600">Harga Produk <span class=text-danger>*</span></label>
                                                    <input name="price" type="number" value="<?= $data['price'] ?>" class="form-control solid" placeholder="10000">
                                                </div>
                                            </div>
                                            <div class="col-xl-5">
                                                <div class="form-group mb-3 pb-3">
                                                    <label class="font-w600">Stok Produk <span class=text-danger>*</span></label>
                                                    <input type="number" name="stock" value="<?= $data['stock'] ?>" class="form-control solid" placeholder="22">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-warning light btn-block rounded">Update Produk</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </form>
</div>
</div>

<?php
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";

if (isset($_POST['submit'])) {
    $product = new ProductController();
    $product->update($id);
}
?>