<?php
require_once __DIR__ . "/../../../layouts/main/navbar.php";
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-wrapper">

    <div class="container-fluid">

        <div class="form-head dashboard-head d-md-flex d-block mb-5 align-items-start">
            <h2 class="dashboard-title">Pembayaran dengan MANDIRI</h2>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <img src="<?= $uriHelper->assetUrl('images/payments/mandiri.png') ?>" class="img-fluid" alt="">
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a id="atm" href="#atm" data-bs-toggle="tab" class="nav-link">ATM</a>
                                    </li>
                                    <li class="nav-item"><a id="ibanking" href="#ibanking" data-bs-toggle="tab" class="nav-link">IBANKING</a>
                                    </li>
                                    <li class="nav-item"><a id="mbanking" href="#mbanking" data-bs-toggle="tab" class="nav-link">MBANKING</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tabAtm" class="tab-pane fade active show">
                                        <div class="my-post-content pt-3">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p>Langkah - Langkah Pembayaran Melalui ATM :
                                                    </p>
                                                    <p>1. Pergi ke ATM terdekat
                                                    </p>
                                                    <p>2. Masukkan Nomor Rekening <span class="text-primary">1230837421</span> , lalu tekan 'BENAR'
                                                    </p>
                                                    <p>3. Masukkan nominal yang ingin di transfer, lalu tekan `BENAR`
                                                    </p>
                                                    <p>4. Informasi pelanggan akan ditampilkan, pilih nomor 1 sesuai dengan nominal pembayaran kemudian tekan `YA`
                                                    </p>
                                                    <p>5. Konfirmasi pembayaran akan muncul, tekan `YES`, untuk melanjutkan
                                                    </p>
                                                    <p>6. Simpan bukti transfer anda, dan upload pada menu tagihan di dashboard akun anda
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tabIbanking" class="tab-pane fade">
                                        <div class="my-post-content pt-3">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p>
                                                        Langkah - Langkah Pembayaran Melalui IBanking : </p>
                                                    <p>
                                                        1. Masuk ke IBanking
                                                    </p>
                                                    <p>2. Masukkan Nomor Rekening <span class="text-primary">1230837421</span> , lalu tekan 'BENAR'
                                                    </p>
                                                    <p>3. Lalu pilih Lanjut
                                                    </p>
                                                    <p>4. Apabila semua detail benar tekan `KONFIRMASI`
                                                    </p>
                                                    <p>5. Masukkan PIN / Challenge Code Token</p>
                                                    <p>6. Simpan bukti transfer anda, dan upload pada menu tagihan di dashboard akun anda
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tabMbanking" class="tab-pane fade">
                                        <div class="my-post-content pt-3">
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <p>Langkah - Langkah Pembayaran Melalui m-Banking :
                                                    </p>
                                                    <p>1. Masuk ke M-banking
                                                    </p>
                                                    <p>2. Masukkan Nomor Rekening <span class="text-primary">1230837421</span> , lalu tekan 'BENAR'
                                                    </p>
                                                    <p>3. Tekan Lanjut
                                                    </p>
                                                    <p>4. Tinjau dan konfirmasi detail transaksi anda, lalu tekan Konfirmasi
                                                    </p>
                                                    <p>5. Selesaikan transaksi dengan memasukkan MPIN anda
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