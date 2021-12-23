<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../controllers/InvoiceController.php";
$invoice = new InvoiceController();

$idInvoice = trim($_GET['id']);
$inv = $invoice->getById($idInvoice);
$detail = $invoice->getDetailOrder($idInvoice);

$status = $inv->status_paid;
if ($status == 'PENDING') {
    $color = 'badge badge-warning';
} elseif ($status == 'PAID') {
    $color = 'badge badge-success';
} elseif ($status == 'FAILED') {
    $color = 'badge badge-danger';
} elseif ($status == 'PROGRESS') {
    $color = 'badge badge-secondary';
}

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
                        Detail Tagihan : <?= $inv->invoice_id ?>
                        <span class="float-right <?= $color ?>">
                            <strong>Status:</strong> <?= $inv->status_paid ?></span>
                    </div>
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
                                <div><strong id="name_last"><?= $inv->name ?></strong> </div>
                                <div id="address_last"><?= $inv->address ?></div>
                                <div id="email_last"><?= $inv->email ?></div>
                                <div id="phone_last"><?= $inv->phone_number ?></div>
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
                        <div class="row mb-5">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                <h6>Keterangan:</h6>
                                <div>Metode Pembayaran: <strong><?= $inv->payment_method ?></strong> </div>
                                <div>Ekspedisi: <strong><?= $inv->delivery ?></strong></div>
                                <div class="mt-3"><a target="_blank" class="text-primary" href="<?= $uriHelper->baseUrl('index.php?page=main&content=payment&filter=' . $inv->payment_method) ?>">Lihat cara pembayaran</a></div>
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
                            <?php if ($inv->status_paid == "PENDING") : ?>
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                                        Upload Bukti Pembayaran
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";
if (isset($_POST['upload'])) {
    $invoice->uploadTransfer($idInvoice);
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload bukti pembayaran anda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="file" name="transfer_verify">
                        </div>
                        <div class="col-md-12 mt-3">
                            <span class="text-danger">Format file : JPG, PNG, JPEG</span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="upload" class="btn btn-primary btn-sm light">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>