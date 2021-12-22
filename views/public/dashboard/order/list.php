<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../controllers/OrderController.php";
$order = new OrderController();
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row order-row" id="masonry" style="position: relative; height: 859.2px;">
            <?php foreach ($order->getAll() as $list) :
                $status = $list->status_paid;
                if ($status == 'PENDING') {
                    $color = 'bg-warning';
                } elseif ($status == 'PAID') {
                    $color = 'bg-success';
                } elseif ($status == 'FAILED') {
                    $color = 'bg-danger';
                } elseif ($status == 'PROGRESS') {
                    $color = 'bg-primary';
                }
                $items = $order->getOrderDetails($list->invoice_id); ?>
                <a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=order&menu=detail&invoice_id=" . $list->invoice_id) ?>">
                    <div class="card-container" style="position: absolute; left: 0px; top: 0px;">
                        <div class="card shadow-sm">
                            <div class="card-header <?= $color ?> text-white">
                                <div>
                                    <h4 class="text-white"><?= formHelper::rupiah($list->total_amount) ?></h4>
                                    <span class="fs-12 op9">Invoice ID : <?= $list->invoice_id ?></span>
                                    <br>
                                    <span class="fs-12 op9"><?= $list->created_at ?></span>

                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="order-list">
                                    <li>Pemesan: <span><?= $list->name ?></span></li>
                                    <?php foreach ($items as $item) : ?>
                                        <li><span><?= $item->qty ?></span><?= $item->name ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";
?>