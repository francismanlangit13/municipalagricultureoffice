</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Cookie Consent -->
            <div class="wrapper noprint">
                <img src="<?php echo base_url ?>assets/img/icons/cookie.png" alt="">
                <div class="content">
                    <header>Cookies Consent</header>
                    <p>Cookies help us deliver our services. By using our services, you agree to our use of cookies. <a href="<?php echo base_url ?>cookie-policy">Cookie Policy</a></p>
                    <div class="buttons">
                    <button class="item">I understand</button>
                    </div>
                </div>
            </div>
            <!-- End Cookie Consent -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white shadow noprint">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 1996-<?php echo date('Y'); ?> Municipal Agriculture Office Jimenez</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url ?>assets/js/demo/datatables-demo.js"></script>

    <!-- SCRIPT FOR SWEET ALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Image viewer slider -->
    <script src="<?php echo base_url ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?php echo base_url ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/main.js"></script>

    <!-- Loading JS -->
    <script src="<?php echo base_url ?>assets/js/loader.js"></script>

    <!-- Cookie Consent -->
    <script src="<?php echo base_url ?>assets/js/cookie.js"></script>

    <!-- Disable-key -->
    <script src="<?php echo base_url ?>assets/js/disable-key.js"></script>

    <?php if (strpos($_SERVER['PHP_SELF'], 'home/settings.php') !== false){ ?>
        <!-- Show PASSWORD JS -->
        <script src="<?php echo base_url ?>assets/js/showpass.js"></script>
    <?php } ?>

    <!-- Ajax Script -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>

    <!-- Serverstatus JS -->
    <script src="<?php echo base_url ?>assets/js/serverstatus.js"></script>

    <!-- PDF Script -->
    <script src="<?php echo base_url ?>assets/js/jspdf.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/html2canvas.min.js"></script>

<?php
    include ('message.php');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var base_url = "<?php echo base_url ?>"; // Global base_url in javascript
    function showDiv(id) {
        $(`#${id}`).show();
        var divs = ["div1", "div2", "div3"];
        divs.forEach(div => {
            if (div !== id) {
                $(`#${div}`).hide();
            }
        });
    }
    function previewImage(frameId, inputId) { // select multiple images viewer if user select desired image.
        let image = document.getElementById(frameId);
        let fileInput = document.getElementById(inputId);
        
        if (fileInput.files.length > 0) {
            let file = fileInput.files[0];
            image.src = URL.createObjectURL(file);
        } else {
            image.src = base_url + "assets/img/system/no-image.png";
        }
    }
</script>




</body>

</html>