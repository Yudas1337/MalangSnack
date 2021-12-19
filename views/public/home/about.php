<?php
require_once __DIR__ . "/../../layouts/main/navbar.php";
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-wrapper">

    <div class="container-fluid">

        <div class="form-head dashboard-head d-md-flex d-block mb-5 align-items-start">
            <h2 class="dashboard-title">Tentang Kami</h2>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <img src="<?= $uriHelper->assetUrl('images/logo_1.png') ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-black main-title mb-3">Malang Snack</h2>
                        <p class="text-black mb-5">
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text,
                        </p>
                        <h2 class="text-black main-title mb-3">Kontak Kami</h2>
                        <p class="text-black mb-4">
                            <i class="fa fa-envelope"></i> malangsnack@gmail.com
                        </p>
                        <p class="text-black mb-4">
                            <i class="fa fa-phone"></i> +62 822 5718 1297
                        </p>
                        <p class="text-black mb-4">
                            <i class="fa fa-home"></i> Jl. Welirang No 74. Kepanjen, Kabupaten Malang
                        </p>
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