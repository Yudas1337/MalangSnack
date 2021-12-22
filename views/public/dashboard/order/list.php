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
            <div class="card-container" style="position: absolute; left: 0px; top: 0px;">
                <div class="card shadow-sm">
                    <div class="card-header bg-danger text-white">
                        <div>
                            <h4 class="text-white">Dine-in</h4>
                            <span class="fs-12 op9">AB00121</span>
                        </div>
                        <h3 class="text-white">08:49</h3>
                    </div>
                    <div class="card-body">
                        <ul class="order-list">
                            <li><del><span>1</span>Momos masala</del></li>
                            <li><del><span>1</span>Bubble and squeak</del></li>
                            <li><del><span>1</span>Pease pudding</del></li>
                            <li><span>1</span>Sunday roast</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";
?>