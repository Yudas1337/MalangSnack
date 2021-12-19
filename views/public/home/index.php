<?php
require_once __DIR__ . "/../../layouts/main/navbar.php";
require_once __DIR__ . "/../../../controllers/CategoryController.php";
$getCategory = new CategoryController();
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-wrapper">
    <!-- row -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="owl-carousel item-carousel">
                    <?php foreach ($getCategory->getAll() as $category) : ?>
                        <div class="items">
                            <div class="item-box">
                                <img src="<?= $uriHelper->baseUrl('assets/images/category/' . $category->icon) ?>" alt="">
                                <h5 class="title mb-0"><?= $category->name ?></h5>
                            </div>
                        </div>
                    <?php endforeach ?>
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