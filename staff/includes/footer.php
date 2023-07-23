</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Cookie Consent -->
            <div class="wrapper">
                <img src="<?php echo base_url ?>assets/img/icons/cookie.png" alt="">
                <div class="content">
                    <header>Cookies Consent</header>
                    <p>Cookies help us deliver our services. By using our services, you agree to our use of cookies. <a href="<?php echo base_url ?>cookie-policy">Cookie Policy</a>. For information on how we protect your privacy, please read our <a href="<?php echo base_url ?>privacy-policy">Privacy Policy</a>.</p>
                    <div class="buttons">
                        <button class="item">I accept</button>
                    </div>
                </div>
            </div>
            <!-- End Cookie Consent -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white shadow noprint">
                <div class="container my-auto">
                    <div class="copyright d-flex justify-content-between my-auto">
                        <span>Copyright &copy; 1996-<?php echo date('Y'); ?> Municipal Agriculture Office Jimenez</span>
                        <span>
                            <a href="<?php echo base_url ?>cookie-policy">Cookie Policy</a>
                            <a href="<?php echo base_url ?>privacy-policy">Privacy Policy</a>
                            <a href="<?php echo base_url ?>website-terms-condition">Terms of Use</a>
                            <a href="<?php echo base_url ?>sitemap">Sitemap</a>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded noprint" href="#page-top">
        <i class="fa fa-arrow-up" style="margin-top: 0.7rem;"></i>
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
    <script src="<?php echo base_url ?>assets/js/sweetalert.js"></script>

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

<?php
    include ('message.php');
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script>

    function showDiv(id) {
        $(`#${id}`).show();
        var divs = ["div1", "div2", "div3"]; // exclude div1 from the list of elements to hide
        divs.forEach(div => {
            if (div !== id) {
                $(`#${div}`).hide();
            }
        });
        
        // Reset the fields in the Farmer form
        if (id == "div1") {
            // Farm Worker form
            document.getElementsByName("owner")[0].checked = false;
            document.getElementsByName("land")[0].checked = false;
            document.getElementsByName("cultivation")[0].checked = false;
            document.getElementsByName("planting")[0].checked = false;
            document.getElementsByName("harvesting")[0].checked = false;
            document.getElementsByName("othersfarmworker")[0].value = "";
            // Agri Youth form
            document.getElementsByName("part_of_farming")[0].checked = false;
            document.getElementsByName("attending_formal")[0].checked = false;
            document.getElementsByName("attending_nonformal")[0].checked = false;
            document.getElementsByName("participated")[0].checked = false;
            document.getElementsByName("other_agri_youth_specify")[0].value = "";
        } else if (id == "div2") {
            // Farmer form
            document.getElementsByName("rice")[0].checked = false;
            document.getElementsByName("corn")[0].checked = false;
            document.getElementsByName("other_crops_specify")[0].value = "";
            document.getElementsByName("livestock")[0].checked = false;
            document.getElementsByName("livestock_specify")[0].value = "";
            document.getElementsByName("livestock_specify")[0].required = false;
            document.getElementsByName("livestock_specify")[0].disabled = true;
            document.getElementsByName("livestock_specify")[0].labels[0].classList.remove('required');
            document.getElementsByName("poultry")[0].checked = false;
            document.getElementsByName("poultry_specify")[0].value = "";
            document.getElementsByName("poultry_specify")[0].required = false;
            document.getElementsByName("poultry_specify")[0].disabled = true;
            document.getElementsByName("poultry_specify")[0].labels[0].classList.remove('required');
            // Agri Youth form
            document.getElementsByName("part_of_farming")[0].checked = false;
            document.getElementsByName("attending_formal")[0].checked = false;
            document.getElementsByName("attending_nonformal")[0].checked = false;
            document.getElementsByName("participated")[0].checked = false;
            document.getElementsByName("other_agri_youth_specify")[0].value = "";
        } else if (id == "div3") {
            // Farmer form
            document.getElementsByName("rice")[0].checked = false;
            document.getElementsByName("corn")[0].checked = false;
            document.getElementsByName("other_crops_specify")[0].value = "";
            document.getElementsByName("livestock")[0].checked = false;
            document.getElementsByName("livestock_specify")[0].value = "";
            document.getElementsByName("livestock_specify")[0].required = false;
            document.getElementsByName("livestock_specify")[0].disabled = true;
            document.getElementsByName("livestock_specify")[0].labels[0].classList.remove('required');
            document.getElementsByName("poultry")[0].checked = false;
            document.getElementsByName("poultry_specify")[0].value = "";
            document.getElementsByName("poultry_specify")[0].required = false;
            document.getElementsByName("poultry_specify")[0].disabled = true;
            document.getElementsByName("poultry_specify")[0].labels[0].classList.remove('required');
            // Farm Worker form
            document.getElementsByName("owner")[0].checked = false;
            document.getElementsByName("land")[0].checked = false;
            document.getElementsByName("cultivation")[0].checked = false;
            document.getElementsByName("planting")[0].checked = false;
            document.getElementsByName("harvesting")[0].checked = false;
            document.getElementsByName("othersfarmworker")[0].value = "";
        }
    }
    var base_url = "<?php echo base_url ?>"; // Global base_url in javascript
    
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
    // Script for auto run show div if database selected desired value
    $(document).ready(function() {
        const options = [
            { value: "Farmer", id: "#option1" },
            { value: "Farmworker", id: "#option2" },
            { value: "Agri Youth", id: "#option3" }
        ];
        options.forEach(option => {
            if ('<?= $user['livelihood'] ?>' === option.value) {
                $(option.id).trigger('click');
            }
        });
    });
    $(document).ready(function(){
        if("<?php echo $user['ig']; ?>" == "Yes") {
            $('#igyes').trigger('click');
        }
        if("<?php echo $user['ig']; ?>" == "No") {
            $('#igno').trigger('click');
        }
        if("<?php echo $user['govid']; ?>" == "Yes") {
            $('#govidyes').trigger('click');
        }
        if("<?php echo $user['govid']; ?>" == "No") {
            $('#govidno').trigger('click');
        }
        if("<?php echo $user['farmersassoc']; ?>" == "Yes") {
            $('#facyes').trigger('click');
        }
        if("<?php echo $user['farmersassoc']; ?>" == "No") {
            $('#facno').trigger('click');
        }
        if("<?php echo $user['livestock']; ?>" == "Livestock") {
            $('#livestock').trigger('click');
        }
        if("<?php echo $user['livestock']; ?>" == "Livestock") {
            $('#livestock').trigger('click');
        }
        if("<?php echo $user['poultry']; ?>" == "Poultry") {
            $('#poultry').trigger('click');
        }
        if("<?php echo $user['qrcode']; ?>") {
            $(".qrcode").hide();
            $(".succqrcode").show();
        }
    });
</script>

</body>

</html>