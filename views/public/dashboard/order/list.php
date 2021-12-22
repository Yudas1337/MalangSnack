<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../controllers/OrderController.php";
if (isset($_GET['filter'])) {
    $order = new OrderController();

    if ($_GET['filter'] == 'all') {
        $data = $order->getAll();
    } else {
        $filter = trim($_GET['filter']);
        $data = $order->getByFilter($filter);
    }
}
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row" id="masonry">
            <div class="col-xl-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Filter</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="POST">
                                    <select onchange="filterPaid()" class="form-control" id="filter">
                                        <option value="all" <?= (isset($_GET['filter']) && $_GET['filter'] == 'all' ? 'selected' : '') ?>>All</option>
                                        <option value="PENDING" <?= (isset($_GET['filter']) && $_GET['filter'] == 'PENDING' ? 'selected' : '') ?>>PENDING</option>
                                        <option value="PROGRESS" <?= (isset($_GET['filter']) && $_GET['filter'] == 'PROGRESS' ? 'selected' : '') ?>>PROGRESS</option>
                                        <option value="FAILED" <?= (isset($_GET['filter']) && $_GET['filter'] == 'FAILED' ? 'selected' : '') ?>>FAILED</option>
                                        <option value="PAID" <?= (isset($_GET['filter']) && $_GET['filter'] == 'PAID' ? 'selected' : '') ?>>PAID</option>
                                    </select>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <?php foreach ($data as $list) :
                $status = $list->status_paid;
                if ($status == 'PENDING') {
                    $color = 'bg-warning';
                } elseif ($status == 'PAID') {
                    $color = 'bg-success';
                } elseif ($status == 'FAILED') {
                    $color = 'bg-danger';
                } elseif ($status == 'PROGRESS') {
                    $color = 'bg-secondary';
                }
                $items = $order->getOrderDetails($list->invoice_id); ?>
                <div class="col-xl-4 col-lg-6 col-sm-6">
                    <a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=order&menu=detail&invoice_id=" . $list->invoice_id) ?>">
                        <div class="card-container">
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
                </div>


            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";
?>

<script>
    const filterPaid = () => {
        const filter = $('#filter').val();
        window.location.href = 'index.php?page=dashboard&content=order&menu=list&filter=' + filter
    }
</script>