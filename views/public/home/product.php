<?php
require_once __DIR__ . "/../../layouts/main/navbar.php";
require_once __DIR__ . "/../../../controllers/ProductController.php";
require_once __DIR__ . "/../../../controllers/CategoryController.php";
$main = new ProductController();
$getCategory = new CategoryController();
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-4">
				<div class="card">
					<div class="card-body text-center">
						<img src="<?= $uriHelper->assetUrl('images/logo_delivery.png') ?>" class="img-fluid mb-5" width="50%">
						<h3 class="title mb-4">Pesanan anda akan ada di keranjang</h3>
						<p>Setelah anda klik tambahkan, produk akan tampil di dalam keranjang dan siap untuk checkout.</p>
						<a href="front-orders_status.html" class="btn btn-warning light btn-rounded">Check Keranjang</a>
					</div>
				</div>
			</div>
			<div class="col-xl-8">
				<div class="owl-carousel item-carousel">
					<?php foreach ($getCategory->getAll() as $category) : ?>
						<div class="items">
							<div class="item-box">
								<img src="<?= $uriHelper->baseUrl('assets/images/category/' . $category->icon) ?>" alt="">
								<h5 class="title mb-0"><?= $category->name ?></h5>
							</div>
						</div>
					<?php endforeach ?>
				</div>
				<div class="input-group search-area style-1 mb-4">
					<input type="text" class="form-control" placeholder="Search here...">
					<div class="input-group-append">
						<button class=" btn btn-success btn-rounded">Search</button>
					</div>
				</div>
				<div class="row">
					<?php foreach ($main->getAll() as $product) : ?>

						<div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
							<a href="#" id="productCard" data-id="<?= $product->id ?>" data-name="<?= $product->name ?>" data-toggle="modal" data-target="#productDetail" data-backdrop="static">
								<div class="card item-card">
									<div class="card-body p-0">
										<img src="<?= $uriHelper->assetUrl('images/product/' . $product->thumbnail) ?>" class="img-fluid" alt="">
										<div class="info">
											<h5 class="name"><?= $product->name ?></h5>
											<h6 class="mb-0 price"><?= formHelper::rupiah($product->price) ?></h6>
										</div>
									</div>
								</div>
							</a>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
	<!-- row -->

</div>
<!--**********************************
            Content body end
        ***********************************-->


<div class="modal fade" id="productDetail" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="productName">Glass Animals</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-lg-7">
					<img src="<?= $uriHelper->assetUrl('images/product/1639761286kripik_balado.jpg') ?>" alt="foto">
				</div>
				<div class="col-lg-5">
					<table>
						<tr>
							<td>ID Pembeli</td>
							<td>:</td>
							<td class="id_pembeli"></td>
						</tr>
						<tr>
							<td>Nama Pembeli</td>
							<td>:</td>
							<td class="nama_pembeli"></td>
						</tr>
						<tr>
							<td>Status Pembeli</td>
							<td>:</td>
							<td class="status_pembeli"></td>
						</tr>
						<tr>
							<td>Pesanan Pembeli</td>
							<td>:</td>
							<td class="pesanan_pembeli"></td>
						</tr>
						<tr>
							<td>Harga Makanan</td>
							<td>:</td>
							<td class="harga_makanan"></td>
						</tr>
						<tr>
							<td>Jumlah Beli Porsi</td>
							<td>:</td>
							<td class="jumlah_beli"></td>
						</tr>
						<tr>
							<td>Total Diskon</td>
							<td>:</td>
							<td class="discount"></td>
						</tr>
						<tr>
							<td>Total Bayar</td>
							<td>:</td>
							<td class="total_bayar"></td>
						</tr>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>

<?php
require_once __DIR__ . "/../../layouts/main/footer.php";
?>

<script>
	$(document).ready(() => {
		const name = $('#productCard').data('name');
		$('#productName').text(name);
	});
</script>