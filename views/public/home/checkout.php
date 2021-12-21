<?php
if (!isset($_SESSION['cart'])) {
    echo "Keranjang masih kosong. anda tidak bisa checkout";
    exit;
}
require_once __DIR__ . "/../../layouts/main/navbar.php";
require_once __DIR__ . "/../../../controllers/ProductController.php";

$product = new ProductController();
$total = 0;

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
                            <form method="POST" id="formSubmit">
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
                                                    <input autocomplete="off" type="text" id="nameChange" name="name" class="form-control" placeholder="Parsley" value="<?= $user['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Nomor Telepon <span class="text-danger">*</span></label>
                                                    <input autocomplete="off" type="number" id="phoneChange" name="phone_number" class="form-control" placeholder="Parsley" value="<?= $user['phone_number'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="text-label">Email <span class="text-danger">*</span></label>
                                                    <input autocomplete="off" type="text" id="emailChange" name="email" class="form-control" value="<?= $user['email'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="form-group">
                                                    <label class="text-label">Alamat <span class="text-danger">*</span></label>
                                                    <textarea autocomplete="off" id="addressChange" name="address" class="form-control"><?= $user['address'] ?></textarea>
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
                                                                    Metode Pembayaran yang tersedia
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="row" id="listPayments">
                                                                <div class="col-md-4 payment_channels" id="BCA">
                                                                    <div class="card-body">
                                                                        <div class="card text-center ">
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
                                                                <div class="col-md-4 payment_channels" id="BRI">
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
                                                                <div class="col-md-4 payment_channels" id="OVO">
                                                                    <div class="card-body">
                                                                        <div class="card text-center">
                                                                            <img height="50%" class="card-img-top p-3" src="<?= $uriHelper->assetUrl("images/payments/ovo.png") ?>">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">OVO</h4>
                                                                                <p class="card-text">E-wallets OVO</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 payment_channels" id="GOPAY">
                                                                    <div class="card-body">
                                                                        <div class="card text-center">
                                                                            <img class="card-img-top p-3" src="<?= $uriHelper->assetUrl("images/payments/gopay.png") ?>">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">GOPAY</h4>
                                                                                <p class="card-text">E-wallets GOPAY</p>
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
                                    <div id="courier_method" class="tab-pane" role="tabpanel" style="display: none;">
                                        <div class="row">
                                            <div class="col-lg-12 mb-5">
                                                <div class="form-group">
                                                    <h3>Pilih Jenis Pengiriman</h3>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Jenis Pengiriman yang tersedia
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="row" id="listCourier">
                                                                <div class="col-md-4 courier_channels" id="JNT">
                                                                    <div class="card-body">
                                                                        <div class="card text-center">
                                                                            <img height="50%" class="card-img-top p-3" src="<?= $uriHelper->assetUrl("images/couriers/jnt.png") ?>">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">JNT</h4>
                                                                                <p class="card-text">Kurir JNT</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 courier_channels" id="JNE">
                                                                    <div class="card-body">
                                                                        <div class="card text-center">
                                                                            <img class="card-img-top p-3" src="<?= $uriHelper->assetUrl("images/couriers/jne.png") ?>">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">JNE</h4>
                                                                                <p class="card-text">Kurir JNE</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 courier_channels" id="SICEPAT">
                                                                    <div class="card-body">
                                                                        <div class="card text-center">
                                                                            <img class="card-img-top p-3" src="<?= $uriHelper->assetUrl("images/couriers/sicepat.png") ?>">
                                                                            <div class="card-body">
                                                                                <h4 class="card-title">SICEPAT</h4>
                                                                                <p class="card-text">Kurir Si Cepat</p>
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
                                    <div id="final_checkout" class="tab-pane" role="tabpanel" style="display: none;">
                                        <div class="row">
                                            <div class="col-lg-12 mb-2">
                                                <div class="form-group">
                                                    <h3>Checkout</h3>
                                                    <p>Pastikan data yang anda isi dan pilih sudah benar</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header"> Tagihan <span class="float-right">
                                                            <strong>Status:</strong> Pending</span> </div>
                                                    <div class="card-body">
                                                        <div class="row mb-5">
                                                            <div class="mt-4 col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                                                <h6>From:</h6>
                                                                <div> <strong>Malang Snack</strong> </div>
                                                                <div>Jl. Kembang Turi No.4a Jatimulyo Kec. Lowokwaru Kota Malang</div>
                                                                <div>malangsnack@gmail.com</div>
                                                                <div>+62 822 5718 1297</div>
                                                            </div>
                                                            <div class="mt-4 col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                                                <h6>To:</h6>
                                                                <div><strong id="name_last">Bob Mart</strong> </div>
                                                                <div id="address_last">Attn: Daniel Marek</div>
                                                                <div id="email_last">43-190 Mikolow, Poland</div>
                                                                <div id="phone_last">Email: info@webz.com.pl</div>
                                                            </div>
                                                            <div class="mt-4 col-xl-6 col-lg-6 col-md-4 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                                                <div class="row align-items-center">
                                                                    <div class="col-sm-9">
                                                                        <div class="brand-logo mb-3">
                                                                            <img style="width: 100%;" class=" logo-compact" src="<?= $uriHelper->assetUrl('images/logo_text.png') ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="center">NO</th>
                                                                        <th>Produk ID</th>
                                                                        <th>Nama Produk</th>
                                                                        <th class="right">Harga</th>
                                                                        <th class="center">Jumlah Beli</th>
                                                                        <th class="right">Subtotal</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i = 1;
                                                                    foreach ($_SESSION['cart'] as $cart) :
                                                                        $data = $product->getById($cart['id']);
                                                                        $total += ($data['price'] * $cart['qty']) ?>
                                                                        <tr>
                                                                            <td class="center"><?= $i; ?></td>
                                                                            <td class="left strong"><?= $data['product_id'] ?></td>
                                                                            <td class="left"><?= $data['name'] ?></td>
                                                                            <td class="right"><?= formHelper::rupiah($data['price'])  ?></td>
                                                                            <td class="center"><?= $cart['qty'] ?></td>
                                                                            <td class="right"><?= formHelper::rupiah($data['price'] * $cart['qty']) ?></td>
                                                                        </tr>

                                                                    <?php $i++;
                                                                    endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-sm-5"></div>
                                                            <div class="col-lg-4 col-sm-5 ms-auto">
                                                                <table class="table table-clear">
                                                                    <tbody>

                                                                        <tr>
                                                                            <td class="left"><strong>Total</strong></td>
                                                                            <td class="right"><?= formHelper::rupiah($total) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="left"><strong>Biaya Kurir</strong></td>
                                                                            <td class="right"><?= formHelper::rupiah($total * 0.1) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="left"><strong>Total Bayar</strong></td>
                                                                            <td class="right"><strong><?= formHelper::rupiah($total + ($total * 0.1)) ?></strong>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 d-flex justify-content-center">
                                                <button class="btn btn-success light btn-block" style="width: 50%;" type="submit">Checkout</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: right;">
                                    <button class="btn btn-primary sw-btn-prev disabled" type="button">Previous</button>
                                    <button class="btn btn-primary sw-btn-next" type="button">Next</button>
                                </div>
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

