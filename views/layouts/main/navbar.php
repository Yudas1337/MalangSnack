<?php
require_once __DIR__ . "/../../layouts/main/preload.php";
?>
<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper" class="overflow-unset">


	<header class="site-header mo-left header style-1">
		<!-- Main Header -->
		<div class="sticky-header main-bar-wraper navbar-expand-lg">
			<div class="main-bar clearfix ">
				<div class="container-fluid clearfix">
					<!-- Website Logo -->
					<div class="logo-header mostion logo-dark">
						<a href="<?= $uriHelper->baseUrl("index.php?page=main&content=home") ?>"><img width="200" src="<?= $uriHelper->baseUrl('assets/images/logo_text.png') ?>"></a>
					</div>
					<!-- Nav Toggle Button -->
					<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- Extra Nav -->
					<div class="extra-nav">
						<div class="extra-cell">
							<!-- <a href="javascript:void();" class="profile-box">
									<div class="header-info">
										<span>Robertos Jr.</span>
									</div>
									<div class="img-bx">
										<img src="<?= $uriHelper->baseUrl('assets/images/profile/default.png') ?>" alt="">
									</div>
								</a> -->
							<a href="<?= $uriHelper->baseUrl('index.php?page=login') ?>" class="btn btn-success mr-2">Masuk</a>
							<a href="<?= $uriHelper->baseUrl('index.php?page=register') ?>" class="btn btn-outline-success">Daftar</a>
						</div>
					</div>

					<div class="header-nav navbar-collapse collapse" id="navbarNavDropdown">
						<ul class="nav navbar-nav navbar navbar-left" style="justify-content: center">
							<li class="<?= (isset($_GET['content']) && $_GET['content'] == 'home' ? 'active' : '') ?>"><a href="<?= $uriHelper->baseUrl("index.php?page=main&content=home") ?>">
									Home</a></li>
							<li class="<?= (isset($_GET['content']) && $_GET['content'] == 'product' ? 'active' : '') ?>"><a href="<?= $uriHelper->baseUrl("index.php?page=main&content=product") ?>">
									Product</a></li>
							<li class="<?= (isset($_GET['content']) && $_GET['content'] == 'about' ? 'active' : '') ?>"><a href="<?= $uriHelper->baseUrl("index.php?page=main&content=about") ?>">
									About</a></li>
							<li class="<?= (isset($_GET['content']) && $_GET['content'] == 'contact' ? 'active' : '') ?>"><a href="<?= $uriHelper->baseUrl("index.php?page=main&content=contact") ?>">
									Contact</a></li>
							<li class="<?= (isset($_GET['content']) && $_GET['content'] == 'cart' ? 'active' : '') ?>"><a href="<?= $uriHelper->baseUrl("index.php?page=main&content=cart") ?>">
									Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Main Header End -->
	</header>