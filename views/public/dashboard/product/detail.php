<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../controllers/ProductController.php";
require_once __DIR__ . "/../../../../controllers/CategoryController.php";
require_once __DIR__ . "/../../../../controllers/SupplierController.php";

if (isset($_GET['id'])) {
    $product = new ProductController();
    $id = trim(abs($_GET['id']));
    $data = $product->getById($id);

    $category = new CategoryController();
    $category_id = trim(abs($data['category_id']));
    $category_data = $category->getById($category_id);

    $supplier = new SupplierController();
    $supplier_id = trim(abs($data['supplier_id']));
    $supplier_data = $supplier->getById($supplier_id);
}

?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="first">
                                        <img class="img-fluid" src="<?= $uriHelper->assetUrl('images/product/' . $data['thumbnail']) ?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <!--Tab slider End-->
                            <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                <div class="product-detail-content">
                                    <!--Product details-->
                                    <div class="new-arrival-content pr">
                                        <h4><?= $data['name'] ?></h4>
                                        <div class="d-table mb-2">
                                            <p class="price float-start d-block"><?= formHelper::rupiah($data['price']) ?></p>
                                        </div>
                                        <p>Jumlah Stok: <span class="item">
                                                <?php if (isset($data['stock']) && $data['stock'] > 0) : ?>
                                                    <span class="badge badge-success light"><i class="fa fa-shopping-basket"></i> <?= $data['stock'] ?> Buah</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger light">Stok Habis</span>
                                                <?php endif; ?>
                                            </span>
                                        </p>
                                        <p>Product code: <span class="item"><?= $data['product_id'] ?></span> </p>
                                        <p>Brand: <span class="text-danger"><?= $data['merk'] ?></span></p>
                                        <p>Product Category:
                                            <span class="ml-2 badge badge-success light"><?= $category_data['name'] ?></span>
                                        </p>
                                        <p class="text-content"><?= $data['description'] ?></p>
                                        <p class="text-content text-danger">Supplier : <?= $supplier_data['name'] ?></span> </p>
                                        <div class="d-flex align-items-end flex-wrap mt-4">

                                            <!--Quanatity End-->
                                            <div class="shopping-cart  mb-2 me-3">
                                                <a class="btn btn-warning light" href="<?= $uriHelper->baseUrl('index.php?page=dashboard&content=product&menu=edit&id=' . $data['id']) ?>"><i class="fa fa-edit me-2"></i>
                                                    Edit Product</a>
                                                <a class="hapusProduk btn btn-danger light" href="<?= $uriHelper->baseUrl('index.php?page=dashboard&content=product&menu=delete&id=' . $data['id']) ?>"><i class="fa fa-trash me-2"></i>
                                                    Delete Product</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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