<script>
    const swalAlert = (str) => {
        swal({
            title: "Gagal",
            text: str,
            icon: "error",
            buttons: {
                confirm: 'OK'
            },
            dangerMode: true,
        })
    }

    $(document).ready(function() {

        let payments = null;
        let couriers = null;

        let name = $('#nameChange').val()
        let phone = $('#phoneChange').val();
        let email = $('#emailChange').val();
        let address = $('#addressChange').val();

        $('#name_last').text(name);
        $('#phone_last').text(phone);
        $('#email_last').text(email);
        $('#address_last').text(address);

        // SmartWizard initialize
        $('#smartwizard').smartWizard();

        $('.payment_channels').on('click', function() {
            $('#listPayments').each(() => {
                $('.card').removeClass('active');
            })
            payments = $(this).attr('id');
            $(this).find('.card').addClass('active');

        })

        $('.courier_channels').on('click', function() {
            $('#listCourier').each(() => {
                $('.card').removeClass('active');
            })
            couriers = $(this).attr('id');
            $(this).find('.card').addClass('active');
        })

        $('#nameChange').on('keyup', (e) => {
            name = e.target.value;
            $('#name_last').text(name);
        })
        $('#phoneChange').on('keyup', (e) => {
            phone = e.target.value;
            $('#phone_last').text(phone);
        })
        $('#emailChange').on('keyup', (e) => {
            email = e.target.value;
            $('#email_last').text(email);
        })
        $('#addressChange').on('keyup', (e) => {
            address = e.target.value;
            $('#address_last').text(address);
        })

        $('#formSubmit').on('submit', (e) => {
            e.preventDefault();
            if (payments == null) {
                swalAlert("Anda belum memilih pembayaran");
            } else if (couriers == null) {
                swalAlert("Anda belum memilih jenis pengiriman");
            } else {
                $.ajax({
                    url: 'index.php?page=main&content=finalCheckout',
                    data: {
                        email: email,
                        name: name,
                        phone_number: phone,
                        address: address,
                        payment_method: payments,
                        delivery: couriers
                    },
                    method: 'post',
                    success: (data) => {
                        obj = JSON.parse(data);
                        swal({
                                title: "Berhasil checkout",
                                text: "anda akan diarahkan ke tagihan pembayaran",
                                icon: "success",
                                buttons: {
                                    confirm: 'YA',
                                }
                            })
                            .then((willCheckout) => {
                                if (willCheckout) {
                                    document.location.href = 'index.php?page=dashboard&content=invoice&id=' + obj.data.id;
                                }
                            });
                    },
                    error: (err) => {
                        console.log(err);
                    }
                });
            }


        })

    });
</script>