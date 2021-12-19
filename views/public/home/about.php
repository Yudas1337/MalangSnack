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
                            Malang Snack adalah sebuah toko oleh-oleh khas malang yang menjual berbagai macam bentuk seperti keripik, buah dan juga brownies yang berlokasi di Jl. Kembang Turi No.4a Jatimulyo Kec. Lowokwaru Kota Malang
                        </p>
                        <h2 class="text-black main-title mb-3">Kontak Kami</h2>
                        <p class="text-black mb-4">
                            <i class="fa fa-envelope"></i> malangsnack@gmail.com
                        </p>
                        <p class="text-black mb-4">
                            <i class="fa fa-phone"></i> +62 822 5718 1297
                        </p>
                        <p class="text-black mb-4">
                            <i class="fa fa-home"></i> Jl. Kembang Turi No.4a Jatimulyo Kec. Lowokwaru Kota Malang
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