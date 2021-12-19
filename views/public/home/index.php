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
    <div class="listcontent-area">
        <div class="owl-carousel item-carousel">
            <?php foreach ($getCategory->getAll() as $category) : ?>
                <div class="items">
                    <div class="card text-left">
                        <img class="card-img-top" src="holder.js/100px180/" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Title</h4>
                            <p class="card-text">Body</p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-12">

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