<!--**********************************
            Footer start
        ***********************************-->
        <!-- <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2021</p>
            </div>
        </div> -->
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


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
		  
	function ItemsCarousel()
	{
	
		/*  testimonial one function by = owl.carousel.js */
		jQuery('.item-carousel').owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			center:true,
			autoWidth:true,
			autoplay:true,
			dots: false,
			items:4,
			navText: ['', ''],
			breackpoint:[
			
			
			]
			
		})
	}
	
	jQuery(window).on('load',function(){
		setTimeout(function(){
			ItemsCarousel();
		}, 1000); 
	});
	
	function handleTabs(){
		$('#add-order-content,#place-order').css("display","none");	
		$('#add-order').on('click',function(){
			$('#add-order-content').css("display","block");	
			$('#home-counter').css("display","none");	
		})
		$('#place-order-tab').on('click',function(){
			$('#place-order').css("display","block");	
			$('#add-order-content').css("display","none");	
		})
		$('#place-order-cancel').on('click',function(){
			$('#place-order').css("display","none");	
			$('#add-order-content').css("display","block");	
		})
		$('#home-counter-tab').on('click',function(){
			$('#home-counter').css("display","block");	
			$('#add-order-content').css("display","none");	
		})
	}
	handleTabs();

	</script>
	
</body>
</html>