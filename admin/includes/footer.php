</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white noprint">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MAO JIMENEZ</span>
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
        <i class="fas fa-angle-up" style="margin-top: 0.7rem;"></i>
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
    <script src="<?php echo base_url ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/main.js"></script>

    <!-- Loading JS -->
    <script src="<?php echo base_url ?>assets/js/loader.js"></script>

    <!-- Show PASSWORD JS -->
    <script src="<?php echo base_url ?>assets/js/showpass.js"></script>

    <!-- Ajax Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>


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
    // Camera scan for QR Code
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
    Instascan.Camera.getCameras().then(function(cameras){
        if(cameras.length > 0 ){
            scanner.start(cameras[0]);
        } else{
            alert('No cameras found');
        }

    }).catch(function(e) {
        console.error(e);
    });

    scanner.addListener('scan',function(c){
        document.getElementById('qrscan').value=c;
        //document.forms[0].submit();
        $(document).ready(function() {
            $(".qrcode").hide();
            $(".succqrcode").show();
        });
    });
    
    document.getElementById('rescan-btn').addEventListener('click', function() {
        scanner.start();
        document.getElementById('qrscan').value = ''; // clear the input field
        $(".qrcode").show();
        $(".succqrcode").hide();
    });

    // This is for checkbox button
    function handleCheckboxChange(checkbox, checkboxField, requiredLabel) {
        // Add event listener to the checkbox
        checkbox.addEventListener('change', function() {
            // If checkbox is checked, make the text input field required and enable it
            checkboxField.required = this.checked;
            checkboxField.disabled = !this.checked;
            requiredLabel.classList.add('required');

            // If checkbox is unchecked, clear the input field
            if (!this.checked) {
                checkboxField.value = '';
                requiredLabel.classList.remove('required');
            }
        });
    }

    // Usage:
    handleCheckboxChange(document.getElementById('livestock'), document.getElementById('livestock_specify'), document.querySelector('label[for="livestock_specify"]'));
    handleCheckboxChange(document.getElementById('poultry'), document.getElementById('poultry_specify'), document.querySelector('label[for="poultry_specify"]'));

    function handleRadioChange(radioGroup, radioYesField, requiredLabel) {
        // Add event listener to the radio buttons
        for (var i = 0; i < radioGroup.length; i++) {
            radioGroup[i].addEventListener('change', function() {
                // If "Yes" radio button is selected, make the text input field required and enable it
                if (this.value === 'Yes') {
                    radioYesField.required = true;
                    radioYesField.disabled = false;
                    requiredLabel.classList.add('required');
                } else {
                    // If "No" radio button is selected, make the text input field not required and disable it
                    radioYesField.required = false;
                    radioYesField.disabled = true;
                    radioYesField.value = ''; // clear the input field
                    requiredLabel.classList.remove('required');
                }
            });
        }
    }

    // Usage:
    handleRadioChange(document.getElementsByName('ig'), document.getElementsByName('igyes')[0], document.querySelector('label[for="igyes"]'));
    handleRadioChange(document.getElementsByName('govid'), document.getElementsByName('govidyes')[0], document.querySelector('label[for="govidyes"]'));
    handleRadioChange(document.getElementsByName('fac'), document.getElementsByName('facyes')[0], document.querySelector('label[for="facyes"]'));

</script>

</body>

</html>