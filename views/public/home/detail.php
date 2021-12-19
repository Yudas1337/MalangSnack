<?php
    require_once __DIR__ . "/../../layouts/main/navbar.php";
    require_once __DIR__ . "/../../../controllers/ProductController.php";
    $main = new ProductController();

    $id = $_GET['id'];
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
                                    <img class="img-fluid" src="<?= $uriHelper->baseUrl('assets/images/product/' . $product['thumbnail']) ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <!--Tab slider End-->
                        <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                            <div class="product-detail-content">
                                <!--Product details-->
                                <div class="new-arrival-content pr">
                                    <h2><?= $product['name'] ?></h2>
                                    <div class="d-table mb-2 mt-5">
                                        <p class="price float-start d-block">Rp<?= number_format($product['price']) ?></p>
                                    </div>
                                    <p>Stock: <span class="item"> <?= $product['stock'] ?> </span>
                                    </p>
                                    <p>Product code: <span class="item">0405689</span> </p>
                                    <p>Brand: <span class="item"><?= $product['merk'] ?></span></p>
                                    <p class="text-content"><?= $product['description'] ?></p>
                                    <div class="d-flex align-items-end flex-wrap mt-4">
                                        <!--Quantity start-->
                                        <div class="col-2 px-0  mb-2 me-3 mr-3">
                                            <input type="number" name="num" class="form-control input-btn input-number" value="1">
                                        </div>
                                        <!--Quanatity End-->
                                        <div class="shopping-cart  mb-2 me-3">
                                            <a class="btn btn-primary" href="javascript:void();"><i
                                                    class="fa fa-shopping-basket me-2"></i>Add
                                                to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- review -->
        <div class="modal fade" id="reviewModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="text-center mb-4">
                                <img class="img-fluid rounded" width="78" src="./images/avatar/1.jpg" alt="DexignZone">
                            </div>
                            <div class="mb-3">
                                <div class="rating-widget mb-4 text-center">
                                    <!-- Rating Stars Box -->
                                    <div class="rating-stars">
                                        <ul id="stars">
                                            <li class="star" title="Poor" data-value="1">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="Fair" data-value="2">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="Good" data-value="3">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="Excellent" data-value="4">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                            <li class="star" title="WOW!!!" data-value="5">
                                                <i class="fa fa-star fa-fw"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" placeholder="Comment" rows="5"></textarea>
                            </div>
                            <button class="btn btn-success btn-block">RATE</button>
                        </form>
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
?>