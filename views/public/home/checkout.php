<?php
require_once __DIR__ . "/../../layouts/main/navbar.php";
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-wrapper">

    <div class="container-fluid">

        <div class="form-head dashboard-head d-md-flex d-block mb-5 align-items-start">
            <h2 class="dashboard-title">Checkout</h2>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <div id="smartwizard" class="form-wizard order-create sw sw-theme-default sw-justified">
                            <ul class="nav nav-wizard">
                                <li><a class="nav-link inactive active" href="#profile_section">
                                        <span>1</span>
                                    </a></li>
                                <li><a class="nav-link inactive done" href="#payment_method">
                                        <span>2</span>
                                    </a></li>
                                <li><a class="nav-link inactive done" href="#courier_method">
                                        <span>3</span>
                                    </a></li>
                                <li><a class="nav-link inactive done" href="#final_checkout">
                                        <span>4</span>
                                    </a></li>
                            </ul>
                            <div class="tab-content" style="height: 344px;">
                                <div id="profile_section" class="tab-pane" role="tabpanel" style="display: block;">
                                    <div class="row">
                                        <div class="col-lg-12 mb-5">
                                            <div class="form-group">
                                                <h3>Lengkapi data diri anda</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Nama lengkap <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" placeholder="Parsley" value="<?= $user['name'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Nomor Telepon <span class="text-danger">*</span></label>
                                                <input type="number" name="phone_number" class="form-control" placeholder="Parsley" value="<?= $user['phone_number'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Email <span class="text-danger">*</span></label>
                                                <input type="text" name="email" class="form-control" value="<?= $user['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <div class="form-group">
                                                <label class="text-label">Alamat <span class="text-danger">*</span></label>
                                                <textarea name="address" class="form-control"><?= $user['address'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="payment_method" class="tab-pane" role="tabpanel" style="display: none;">
                                    <div class="row">
                                        <div class="col-lg-12 mb-5">
                                            <div class="form-group">
                                                <h3>Pilih Metode Pembayaran</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <div class="accordion" id="accordionExample">
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                Transfer Bank
                                                            </button>
                                                        </h2>
                                                    </div>

                                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                        <div class="row" id="listPayments">
                                                            <div class="col-md-4 payment_channels" id="BCA">
                                                                <div class="card-body">
                                                                    <div class="card text-center active">
                                                                        <img class="card-img-top p-3" src="<?= $uriHelper->assetUrl("images/payments/bca.png") ?>">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">BCA</h4>
                                                                            <p class="card-text">Bank Central Asia</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 payment_channels" id="MANDIRI">
                                                                <div class="card-body">
                                                                    <div class="card text-center">
                                                                        <img class="card-img-top p-3" src="<?= $uriHelper->assetUrl("images/payments/mandiri.png") ?>">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">Mandiri</h4>
                                                                            <p class="card-text">Mandiri</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 payment_channels" id="BNI">
                                                                <div class="card-body">
                                                                    <div class="card text-center">
                                                                        <img class="card-img-top p-3" src="<?= $uriHelper->assetUrl("images/payments/bri.png") ?>">
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">BRI</h4>
                                                                            <p class="card-text">Bank Rakyat Indonesia</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingTwo">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                E-wallets
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            Some placeholder content for the second accordion panel. This panel is hidden by default.
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="wizard_Payment" class="tab-pane" role="tabpanel" style="display: none;">
                                </div>
                            </div>
                            <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: right;"><button class="btn btn-primary sw-btn-prev disabled" type="button">Previous</button><button class="btn btn-primary sw-btn-next" type="button">Next</button></div>
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

<script>
    $(document).ready(function() {
        // SmartWizard initialize
        $('#smartwizard').smartWizard();

        $('.payment_channels').click((e) => {

            let selected = $(this).attr('id');
            alert(selected);

        });
    });
</script>