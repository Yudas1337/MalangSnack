<?php
require_once __DIR__ . "/../../layouts/main/navbar.php";
require_once __DIR__ . "/../../../controllers/ProductController.php";
require_once __DIR__ . "/../../../controllers/CategoryController.php";
$main = new ProductController();
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-wrapper">
    <div class="listcontent-area" style="padding: 60px">
		
        <div class="row">
            <div class="col-md-12" style="height: 60vh">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="position:static">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" style="position:static; height: 60vh" >
                        <div class="carousel-item active" style="position:static">
                            <img src="<?= $uriHelper->assetUrl('images/product/1639761286kripik_balado.jpg') ?>" class="d-block w-100"  alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item" style="position:static">
                        <img src="<?= $uriHelper->assetUrl('images/product/1639761286kripik_balado.jpg') ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                        </div>
                        <div class="carousel-item" style="position:static">
                        <img src="<?= $uriHelper->assetUrl('images/product/1639761286kripik_balado.jpg') ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <h3 class="title mb-4">Produk Terlaris</h3>
            </div>

            <div class="col-md-12">
                <div class="row">
					<?php foreach ($main->getAll() as $product) : ?>
						<div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
							<div class="card item-card">
								<div class="card-body p-0">
									<img src="<?= $uriHelper->baseUrl('assets/images/product/' . $product->thumbnail) ?>" class="img-fluid" alt="">
									<div class="info">
										<h5 class="name"><?= $product->name ?></h5>
										<h6 class="mb-0 price"><img src="images/veg.png" alt=""><?= formHelper::rupiah($product->price) ?></h6>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
            </div>

            <div class="col-md-12 mt-5">
                <h3 class="title mb-4">Produk Terbaru</h3>
            </div>

            <div class="col-md-12">
                <div class="row">
					<?php foreach ($main->getAll() as $product) : ?>
						<div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
							<div class="card item-card">
								<div class="card-body p-0">
									<img src="<?= $uriHelper->baseUrl('assets/images/product/' . $product->thumbnail) ?>" class="img-fluid" alt="">
									<div class="info">
										<h5 class="name"><?= $product->name ?></h5>
										<h6 class="mb-0 price"><img src="images/veg.png" alt=""><?= formHelper::rupiah($product->price) ?></h6>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
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