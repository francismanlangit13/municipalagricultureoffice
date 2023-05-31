<head>
    <?php
        include('../includes/header.php');
    ?>
    <!-- Script QR Code scanner -->
    <script type="text/javascript" src="<?php echo base_url ?>assets/js/qrscanner/adapter.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url ?>assets/js/qrscanner/vue.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url ?>assets/js/qrscanner/instascan.min.js"></script>
</head>
<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Farmer</li>
    <li class="breadcrumb-item">Add</li>
</ol>
<form action="code.php" method="POST" autocomplete="off" enctype="multipart/form-data">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-1">
                <div class="card-header">
                    <h5>PART I: Farmer Information</h5>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="required">Reference Number</label>
                            <input required placeholder="Enter Reference Number" type="text" name="reference_number" pattern="\d{2}-\d{2}-\d{2}-\d{3}-\d{6}" pattern="\d*" minlength="19" maxlength="19" class="form-control" id="reference_number-input">
                            <div id="reference_number-error"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Last Name</label>
                            <input required placeholder="Enter Last Name" type="text" id="lname" name="lname" class="form-control">
                            <div id="lname-error"></div>
                        </div> 
                    
                        <div class="col-md-3 mb-3">
                            <label for="">Middle Name</label>
                            <input placeholder="Enter Middle Name" type="text" id="mname" name="mname" class="form-control">
                            <div id="mname-error"></div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">First Name</label>
                            <input required placeholder="Enter First Name" type="text" id="fname" name="fname" class="form-control">
                            <div id="fname-error"></div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="suffix">Suffix</label>
                                <select class="form-control" id="suffix" name="suffix">
                                    <option value="" selected>Select Suffix</option>
                                    <option value="">None</option>
                                    <option value="Jr">Jr</option>
                                    <option value="Sr">Sr</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                </select>
                                <div id="suffix-error"></div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Gender</label>
                            <br>
                            <input required class="ml-2" type="radio" id="male" name="gender" value="Male"> Male
                            <input required class="ml-2"  type="radio" id="female" name="gender" value="Female"> Female
                            <div id="gender-error"></div>
                        </div>

                        <div class="col-md-9 mb-3">
                            <label for="" class="required">Email Address</label>
                            <input required placeholder="Enter Email Address" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="email-input">
                            <div id="email-error"></div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <hr>
                        </div>

                        <div class="col-md-4 mb-3">   
                            <label for="" class="required">Purok</label>
                            <input required placeholder="Enter Purok No." type="number" id="purok" name="purok" pattern="\d*" minlength="1" maxlength="2"  class="form-control">
                            <div id="purok-error"></div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Street</label>
                            <input required placeholder="Enter Street" type="text" id="street" name="street" class="form-control">
                            <div id="street-error"></div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="address" class="required">Barangay</label>
                                <select class="form-control" name="barangay" id="barangay" required>
                                    <option value="" selected="true" disabled="disabled">Select Barangay</option>
                                    <option value="Adorable">Adorable</option>    
                                    <option value="Butuay">Butuay</option> 
                                    <option value="Carmen">Carmen</option> 
                                    <option value="Corrales">Corrales</option> 
                                    <option value="Dicoloc">Dicoloc</option> 
                                    <option value="Gata">Gata</option> 
                                    <option value="Guintomoyan">Guintomoyan</option> 
                                    <option value="Malibacsan">Malibacsan</option> 
                                    <option value="Macabayao">Macabayao</option> 
                                    <option value="Matugas Alto">Matugas Alto</option> 
                                    <option value="Matugas Bajo">Matugas Bajo</option> 
                                    <option value="Mialem">Mialem</option> 
                                    <option value="Naga">Naga</option> 
                                    <option value="Palilan">Palilan</option> 
                                    <option value="Nacional">Nacional</option> 
                                    <option value="Rizal">Rizal</option>
                                    <option value="San Isidro">San Isidro</option> 
                                    <option value="Santa Cruz">Santa Cruz</option>
                                    <option value="Sibaroc">Sibaroc</option>
                                    <option value="Sinara Alto">Sinara Alto</option>
                                    <option value="Sinara Bajo">Sinara Bajo</option>
                                    <option value="Seti">Seti</option>
                                    <option value="Tabo-o">Tabo-o</option>
                                    <option value="Taraka">Taraka</option>
                                </select>
                                <div id="barangay-error"></div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Municipality/City</label>
                            <input value="Jimenez" type="text" class="form-control" disabled>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Province</label>
                            <input value="Misamis Occidental" type="text" class="form-control" disabled>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Region</label>
                            <input value="10" type="text" class="form-control" disabled>
                        </div>

                        <div class="col-md-12 mb-3">
                            <hr>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Mobile Number</label>
                            <input required placeholder="Enter Mobile Number" type="text" pattern="09[0-9]{9}" maxlength="11" name="phone" class="form-control" id="phone-input">
                            <div id="phone-error"></div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Religion</label>
                            <input required placeholder="Enter Religion" type="text" id="religion" name="religion" class="form-control">
                            <div id="religion-error"></div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="date" class="required">Date of Birth</label>
                            <input required class="form-control" id="date" name="dob" placeholder="MM/DD/YYY" type="date"/>
                            <div id="date-error"></div>
                        </div>

                        <div class="col-md-9 mb-3">
                            <label for="" class="required">Place of Birth</label>
                            <textarea required placeholder="Enter Place of Birth" type="text" id="placeofbirth" name="placeofbirth" class="form-control"></textarea>
                            <div id="placeofbirth-error"></div>
                        </div> 

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Civil Status</label>
                            <select id="civilstatus" name="civilstatus" required class="form-control">
                                <option value="" selected="true" disabled="disabled">Select Civil Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                            </select>
                            <div id="civilstatus-error"></div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <hr>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Person with Disability (PWD)</label>
                            <br>
                            <input required class="ml-2" type="radio" id="pwdyes" name="pwd" value="Yes"> Yes
                            <input required class="ml-2" type="radio" id="pwdno" name="pwd" value="No"> No
                            <div id="pwd-error"></div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">4P's Beneficiary?</label>
                            <br>
                            <input required class="ml-2" type="radio" id="fourpsyes" name="fourps" value="Yes"> Yes
                            <input required class="ml-2" type="radio" id="fourpsno" name="fourps" value="No"> No
                            <div id="fourps-error"></div>
                        </div>

                        <div class="col-md-12 mb-3">
                        <hr>
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="" class="required">Member of an <strong>Indigenous Group</strong>?</label>
                        <br>
                        <input required class="ml-2" type="radio" id="igyes" name="ig" value="Yes"> Yes
                        <input required class="ml-2" type="radio" id="igno" name="ig" value="No"> No
                        <div id="ig-error"></div>
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="igyes" class="">If yes, specify:</label>
                            <input disabled placeholder="" type="text" name="igyes" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="" class="required">With <strong>Government ID</strong>?</label>
                        <br>
                        <input required class="ml-2" type="radio" id="govidyes" name="govid" value="Yes"> Yes
                        <input required class="ml-2" type="radio" id="govidno" name="govid" value="No"> No
                        <div id="govid-error"></div>
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="govidyes" class="">If yes, specify:</label>
                            <input disabled placeholder="" type="text" name="govidyes" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="" class="required">Member of any <strong>Farmers Association/Cooperative</strong>?</label>
                        <br>
                        <input required class="ml-2" type="radio" id="facyes" name="fac" value="Yes"> Yes
                        <input required class="ml-2"  type="radio" id="facno" name="fac" value="No"> No
                        <div id="fac-error"></div>
                        </div>

                        
                        <div class="col-md-8 mb-3">
                            <label for="facyes" class="">If yes, specify:</label>
                            <input disabled placeholder="" type="text" name="facyes" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card mt-1">
                <div class="card-header">
                    <h5>PART II: FARM PROFILE</h5>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="required"><strong>Main Livelihood</strong></label>
                            <br>
                            <input required class="ml-4" type="radio" name="livelihood" value="Farmer" id="option1" onclick="showDiv('div1')"> Farmer
                            <input required  class="ml-4" type="radio"name="livelihood" value="Farmworker" id="option2" onclick="showDiv('div2')"> Farmworker/Laborer
                            <input required  class="ml-4" type="radio" name="livelihood" value="Agri Youth" id="option3" onclick="showDiv('div3')"> Agri Youth
                            <div id="livelihood-error"></div>
                        </div>

                        <div class="col-md-12 mb-3"  id="div1" style="display: none;">
                            <h5 class="text-center mt-4"><b>FOR FARMER</b></h5>
                            <h6 class="text-center mt-4"><u>Type of Farming Activity</u></strong></h6>
                        
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Rice" name="rice">
                                <label class="form-check-label" for="rice">Rice</label>
                            </div>

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="Corn" name="corn">
                                <label class="form-check-label" for="corn">Corn</label>
                            </div>

                            <label fowr="">Other Crops Specify:</label>
                            <input placeholder="" type="text" name="other_crops_specify" class="form-control">

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="Livestock" id="livestock" name="livestock">
                                <label class="form-check-label" for="livestock">Livestock</label>
                            </div>

                            <label for="livestock_specify" class="">Specify:</label>
                            <input placeholder="" type="text" id="livestock_specify" name="livestock_specify" class="form-control" disabled>

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="Poultry" id="poultry" name="poultry">
                                <label class="form-check-label" for="poultry">Poultry</label>
                            </div>
                            
                            <label for="poultry_specify" class="">Specify:</label>
                            <input placeholder="" type="text" id="poultry_specify" name="poultry_specify" class="form-control" disabled>
                        </div>

                        <div class="col-md-12 mb-3" id="div2" style="display: none;">
                            <h5 class="text-center mt-4"><b>FOR FARMWORKER</b></h5>
                            <h6 class="text-center mt-4"><u>Kind of Work</u></strong></h6>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Owner" name="owner">
                                <label class="form-check-label" for="owner">Owner</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Land Preparation" name="land">
                                <label class="form-check-label" for="land">Land Preparation</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Cultivation" name="cultivation">
                                <label class="form-check-label" for="cultivation">Cultivation</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Planting" name="planting">
                                <label class="form-check-label" for="planting">Planting</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Harvesting" name="harvesting">
                                <label class="form-check-label" for="Harvesting">Harvesting</label>
                            </div>
                                
                            <label for="">Others, Please Specify:</label>
                            <input placeholder="" type="text" name="othersfarmworker" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3" id="div3" style="display: none;">
                            <h5 class="text-center mt-4"><b>FOR AGRI YOUTH</b></h5>
                            <h6 class="text-center mt-4"><u>Type of Involvement</u></strong></h6>
                            <p class="text-info">For the purpose of trainings, financial assistance, and other programs catered to the youth with involvement to any agriculture activity.</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Part of a farming household" name="part_of_farming">
                                <label class="form-check-label" for="Part of a farming household">Part of a farming household</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Attending/Attended formal agri-fishery related course" name="attending_formal">
                                <label class="form-check-label" for="Attending/Attended formal agri-fishery related course">Attending/Attended formal agri-fishery related course</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Attending/Attended non-formal agri-fishery related course" name="attending_nonformal">
                                <label class="form-check-label" for="Attending/Attended non-formal agri-fishery related course">Attending/Attended non-formal agri-fishery related course</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Participated in any agricultural activity/program" name="participated">
                                <label class="form-check-label" for="Participated in any agricultural activity/program">Participated in any agricultural activity/program</label>
                            </div>

                            <label for="">Others, Please Specify:</label>
                            <input placeholder="" type="text" name="other_agri_youth_specify" class="form-control">
                        </div>
                        
                        <div class="col-md-6 mb-3 ml-4">                             
                            <label for="profilepicture" class="required">Upload 2x2 Picture </label> <br>
                            <input type="file" class="form-control btn btn-secondary" style="padding-bottom:2.2rem;" name="image" id="image1" accept=".jpg, .jpeg, .png" value="" onchange="previewImage('frame1', 'image1')" required>
                            <br>
                            <img class="mt-2 ml-5" id="frame1" src="<?php echo base_url ?>assets/img/system/no-image.png" alt="Profile Picture" width="240px" height="180px"/>
                        </div>

                        <div class="col-md-5 mb-3">
                            <div class="qrcode">
                                <label class="required">
                                    SCAN QR CODE HERE
                                    <input required type="text" name="qrcode_text" id="qrscan" readonyy="" style="opacity:1%; margin:-6.2rem; zoom:1%;">
                                </label>
                                <video id="preview" width="100%"></video>
                            </div>
                            <div class="succqrcode" style="display:none;">
                                <div class="alert alert-success" role="alert">
                                    QR Scan Success!
                                </div>
                                <button type="button" id="rescan-btn" class="btn btn-warning"><i class="fa fa-qrcode"></i> Rescan QR Code</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" name="add_farmer" id="submit-btn" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                </div>
            <br>
        </div>
    </div>
