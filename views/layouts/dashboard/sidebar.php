<?php
require_once __DIR__ . "/../../layouts/dashboard/preload.php";
require_once __DIR__ . "/../../layouts/dashboard/navbar.php";
?>

<!--**********************************
        Sidebar start
    ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">

        <ul class="metismenu" id="menu">
            <li><a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=main") ?>" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon active" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-book"></i>
                    <span class="nav-text">Produk</span>
                </a>
                <ul aria-expanded="true">
                    <li><a href="index.html" class="mm-active">List Produk</a></li>
                    <li><a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=category&menu=list") ?>">Kategori</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-bookmark-1"></i>
                    <span class="nav-text">Order</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="index.html">All Orders</a></li>
                    <li><a href="index.html">Completed</a></li>
                    <li><a href="page-analytics.html">Pending</a></li>
                    <li><a href="page-order.html">On Process</a></li>
                    <li><a href="page-review.html">On Delivery</a></li>
                </ul>
            </li>
            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-user-2"></i>
                    <span class="nav-text">Supplier</span>
                </a>
            </li>
            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-user-8"></i>
                    <span class="nav-text">Pelanggan</span>
                </a>
            </li>
            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Widget</span>
                </a>
            </li>


        </ul>

    </div>
</div>
<!--**********************************
        Sidebar end
    ***********************************-->