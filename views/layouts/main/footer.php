<div class="container-fluid" style="background-color: white;padding-left: 5rem;padding-top: 3rem;">
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <a href="<?= $uriHelper->baseUrl("index.php?page=main&content=home") ?>"><img width="200" src="<?= $uriHelper->baseUrl('assets/images/logo_text.png') ?>"></a>
                <p class="mt-3">Finema adalah suatu platform edukasi online khusus di bidang Financial Market, dimana siapa saja dapat belajar berbagai materi instrumen keuangan dari berbagai mentor-mentor terbaik di Indonesia</p>
            </div>
        </div>
        <div class="col-md-2 ml-3">
            <div class="row d-flex flex-column">
                <h4 class="title mb-4">Site Link</h4>
                <a href="<?= $uriHelper->baseUrl("index.php?page=main&content=home") ?>">Beranda</a>
                <a href="<?= $uriHelper->baseUrl("index.php?page=main&content=product") ?>">Produk</a>
                <a href="<?= $uriHelper->baseUrl("index.php?page=main&content=about") ?>">Tentang Kami</a>
                <a href="<?= $uriHelper->baseUrl("index.php?page=main&content=cart") ?>">Keranjang</a>
            </div>
        </div>
        <div class="col-md-2 ml-3">
            <div class="row d-flex flex-column">
                <h4 class="title mb-4">Malang Snack</h4>
                <a href="<?= $uriHelper->baseUrl('index.php?page=login') ?>">Masuk</a>
                <a href="<?= $uriHelper->baseUrl('index.php?page=register') ?>">Daftar</a>
            </div>
        </div>
        <div class="col-md-3 ml-3">
            <div class="row d-flex flex-column">
                <h4 class="title mb-4">Kontak</h4>
                <p>Jl. Welirang No 74. Kepanjen, Kabupaten Malang</p>

                <p>+62 822 5718 1297</p>
                <p>malangsnack@gmail.com</p>
            </div>
        </div>
    </div>
</div>	

</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="<?= $uriHelper->baseUrl('assets/vendor/global/global.min.js') ?>"></script>
<script src="<?= $uriHelper->baseUrl('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') ?>"></script>

<!-- Counter Up -->
<script src="<?= $uriHelper->baseUrl('assets/vendor/waypoints/jquery.waypoints.min.js') ?>"></script>
<script src="<?= $uriHelper->baseUrl('assets/vendor/jquery.counterup/jquery.counterup.min.js') ?>"></script>

<script src="<?= $uriHelper->baseUrl('assets/vendor/owl-carousel/owl.carousel.js') ?>"></script>
<script src="<?= $uriHelper->baseUrl('assets/vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') ?>"></script>

<script src="<?= $uriHelper->baseUrl('assets/js/custom.js') ?>"></script>
<script src="<?= $uriHelper->baseUrl('assets/js/deznav-init.js') ?>"></script>
<script>
	function ItemsCarousel() {

		/*  testimonial one function by = owl.carousel.js */
		jQuery('.item-carousel').owlCarousel({
			loop: false,
			margin: 10,
			nav: true,
			center: true,
			autoWidth: true,
			autoplay: true,
			dots: false,
			items: 4,
			navText: ['', ''],
			breackpoint: [


			]

		})
	}

	jQuery(document).ready(() => {
		ItemsCarousel();
	});

	function handleTabs() {
		$('#add-order-content,#place-order').css("display", "none");
		$('#add-order').on('click', function() {
			$('#add-order-content').css("display", "block");
			$('#home-counter').css("display", "none");
		})
		$('#place-order-tab').on('click', function() {
			$('#place-order').css("display", "block");
			$('#add-order-content').css("display", "none");
		})
		$('#place-order-cancel').on('click', function() {
			$('#place-order').css("display", "none");
			$('#add-order-content').css("display", "block");
		})
		$('#home-counter-tab').on('click', function() {
			$('#home-counter').css("display", "block");
			$('#add-order-content').css("display", "none");
		})
	}
	handleTabs();
</script>

</body>

</html>