<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../controllers/OrderController.php";

if (isset($_GET['invoice_id'])) {
    $order = new OrderController();
    $id = trim($_GET['invoice_id']);
    $data = $order->getById($id);

    $status = $data['status_paid'];
    if ($status == 'PENDING') {
        $color = 'badge badge-warning';
    } elseif ($status == 'PAID') {
        $color = 'badge badge-success';
    } elseif ($status == 'FAILED') {
        $color = 'badge badge-danger';
    } elseif ($status == 'PROGRESS') {
        $color = 'badge badge-secondary';
    }
}

?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"> Tagihan <span class="float-right <?= $color ?>">
                            <strong>Status:</strong> <?= $data['status_paid'] ?></span> </div>
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
                                <div><strong id="name_last"><?= $data['name'] ?></strong> </div>
                                <div id="address_last"><?= $data['address'] ?></div>
                                <div id="email_last"><?= $data['email'] ?></div>
                                <div id="phone_last"><?= $data['phone_number'] ?></div>
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
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <h6>Keterangan:</h6>
                                <div>Metode Pembayaran: <strong><?= $data['payment_method'] ?></strong> </div>
                                <div>Ekspedisi: <strong><?= $data['delivery'] ?></strong></div>
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
                                    foreach ($order->getOrderDetails($id) as $list) : ?>
                                        <tr>
                                            <td class="center"><?= $i ?></td>
                                            <td class="left strong"><?= $list->product_id ?></td>
                                            <td class="left"><?= $list->name ?></td>
                                            <td class="right"><?= formHelper::rupiah($list->price) ?></td>
                                            <td class="center"><?= $list->qty ?></td>
                                            <td class="right"><?= formHelper::rupiah($list->price * $list->qty) ?></td>
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
                                            <td class="right"><?= formHelper::rupiah($data['amount'])  ?></td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Biaya Kurir</strong></td>
                                            <td class="right"><?= formHelper::rupiah($data['delivery_cost'])  ?></td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Total Bayar</strong></td>
                                            <td class="right"><strong><?= formHelper::rupiah($data['total_amount']) ?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php if ($status == 'PROGRESS') : ?>
                        <div class="card-footer"> <a target="_blank" href="<?= $uriHelper->assetUrl('images/transfer/' . $data['transfer_verify']) ?>" class="btn btn-lg btn-primary light">Cek Bukti Pembayaran</a> <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                Verifikasi Tagihan
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";

if (isset($_POST['update'])) {
    $order->updateInvoice($id);
}

?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apa anda yakin?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="radio" name="status_paid" value="PAID"> Valid
                        </div>
                        <div class="col-md-6">
                            <input type="radio" name="status_paid" value="FAILED"> Tidak Valid
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="update" class="btn btn-primary btn-sm light">Update tagihan</button>
                </div>
            </div>
        </form>
    </div>
</div>