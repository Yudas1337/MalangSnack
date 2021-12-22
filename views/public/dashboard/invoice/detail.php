<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../controllers/InvoiceController.php";
$invoice = new InvoiceController();

$idInvoice = trim($_GET['id']);
$inv = $invoice->getById($idInvoice);
$detail = $invoice->getDetailOrder($idInvoice);

?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Tagihan</h4>
                    </div>
                    <div class="card-body">
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
                                                    foreach ($detail as $cart) : ?>
                                                        <tr>
                                                            <td class="center"><?= $i; ?></td>
                                                            <td class="left strong"><?= $cart->product_id ?></td>
                                                            <td class="left"><?= $cart->name ?></td>
                                                            <td class="right"><?= formHelper::rupiah($cart->price)  ?></td>
                                                            <td class="center"><?= $cart->qty ?></td>
                                                            <td class="right"><?= formHelper::rupiah($cart->price * $cart->qty) ?></td>
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
                                                            <td class="right"><?= formHelper::rupiah($inv->amount) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="left"><strong>Biaya Kurir</strong></td>
                                                            <td class="right"><?= formHelper::rupiah($inv->delivery_cost) ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="left"><strong>Total Bayar</strong></td>
                                                            <td class="right"><strong><?= formHelper::rupiah($inv->total_amount) ?></strong>
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
            </div>

        </div>
    </div>
</div>

<?php
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";
?>