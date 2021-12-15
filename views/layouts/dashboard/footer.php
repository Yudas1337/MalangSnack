 <!--**********************************
            Content body end
        ***********************************-->

 <!--**********************************
            Footer start
        ***********************************-->
 <div class="footer">
     <div class="copyright">
         <p>Copyright <?= date('Y'); ?> © Developed by <a href="https://yudas1337.github.io/" target="_blank">Yudas Malabi</a></p>
     </div>
 </div>
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

 <script src="<?= $uriHelper->assetUrl("js/jquery.min.js") ?>"></script>

 <script src="<?= $uriHelper->assetUrl("vendor/global/global.min.js") ?>"></script>
 <script src="<?= $uriHelper->assetUrl("vendor/bootstrap-select/dist/js/bootstrap-select.min.js") ?>"></script>
 <script src="<?= $uriHelper->assetUrl("vendor/chart.js/Chart.bundle.min.js") ?>"></script>
 <script src="<?= $uriHelper->assetUrl("js/custom.min.js") ?>"></script>
 <script src="<?= $uriHelper->assetUrl("js/deznav-init.js") ?>"></script>

 <!-- Counter Up -->
 <script src="<?= $uriHelper->assetUrl("vendor/waypoints/jquery.waypoints.min.js") ?>"></script>
 <script src="<?= $uriHelper->assetUrl("vendor/jquery.counterup/jquery.counterup.min.js") ?>"></script>

 <!-- Apex Chart -->
 <script src="<?= $uriHelper->assetUrl("vendor/apexchart/apexchart.js") ?>"></script>

 <!-- Chart piety plugin files -->
 <script src="<?= $uriHelper->assetUrl("vendor/peity/jquery.peity.min.js") ?>"></script>

 <script src="<?= $uriHelper->assetUrl("vendor/sweetalert2/dist/sweetalert2.min.js") ?>"></script>


 </body>

 <script>
     $('.sweetalert').click(function(e) {

         e.preventDefault();
         const href = $(this).attr('href');

         swal({
                 title: "Apa Anda Yakin?",
                 text: "Saat terhapus , Data yang dihapus tidak bisa kembali lagi!",
                 icon: "warning",
                 buttons: {
                     confirm: 'Hapus',
                     cancel: 'Batal'
                 },
                 dangerMode: true,
             })
             .then((willDelete) => {
                 if (willDelete) {
                     swal({
                         title: "Poof!",
                         text: "Data berhasil Dihapus",
                         icon: "success",
                     }).then((redirect) => {
                         document.location.href = href
                     });
                 }
             });
     });

     $('.sweetalertNya').click(function(e) {

         e.preventDefault();
         const href = $(this).attr('href');

         swal({
                 title: "Apa Anda Yakin Akan Logout?",
                 text: "Sesi anda akan berakhir dan anda harus login ulang!",
                 icon: "warning",
                 buttons: {
                     confirm: 'Logout',
                     cancel: 'Batal'
                 },
                 dangerMode: true,
             })
             .then((willDelete) => {
                 if (willDelete) {
                     swal({
                         title: "Berhasil",
                         text: "Logout akun berhasil!",
                         icon: "success",
                     }).then((redirect) => {
                         document.location.href = href
                     });
                 }
             });
     });
 </script>

 </html>