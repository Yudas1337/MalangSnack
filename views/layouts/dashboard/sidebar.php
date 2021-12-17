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
                    <li class="<?= (isset($_GET['content']) && $_GET['content'] == "product" ? "mm-active" : "") ?>"><a class="<?= (isset($_GET['content']) && $_GET['content'] == "product" ? "mm-active" : "") ?>" href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=product&menu=list") ?>">List Produk</a></li>
                    <li class="<?= (isset($_GET['content']) && $_GET['content'] == "category" ? "mm-active" : "") ?>"><a class="<?= (isset($_GET['content']) && $_GET['content'] == "category" ? "mm-active" : "") ?>" href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=category&menu=list") ?>">Kategori</a></li>
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
            <li class="<?= (isset($_GET['content']) && $_GET['content'] == "supplier" ? "mm-active" : "") ?>">
                <a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=supplier&menu=list") ?>" class="ai-icon <?= (isset($_GET['content']) && $_GET['content'] == "supplier" ? "mm-active" : "") ?>" aria-expanded="false">
                    <i class="flaticon-381-user-2"></i>
                    <span class="nav-text">Supplier</span>
                </a>
            </li>
            <li class="<?= (isset($_GET['content']) && $_GET['content'] == "customer" ? "mm-active" : "") ?>"><a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=customer&menu=list") ?>" class="ai-icon <?= (isset($_GET['content']) && $_GET['content'] == "customer" ? "mm-active" : "") ?>" aria-expanded="false">
                    <i class="flaticon-381-user-8"></i>
                    <span class="nav-text">Pelanggan</span>
                </a>
            </li>

        </ul>

    </div>
</div>
<!--**********************************
        Sidebar end
    ***********************************-->