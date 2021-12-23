<?php
require_once __DIR__ . "/../../../layouts/main/navbar.php";
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-wrapper">

    <div class="container-fluid">

        <div class="form-head dashboard-head d-md-flex d-block mb-5 align-items-start">
            <h2 class="dashboard-title">Pembayaran dengan OVO</h2>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <img src="<?= $uriHelper->assetUrl('images/payments/ovo.png') ?>" class="img-fluid" alt="">
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a id="atm" href="#atm" data-bs-toggle="tab" class="nav-link show active">Cara Pembayaran</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tabAtm" class="tab-pane fade active show">
                                        <div class="my-post-content pt-3">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p>Langkah - Langkah Pembayaran Melalui ATM :
                                                    </p>
                                                    <p>1. Buka Aplikasi OVO
                                                    </p>
                                                    <p>2. Masukkan Nomor Transfer <span class="text-primary">+62 822 5718 1297</span> , lalu tekan 'BENAR'
                                                    </p>
                                                    <p>3. Masukkan nominal yang ingin di transfer, lalu tekan `BENAR`
                                                    </p>
                                                    <p>4. Masukkan kode verifikasi
                                                    </p>
                                                    <p>5. Konfirmasi pembayaran akan muncul, tekan `YES`, untuk melanjutkan
                                                    </p>
                                                    <p>6. Simpan bukti transfer anda, dan upload pada menu tagihan di dashboard akun anda
                                                    </p>
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
</div>
<!--**********************************
            Content body end
        ***********************************-->

<?php
require_once __DIR__ . "/../../../layouts/main/footer.php";
?>

<script>
    $(document).ready(() => {

        const atm = $('#atm');
        const ibanking = $('#ibanking');
        const mbanking = $('#mbanking');

        const tabAtm = $('#tabAtm');
        const tabIbanking = $('#tabIbanking');
        const tabMbanking = $('#tabMbanking');

        atm.on('click', (e) => {
            e.preventDefault();
            tabIbanking.removeClass('show');
            tabIbanking.removeClass('active');

            tabMbanking.removeClass('show');
            tabMbanking.removeClass('active');

            tabAtm.addClass('show');
            tabAtm.addClass('active');
        });

        ibanking.on('click', (e) => {
            e.preventDefault();
            tabAtm.removeClass('show');
            tabAtm.removeClass('active');

            tabMbanking.removeClass('show');
            tabMbanking.removeClass('active');

            tabIbanking.addClass('show');
            tabIbanking.addClass('active');
        });

        mbanking.on('click', (e) => {
            e.preventDefault();
            tabAtm.removeClass('show');
            tabAtm.removeClass('active');
            tabIbanking.removeClass('show');
            tabIbanking.removeClass('active');

            tabMbanking.addClass('show');
            tabMbanking.addClass('active');
        });

    });
</script>