</form>

<?php include('../includes/footer.php');?>

<script>
    $(document).ready(function() {
        // disable submit button by default
        $('#submit-btn').prop('disabled', true);

        // debounce functions for each input field
        var debouncedCheckEmail = _.debounce(checkEmail, 500);
        var debouncedCheckPhone = _.debounce(checkPhone, 500);
        var debouncedCheckRefNumber = _.debounce(checkRefNumber, 500);

        // attach event listeners for each input field
        $('#email-input').on('blur', debouncedCheckEmail);
        $('#phone-input').on('blur', debouncedCheckPhone);
        $('#reference_number-input').on('blur', debouncedCheckRefNumber);

        $('#email-input').on('input', debouncedCheckEmail);
        $('#phone-input').on('input', debouncedCheckPhone);
        $('#reference_number-input').on('input', debouncedCheckRefNumber);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#email-error').is(':empty') && $('#phone-error').is(':empty') && $('#reference_number-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            } else {
                $('#submit-btn').prop('disabled', true);
            }
        }

        function checkEmail() {
            var email = $('#email-input').val().trim();
            
            // show error if email is empty
            if (email === '') {
                $('#email-error').text('Please input email').css('color', 'red');
                $('#email-input').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // check if email format is valid
            var emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i;
            if (!emailPattern.test(email)) {
                $('#email-error').text('Invalid email format').css('color', 'red');
                $('#email-input').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // make AJAX call to check if email exists
            $.ajax({
                url: 'ajax.php', // replace with the actual URL to check email
                method: 'POST', // use the appropriate HTTP method
                data: { email: email },
                success: function(response) {
                    if (response.exists) {
                        // disable submit button if email is taken
                        $('#submit-btn').prop('disabled', true);
                        $('#email-error').text('Email already taken').css('color', 'red');
                        $('#email-input').addClass('is-invalid');
                    } else {
                        $('#email-error').empty();
                        $('#email-input').removeClass('is-invalid');
                        // enable submit button if email is valid
                        checkIfAllFieldsValid();
                    }
                },
                error: function() {
                    $('#email-error').text('Error checking email');
                }
            });
        }

        function checkPhone() {
            var phone = $('#phone-input').val().trim();

            // show error if phone number is empty
            if (phone === '') {
                $('#phone-error').text('Please input phone number').css('color', 'red');
                $('#phone-input').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // check if phone number format is valid
            var phoneNumberPattern = /^09[0-9]{9}$/;
            if (!phoneNumberPattern.test(phone)) {
                $('#phone-error').text('Invalid phone number format').css('color', 'red');
                $('#phone-input').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // make AJAX call to check if phone number exists
            $.ajax({
                url: 'ajax.php', // replace with the actual URL to check phone
                method: 'POST', // use the appropriate HTTP method
                data: { phone: phone },
                success: function(response) {
                    if (response.exists) {
                        $('#phone-error').text('Phone number already taken').css('color', 'red');
                        $('#phone-input').addClass('is-invalid');
                        // disable submit button if phone number is taken
                        $('#submit-btn').prop('disabled', true);
                    } else {
                        $('#phone-error').empty();
                        $('#phone-input').removeClass('is-invalid');
                        // enable submit button if phone number is valid
                        checkIfAllFieldsValid();
                    }
                },
                error: function() {
                    $('#phone-error').text('Error checking phone number');
                }
            });
        }

        function checkRefNumber() {
            var reference_number = $('#reference_number-input').val().trim();

            // show error if reference number is empty
            if (reference_number === '') {
                $('#reference_number-error').text('Please input reference number').css('color', 'red');
                $('#reference_number-input').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // check if reference number format is valid
            var referenceNumberPattern = /^\d{2}-\d{2}-\d{2}-\d{3}-\d{6}$/;
            if (!referenceNumberPattern.test(reference_number)) {
                $('#reference_number-error').text('Invalid reference number format').css('color', 'red');
                $('#reference_number-input').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // make AJAX call to check if reference number exists
            $.ajax({
                url: 'ajax.php', // replace with the actual URL to check reference number
                method: 'POST', // use the appropriate HTTP method
                data: { reference_number: reference_number },
                success: function(response) {
                    if (response.exists) {
                        $('#reference_number-error').text('Reference number already taken').css('color', 'red');
                        $('#reference_number-input').addClass('is-invalid');
                        // disable submit button if reference number is taken
                        $('#submit-btn').prop('disabled', true);
                    } else {
                        $('#reference_number-error').empty();
                        $('#reference_number-input').removeClass('is-invalid');
                        // enable submit button if reference number is valid
                        checkIfAllFieldsValid();
                    }
                },
                error: function() {
                    $('#reference_number-error').text('Error checking reference number');
                }
            });
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

<!-- <script>
    var firstNameInput = document.getElementById("fname");
    var firstNameError = document.getElementById("fname-error");
    var middleNameInput = document.getElementById("mname");
    var middleNameError = document.getElementById("mname-error");
    var lastNameInput = document.getElementById("lname");
    var lastNameError = document.getElementById("lname-error");
    var suffixSelect = document.getElementById("suffix");
    var suffixNameError = document.getElementById("suffix-error");
    const maleInput = document.getElementById("male");
    const femaleInput = document.getElementById("female");
    var genderNameError = document.getElementById("gender-error");
    var religionNameInput = document.getElementById("religion");
    var religionNameError = document.getElementById("religion-error");
    var birthdayNameInput = document.getElementById("date");
    var birthdayNameError = document.getElementById("date-error");
    var placeofbirthNameInput = document.getElementById("placeofbirth");
    var placeofbirthNameError = document.getElementById("placeofbirth-error");
    var civilstatusNameInput = document.getElementById("civilstatus");
    var civilstatusNameError = document.getElementById("civilstatus-error");
    var purokNameInput = document.getElementById("purok");
    var purokNameError = document.getElementById("purok-error");
    var streetNameInput = document.getElementById("street");
    var streetNameError = document.getElementById("street-error");
    var barangayNameInput = document.getElementById("barangay");
    var barangayNameError = document.getElementById("barangay-error");
    const pwdyesInput = document.getElementById("pwdyes");
    const pwdnoInput = document.getElementById("pwdno");
    var pwdNameError = document.getElementById("pwd-error");
    const fourpsyesInput = document.getElementById("fourpsyes");
    const fourpsnoInput = document.getElementById("fourpsno");
    var fourpsNameError = document.getElementById("fourps-error");
    const igyesInput = document.getElementById("igyes");
    const ignoInput = document.getElementById("igno");
    var igNameError = document.getElementById("ig-error");
    const govidyesInput = document.getElementById("govidyes");
    const govidnoInput = document.getElementById("govidno");
    var igNameError = document.getElementById("govid-error");
    const facyesInput = document.getElementById("facyes");
    const facnoInput = document.getElementById("facno");
    var facNameError = document.getElementById("fac-error");
    const option1Input = document.getElementById("option1");
    const option2Input = document.getElementById("option2");
    const option3Input = document.getElementById("option3");
    var livelihoodNameError = document.getElementById("livelihood-error");

    firstNameInput.addEventListener("blur", function() {
        if (firstNameInput.value.trim() === "") {
            $('#fname-error').text('Please input first name').css('color', 'red');
            $('#fname').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#fname-error').empty();
            $('#fname').removeClass('is-invalid');
            // enable submit button if first name are inputed.
            checkIfAllFieldsValid();
        }
    });

    middleNameInput.addEventListener("blur", function() {
        if (middleNameInput.value.trim() === "") {
            $('#mname-error').text('Please input middle name').css('color', 'red');
            $('#mname').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#mname-error').empty();
            $('#mname').removeClass('is-invalid');
            // enable submit button if middle name are inputed.
            checkIfAllFieldsValid();
        }
    });

    lastNameInput.addEventListener("blur", function() {
        if (lastNameInput.value.trim() === "") {
            $('#lname-error').text('Please input last name').css('color', 'red');
            $('#lname').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#lname-error').empty();
            $('#lname').removeClass('is-invalid');
            // enable submit button if last name are inputed.
            checkIfAllFieldsValid();
        }
    });

    suffixSelect.addEventListener("blur", function() {
        if (suffixSelect.value === "" && suffixSelect.selectedIndex !== 1) {
            $('#suffix-error').text('Please select suffix').css('color', 'red');
            $('#suffix').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#suffix-error').empty();
            $('#suffix').removeClass('is-invalid');
            // enable submit button if suffix are selected.
            checkIfAllFieldsValid();
        }
    });

    maleInput.addEventListener("blur", checkGenderSelection);
    femaleInput.addEventListener("blur", checkGenderSelection);
    function checkGenderSelection() {
        if (!maleInput.checked && !femaleInput.checked) {
            $('#gender-error').text('Please select your gender').css('color', 'red');
            $('#male').addClass('is-invalid');
            $('#female').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#gender-error').empty();
            $('#male').removeClass('is-invalid');
            $('#female').removeClass('is-invalid');
            // Enable submit button if a gender is selected
            checkIfAllFieldsValid();
        }
    }

    religionNameInput.addEventListener("blur", function() {
        if (religionNameInput.value.trim() === "") {
            $('#religion-error').text('Please input religion').css('color', 'red');
            $('#religion').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#religion-error').empty();
            $('#religion').removeClass('is-invalid');
            // enable submit button if religion are inputed.
            checkIfAllFieldsValid();
        }
    });

    birthdayNameInput.addEventListener("blur", function() {
        if (birthdayNameInput.value.trim() === "") {
            $('#date-error').text('Please input birthday').css('color', 'red');
            $('#date').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#date-error').empty();
            $('#date').removeClass('is-invalid');
            // enable submit button if birthday are inputed.
            checkIfAllFieldsValid();
        }
    });

    placeofbirthNameInput.addEventListener("blur", function() {
        if (placeofbirthNameInput.value.trim() === "") {
            $('#placeofbirth-error').text('Please input place of birth').css('color', 'red');
            $('#placeofbirth').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#placeofbirth-error').empty();
            $('#placeofbirth').removeClass('is-invalid');
            // enable submit button if place of birth are inputed.
            checkIfAllFieldsValid();
        }
    });

    civilstatusNameInput.addEventListener("blur", function() {
        if (civilstatusNameInput.value.trim() === "") {
            $('#civilstatus-error').text('Please select civil status').css('color', 'red');
            $('#civilstatus').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#civilstatus-error').empty();
            $('#civilstatus').removeClass('is-invalid');
            // enable submit button if civil status is selected.
            checkIfAllFieldsValid();
        }
    });

    purokNameInput.addEventListener("blur", function() {
        if (purokNameInput.value.trim() === "") {
            $('#purok-error').text('Please input purok').css('color', 'red');
            $('#purok').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#purok-error').empty();
            $('#purok').removeClass('is-invalid');
            // enable submit button if purok is inputed.
            checkIfAllFieldsValid();
        }
    });

    streetNameInput.addEventListener("blur", function() {
        if (streetNameInput.value.trim() === "") {
            $('#street-error').text('Please input street').css('color', 'red');
            $('#street').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#street-error').empty();
            $('#street').removeClass('is-invalid');
            // enable submit button if street is inputed.
            checkIfAllFieldsValid();
        }
    });

    barangayNameInput.addEventListener("blur", function() {
        if (barangayNameInput.value.trim() === "") {
            $('#barangay-error').text('Please select barangay').css('color', 'red');
            $('#barangay').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#barangay-error').empty();
            $('#barangay').removeClass('is-invalid');
            // enable submit button if barangay is selected.
            checkIfAllFieldsValid();
        }
    });

    pwdyesInput.addEventListener("blur", checkPWDSelection);
    pwdnoInput.addEventListener("blur", checkPWDSelection);
    function checkPWDSelection() {
        if (!pwdyesInput.checked && !pwdnoInput.checked) {
            $('#pwd-error').text('Please select pwd').css('color', 'red');
            $('#pwdyes').addClass('is-invalid');
            $('#pwdno').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#pwd-error').empty();
            $('#pwdyes').removeClass('is-invalid');
            $('#pwdno').removeClass('is-invalid');
            // Enable submit button if a pwd is selected
            checkIfAllFieldsValid();
        }
    }

    fourpsyesInput.addEventListener("blur", check4psSelection);
    fourpsnoInput.addEventListener("blur", check4psSelection);
    function check4psSelection() {
        if (!fourpsyesInput.checked && !fourpsnoInput.checked) {
            $('#fourps-error').text('Please select 4ps').css('color', 'red');
            $('#fourpsyes').addClass('is-invalid');
            $('#fourpsno').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#fourps-error').empty();
            $('#fourpsyes').removeClass('is-invalid');
            $('#fourpsno').removeClass('is-invalid');
            // Enable submit button if a 4ps is selected
            checkIfAllFieldsValid();
        }
    }

    igyesInput.addEventListener("blur", checkigSelection);
    ignoInput.addEventListener("blur", checkigSelection);
    function checkigSelection() {
        if (!igyesInput.checked && !ignoInput.checked) {
            $('#ig-error').text('Please select indigenous group').css('color', 'red');
            $('#igyes').addClass('is-invalid')
            $('#igno').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#ig-error').empty();
            $('#igyes').removeClass('is-invalid');
            $('#igno').removeClass('is-invalid');
            // Enable submit button if a indigenous group is selected
            checkIfAllFieldsValid();
        }
    }

    govidyesInput.addEventListener("blur", checkgovidSelection);
    govidnoInput.addEventListener("blur", checkgovidSelection);
    function checkgovidSelection() {
        if (!govidyesInput.checked && !govidnoInput.checked) {
            $('#govid-error').text('Please select government ID').css('color', 'red');
            $('#govidyes').addClass('is-invalid')
            $('#govidno').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#govid-error').empty();
            $('#govidyes').removeClass('is-invalid');
            $('#govidno').removeClass('is-invalid');
            // Enable submit button if a government ID is selected
            checkIfAllFieldsValid();
        }
    }

    facyesInput.addEventListener("blur", checkfacSelection);
    facnoInput.addEventListener("blur", checkfacSelection);
    function checkfacSelection() {
        if (!facyesInput.checked && !facnoInput.checked) {
            $('#fac-error').text('Please select farmers association/cooperative').css('color', 'red');
            $('#facyes').addClass('is-invalid')
            $('#facno').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#fac-error').empty();
            $('#facyes').removeClass('is-invalid');
            $('#facno').removeClass('is-invalid');
            // Enable submit button if a farmers association/cooperative is selected
            checkIfAllFieldsValid();
        }
    }

    option1Input.addEventListener("blur", checklivelihoodSelection);
    option2Input.addEventListener("blur", checklivelihoodSelection);
    option3Input.addEventListener("blur", checklivelihoodSelection);
    function checklivelihoodSelection() {
        if (!option1Input.checked && !option2Input.checked && !option3Input.checked) {
            $('#livelihood-error').text('Please select livelihood').css('color', 'red');
            $('#option1').addClass('is-invalid')
            $('#option2').addClass('is-invalid');
            $('#option3').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#livelihood-error').empty();
            $('#option1').removeClass('is-invalid');
            $('#option2').removeClass('is-invalid');
            $('#option3').removeClass('is-invalid');
            // Enable submit button if a livelihood is selected
            checkIfAllFieldsValid();
        }
    }
    function checkIfAllFieldsValid() {
      // check if all input fields are valid and enable submit button if so
      if ($('#fname-error').is(':empty') && $('#lname-error').is(':empty') && $('#suffix-error').is(':empty') && $('#gender-error').is(':empty') && $('#religion-error').is(':empty') && $('#date-error').is(':empty') && $('#placeofbirth-error').is(':empty') && $('#civilstatus-error').is(':empty') && $('#purok-error').is(':empty') && $('#street-error').is(':empty') && $('#barangay-error').is(':empty') && $('#pwd-error').is(':empty') && $('#fourps-error').is(':empty') && $('#ig-error').is(':empty') && $('#govid-error').is(':empty') && $('#fac-error').is(':empty') && $('#livelihood-error').is(':empty')) {
        $('#submit-btn').prop('disabled', false);
      }
    }
</script> -->

<script>
    $(document).ready(function() {
        // disable submit button by default
        $('#submit-btn').prop('disabled', true);

        // debounce functions for each input field
        var debouncedCheckFname = _.debounce(checkFname, 500);
        var debouncedCheckMname = _.debounce(checkMname, 500);
        var debouncedCheckLname = _.debounce(checkLname, 500);
        var debouncedCheckSuffix = _.debounce(checkSuffix, 500);
        var debouncedCheckGender = _.debounce(checkGender, 500);
        var debouncedCheckReligion = _.debounce(checkReligion, 500);
        var debouncedCheckBirthday = _.debounce(checkBirthday, 500);
        var debouncedCheckPlaceofbirth = _.debounce(checkPlaceofbirth, 500);
        var debouncedCheckCivilstatus = _.debounce(checkCivilstatus, 500);
        var debouncedCheckPurok = _.debounce(checkPurok, 500);
        var debouncedCheckStreet = _.debounce(checkStreet, 500);
        var debouncedCheckBarangay = _.debounce(checkBarangay, 500);
        var debouncedCheckPWD = _.debounce(checkPWD, 500);
        var debouncedCheckFourps = _.debounce(checkFourps, 500);
        var debouncedCheckIg = _.debounce(checkIg, 500);
        var debouncedCheckGovid = _.debounce(checkGovid, 500);
        var debouncedCheckFac = _.debounce(checkFac, 500);
        var debouncedCheckLivelihood = _.debounce(checkLivelihood, 500);

        // attach event listeners for each input field
        $('#fname').on('input', debouncedCheckFname);
        $('#mname').on('input', debouncedCheckMname);
        $('#lname').on('input', debouncedCheckLname);
        $('#suffix').on('change', debouncedCheckSuffix);
        $('#male').on('input', debouncedCheckGender);
        $('#female').on('input', debouncedCheckGender);
        $('#religion').on('input', debouncedCheckReligion);
        $('#date').on('input', debouncedCheckBirthday);
        $('#placeofbirth').on('input', debouncedCheckPlaceofbirth);
        $('#civilstatus').on('input', debouncedCheckCivilstatus);
        $('#purok').on('input', debouncedCheckPurok);
        $('#street').on('input', debouncedCheckStreet);
        $('#barangay').on('change', debouncedCheckBarangay);
        $('#pwdyes').on('input', debouncedCheckPWD);
        $('#pwdno').on('input', debouncedCheckPWD);
        $('#fourpsyes').on('input', debouncedCheckFourps);
        $('#fourpsno').on('input', debouncedCheckFourps);
        $('#igyes').on('input', debouncedCheckIg);
        $('#igno').on('input', debouncedCheckIg);
        $('#govidyes').on('input', debouncedCheckGovid);
        $('#govidno').on('input', debouncedCheckGovid);
        $('#facyes').on('input', debouncedCheckFac);
        $('#facno').on('input', debouncedCheckFac);
        $('#option1').on('input', debouncedCheckLivelihood);
        $('#option2').on('input', debouncedCheckLivelihood);
        $('#option3').on('input', debouncedCheckLivelihood);

        $('#fname').on('blur', debouncedCheckFname);
        $('#mname').on('blur', debouncedCheckMname);
        $('#lname').on('blur', debouncedCheckLname);
        $('#suffix').on('blur', debouncedCheckSuffix);
        $('#male').on('blur', debouncedCheckGender);
        $('#female').on('blur', debouncedCheckGender);
        $('#religion').on('blur', debouncedCheckReligion);
        $('#date').on('blur', debouncedCheckBirthday);
        $('#placeofbirth').on('blur', debouncedCheckPlaceofbirth);
        $('#civilstatus').on('blur', debouncedCheckCivilstatus);
        $('#purok').on('blur', debouncedCheckPurok);
        $('#street').on('blur', debouncedCheckStreet);
        $('#barangay').on('blur', debouncedCheckBarangay);
        $('#pwdyes').on('blur', debouncedCheckPWD);
        $('#pwdno').on('blur', debouncedCheckPWD);
        $('#fourpsyes').on('blur', debouncedCheckFourps);
        $('#fourpsno').on('blur', debouncedCheckFourps);
        $('#igyes').on('blur', debouncedCheckIg);
        $('#igno').on('blur', debouncedCheckIg);
        $('#govidyes').on('blur', debouncedCheckGovid);
        $('#govidno').on('blur', debouncedCheckGovid);
        $('#facyes').on('blur', debouncedCheckFac);
        $('#facno').on('blur', debouncedCheckFac);
        $('#option1').on('blur', debouncedCheckLivelihood);
        $('#option2').on('blur', debouncedCheckLivelihood);
        $('#option3').on('blur', debouncedCheckLivelihood);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#fname-error').is(':empty') && $('#mname-error').is(':empty') && $('#lname-error').is(':empty') && $('#suffix-error').is(':empty') && $('#gender-error').is(':empty') && $('#religion-error').is(':empty') && $('#date-error').is(':empty') && $('#placeofbirth-error').is(':empty') && $('#civilstatus-error').is(':empty') && $('#purok-error').is(':empty') && $('#street-error').is(':empty') && $('#barangay-error').is(':empty') && $('#pwd-error').is(':empty') && $('#fourps-error').is(':empty') && $('#ig-error').is(':empty') && $('#govid-error').is(':empty') && $('#fac-error').is(':empty') && $('#livelihood-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            } else {
                $('#submit-btn').prop('disabled', true);
            }
        }
        
        function checkFname() {
            var fname = $('#fname').val().trim();
            
            // show error if first name is empty
            if (fname === '') {
                $('#fname-error').text('Please input first name').css('color', 'red');
                $('#fname').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for first name if needed
            
            $('#fname-error').empty();
            $('#fname').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkMname() {
            var mname = $('#mname').val().trim();
            
            // show error if middle name is empty
            if (mname === '') {
                $('#mname-error').text('Please input middle name').css('color', 'red');
                $('#mname').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for middle name if needed
            
            $('#mname-error').empty();
            $('#mname').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
        function checkLname() {
            var lname = $('#lname').val().trim();
            
            // show error if last name is empty
            if (lname === '') {
                $('#lname-error').text('Please input last name').css('color', 'red');
                $('#lname').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for last name if needed
            
            $('#lname-error').empty();
            $('#lname').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkSuffix() {
            var suffixSelect = document.getElementById('suffix');
            var suffix = suffixSelect.value;
            
            // show error if the default option is selected
            if (suffix === '' && suffixSelect.selectedIndex !== 1) {
                $('#suffix-error').text('Please select a suffix').css('color', 'red');
                $('#suffix').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for suffix if needed
            
            $('#suffix-error').empty();
            $('#suffix').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkGender() {
            var gender = $('input[name="gender"]:checked').val();

            // show error if gender is not selected
            if (!gender) {
                $('#gender-error').text('Please select gender').css('color', 'red');
                $('#male').addClass('is-invalid');
                $('#female').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // Perform additional validation for gender if needed

            $('#gender-error').empty();
            $('#male').removeClass('is-invalid');
            $('#female').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
        function checkReligion() {
            var religion = $('#religion').val().trim();
            
            // show error if religion is empty
            if (religion === '') {
                $('#religion-error').text('Please input religion').css('color', 'red');
                $('#religion').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for religion if needed
            
            $('#religion-error').empty();
            $('#religion').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
        function checkBirthday() {
            var date = $('#date').val().trim();
            
            // show error if date is empty
            if (date === '') {
                $('#date-error').text('Please input birthday').css('color', 'red');
                $('#date').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for date if needed
            
            $('#date-error').empty();
            $('#date').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
        function checkPlaceofbirth() {
            var placeofbirth = $('#placeofbirth').val().trim();
            
            // show error if placeofbirth is empty
            if (placeofbirth === '') {
                $('#placeofbirth-error').text('Please input place of birth').css('color', 'red');
                $('#placeofbirth').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for placeofbirth if needed
            
            $('#placeofbirth-error').empty();
            $('#placeofbirth').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkCivilstatus() {
            var civilstatus = $('#civilstatus').val()
            
            // show error if civilstatus is empty
            if (!civilstatus || civilstatus.trim() === '') {
                $('#civilstatus-error').text('Please select civil status').css('color', 'red');
                $('#civilstatus').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for civilstatus if needed
            
            $('#civilstatus-error').empty();
            $('#civilstatus').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkPurok() {
            var purok = $('#purok').val().trim();
            
            // show error if purok is empty
            if (purok === '') {
                $('#purok-error').text('Please input purok').css('color', 'red');
                $('#purok').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for purok if needed
            
            $('#purok-error').empty();
            $('#purok').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkStreet() {
            var street = $('#street').val().trim();
            
            // show error if street is empty
            if (street === '') {
                $('#street-error').text('Please input street').css('color', 'red');
                $('#street').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for street if needed
            
            $('#street-error').empty();
            $('#street').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkBarangay() {
            var barangay = $('#barangay').val()
            
            // show error if barangay is empty
            if (!barangay || barangay.trim() === '') {
                $('#barangay-error').text('Please select barangay').css('color', 'red');
                $('#barangay').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for barangay if needed
            
            $('#barangay-error').empty();
            $('#barangay').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkPWD() {
            var pwd = $('input[name="pwd"]:checked').val();

            // show error if pwd is not selected
            if (!pwd) {
                $('#pwd-error').text('Please select pwd').css('color', 'red');
                $('#pwdyes').addClass('is-invalid');
                $('#pwdno').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // Perform additional validation for pwd if needed

            $('#pwd-error').empty();
            $('#pwdyes').removeClass('is-invalid');
            $('#pwdno').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkFourps() {
            var fourps = $('input[name="fourps"]:checked').val();

            // show error if fourps is not selected
            if (!fourps) {
                $('#fourps-error').text('Please select 4ps').css('color', 'red');
                $('#fourpsyes').addClass('is-invalid');
                $('#fourpsno').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // Perform additional validation for fourps if needed

            $('#fourps-error').empty();
            $('#fourpsyes').removeClass('is-invalid');
            $('#fourpsno').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkIg() {
            var ig = $('input[name="ig"]:checked').val();

            // show error if ig is not selected
            if (!ig) {
                $('#ig-error').text('Please select indigenous groups').css('color', 'red');
                $('#igyes').addClass('is-invalid');
                $('#igno').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // Perform additional validation for ig if needed

            $('#ig-error').empty();
            $('#igyes').removeClass('is-invalid');
            $('#igno').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkGovid() {
            var govid = $('input[name="govid"]:checked').val();

            // show error if govid is not selected
            if (!govid) {
                $('#govid-error').text('Please select government ID').css('color', 'red');
                $('#govidyes').addClass('is-invalid');
                $('#govidno').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // Perform additional validation for govid if needed

            $('#govid-error').empty();
            $('#govidyes').removeClass('is-invalid');
            $('#govidno').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkFac() {
            var fac = $('input[name="fac"]:checked').val();

            // show error if fac is not selected
            if (!fac) {
                $('#fac-error').text('Please select farmers association/cooperative').css('color', 'red');
                $('#facyes').addClass('is-invalid');
                $('#facno').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // Perform additional validation for fac if needed

            $('#fac-error').empty();
            $('#facyes').removeClass('is-invalid');
            $('#facno').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkLivelihood() {
            var livelihood = $('input[name="livelihood"]:checked').val();

            // show error if livelihood is not selected
            if (!livelihood) {
                $('#livelihood-error').text('Please select livelihood').css('color', 'red');
                $('#livelihoodyes').addClass('is-invalid');
                $('#livelihoodno').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // Perform additional validation for livelihood if needed

            $('#livelihood-error').empty();
            $('#livelihoodyes').removeClass('is-invalid');
            $('#livelihoodno').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

    });
</script>