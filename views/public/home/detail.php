<?php
require_once __DIR__ . "/../../layouts/main/navbar.php";
require_once __DIR__ . "/../../../controllers/ProductController.php";
require_once __DIR__ . "/../../../controllers/CartController.php";
$main = new ProductController();

$id = trim(abs($_GET['id']));
$product = $main->getById($id);
?>

<!--**********************************
Content body start
***********************************-->
<div class="content-body" style="margin-left: 0">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Product</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)"><?= $product['name'] ?></a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="first">
                                        <img class="img-fluid" src="<?= $uriHelper->baseUrl('assets/images/product/' . $product['thumbnail']) ?>">
                                    </div>
                                </div>
                            </div>
                            <!--Tab slider End-->
                            <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                <div class="product-detail-content">
                                    <!--Product details-->
                                    <div class="new-arrival-content pr">
                                        <form method="POST">
                                            <h2><?= $product['name'] ?> <span class="badge badge-warning light"><?= $product['merk'] ?></span> </h2>
                                            <p>Stok tersisa: <?= ($product['stock'] == 0  ? '<span class = "badge badge-danger light">Stok Habis</span>' : '<span class = "badge badge-success light">Tersisa ' . $product['stock'] . "</span>") ?>
                                            </p>
                                            <div class="d-table mb-2 mt-4">
                                                <p class="price float-start d-block"><?= formHelper::rupiah($product['price']) ?></p>
                                            </div>
                                            <p class="text-content"><?= $product['description'] ?></p>
                                            <div class="d-flex align-items-end flex-wrap mt-4">
                                                <!--Quantity start-->
                                                <div class="col-2 px-0  mb-2 me-3 mr-3">
                                                    <input type="number" name="qty" class="form-control input-btn input-number" value="1">
                                                </div>
                                                <!--Quanatity End-->
                                                <div class="shopping-cart  mb-2 me-3">
                                                    <button type="submit" name="submit" class="btn btn-success light"><i class="fa fa-shopping-basket me-2"></i> Tambahkan ke keranjang</button>
                                                </div>
                                            </div>
                                        </form>
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
<!--**********************************
Content body end
***********************************-->
<?php
require_once __DIR__ . "/../../layouts/main/footer.php";

if (isset($_POST['submit'])) {
    $cart = new CartController();
    $cart->add($id);
}
?>