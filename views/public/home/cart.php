<?php
require_once __DIR__ . "/../../layouts/main/navbar.php";
require_once __DIR__ . "/../../../controllers/ProductController.php";
require_once __DIR__ . "/../../../controllers/CartController.php";
$product = new ProductController();
$total = 0;
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-wrapper">

    <div class="container-fluid">

        <div class="form-head dashboard-head d-md-flex d-block mb-5 align-items-start">
            <h2 class="dashboard-title">Keranjang Belanja</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if (isset($_SESSION['cart'])) : ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">
                                                NO
                                            </th>
                                            <th class="align-middle">Product ID</th>
                                            <th class="align-middle pe-7 text-center" colspan="2">Nama Produk</th>
                                            <th class="align-middle">Harga</th>
                                            <th class="align-middle">Jumlah Beli</th>
                                            <th class="align-middle">subTotal</th>
                                            <th class="align-middle">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orders">
                                        <?php $i = 1;
                                        foreach ($_SESSION['cart'] as $cart) :
                                            $data = $product->getById($cart['id']);
                                            $total += ($data['price'] * $cart['qty']) ?>
                                            <tr class="btn-reveal-trigger">
                                                <td>
                                                    <?= $i ?>
                                                </td>
                                                <td class="py-2"><?= $data['product_id']; ?></td>
                                                <td class="py-2"> <img width="100" height="100" src="<?= $uriHelper->assetUrl('images/product/' . $data['thumbnail']) ?>"></td>
                                                <td class="py-2">
                                                    <a href="<?= $uriHelper->baseUrl('index.php?page=main&content=detail&id=' . $data['id']) ?>">
                                                        <strong><?= $data['name']; ?> </strong> </a><br>
                                                    <?= $data['merk'] ?>

                                                </td>
                                                <td class="py-2"><?= formHelper::rupiah($data['price'])  ?></td>

                                                <form method="POST">
                                                    <td class="py-2">
                                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                                        <input type="number" class="form-control" name="qty" value="<?= $cart['qty'] ?>">
                                                    </td>
                                                    <td class="py-2 text-end">
                                                        <?= formHelper::rupiah($data['price'] * $cart['qty']) ?>
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="update" class="btn btn-sm btn-success light"><i class="fa fa-edit"></i> Update</button>

                                                        <button onclick="return confirm('Apa anda yakin ingin menghapus produk dari keranjang?')" type="submit" name="delete" class="btn btn-sm btn-danger light"><i class="fa fa-trash"></i> Delete</button>
                                                </form>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        endforeach; ?>
                                    <tfoot>
                                        <tr>
                                            <th class="align-middle"></th>
                                            <th class="align-middle">Total</th>
                                            <th class="align-middle pe-7 text-center" colspan="2"></th>
                                            <th class="align-middle"></th>
                                            <th class="align-middle"></th>
                                            <th class="align-middle pe-7 text-end"><?= formHelper::rupiah($total) ?></th>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                </table>

                            </div>
                            <form method="POST">
                                <button type="submit" name="deleteCart" onclick="return confirm('Apa anda yakin ingin mengosongkan keranjang?')" class="btn btn-danger btn-md light mt-5 kosongkanKeranjang"><i class="fa fa-trash"></i> Kosongkan keranjang</button>
                                <a data-user="<?= (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null) ?>" href="<?= $uriHelper->baseUrl('index.php?page=main&content=checkout#profile_section') ?>" class="btn btn-success btn-md light mt-5 checkout"><i class="fa fa-shopping-cart"></i> Checkout</a>
                            </form>

                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-md-12 mt-5">
                        <h3 class="title mb-4">Keranjang belanja masih kosong :( </h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

<?php
require_once __DIR__ . "/../../layouts/main/footer.php";
$cart = new CartController();
if (isset($_POST['update']) || isset($_POST['delete'])) {
    $id = intval(abs($_POST['id']));
    $qty = intval(abs($_POST['qty']));
    if (isset($_POST['update'])) {
        $cart->update($id, $qty);
    } else {
        $cart->delete($id);
    }
}
if (isset($_POST['deleteCart'])) {
    $cart->destroy();
}
?>

<script>
    $('.checkout').click(function(e) {

        e.preventDefault();
        const href = $(this).attr('href');
        const user_id = $(this).data('user');

        swal({
                title: "Apa Anda Yakin?",
                text: "selanjutnya akan mengarah ke halaman pembayaran",
                icon: "warning",
                buttons: {
                    confirm: 'YA',
                    cancel: 'Batal'
                },
                dangerMode: true,
            })
            .then((willCheckout) => {
                if (willCheckout) {
                    if (user_id == null || user_id == '') {
                        swal({
                            title: "Gagal",
                            text: "Anda harus login terlebih dahulu",
                            icon: "warning",
                            buttons: {
                                confirm: 'Login',
                            },
                            dangerMode: true,
                        }).then((redirect) => {
                            document.location.href = href;
                        })
                    } else {
                        document.location.href = href;
                    }
                }

            });
    });
</script>