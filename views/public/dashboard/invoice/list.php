<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../controllers/InvoiceController.php";
$invoice = new InvoiceController();
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
                        <h4 class="card-title">List Tagihan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Total</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($invoice->getInvoice() as $inv): ?>
                                        <tr>
                                            <td><?= $inv->invoice_id ?></td>
                                            <td><?= $inv->total_amount ?></td>
                                            <td><?= $inv->created_at ?></td>
                                            <td>
                                                <?php
                                                    switch($inv->status_paid){
                                                        case 'PENDING':
                                                            echo '<span class="badge badge-warning">' . $inv->status_paid . '</span>';
                                                            break;
                                                        case 'PROGRESS':
                                                            echo '<span class="badge badge-primary">' . $inv->status_paid . '</span>';
                                                            break;
                                                        case 'FAILED':
                                                            echo '<span class="badge badge-danger">' . $inv->status_paid . '</span>';
                                                            break;
                                                        case 'SUCCESS':
                                                            echo '<span class="badge badge-success">' . $inv->status_paid . '</span>';
                                                            break;
                                                        default:
                                                            break;
                                                    }
                                                ?>
                                                
                                            </td>
                                            <td>
                                                <a href="<?= $uriHelper->baseUrl('index.php?page=dashboard&content=invoice&menu=detail&id='. $inv->invoice_id) ?>" class="btn btn-info light btn-sm">Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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