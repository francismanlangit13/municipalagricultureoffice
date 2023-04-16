<head>
    <?php
        include('../includes/header.php');
    ?>
    <!-- Script QR Code scanner -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Farmer</li>
    <li class="breadcrumb-item">Add Account</li>
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
                            <input required placeholder="Enter Reference Number" type="text" name="reference_number" pattern="\d*" minlength="15" maxlength="15" class="form-control" id="reference_number-input">
                            <div id="reference_number-error"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Last Name</label>
                            <input required placeholder="Enter First Name" type="text" name="lname" class="form-control">
                        </div> 
                    
                        <div class="col-md-3 mb-3">
                            <label for="">Middle Name</label>
                            <input placeholder="Enter Middle Name" type="text" name="mname" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">First Name</label>
                            <input required placeholder="Enter First Name" type="text" name="fname" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="suffix">Suffix</label>
                                <select class="form-control" name="suffix">
                                    <option value="" selected>Select Suffix</option>
                                    <option value="Jr">Jr</option>
                                    <option value="Sr">Sr</option>
                                    <option value="I">I</option>
                                    <option value="II">II</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                    <option value="VI">VI</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Gender</label>
                            <br>
                            <input required class="ml-2" type="radio" name="gender" value="Male"> Male
                            <input required class="ml-2"  type="radio" name="gender" value="Female"> Female
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
                            <input required placeholder="Enter Purok No." type="number" name="purok" pattern="\d*" minlength="1" maxlength="2"  class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Street</label>
                            <input required placeholder="Enter Street" type="text" name="street" class="form-control">
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
                            <input required placeholder="Enter Religion" type="text" name="religion" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="date" class="required">Date of Birth</label>
                            <input required class="form-control" id="date" name="dob" placeholder="MM/DD/YYY" type="date"/>
                        </div>

                        <div class="col-md-9 mb-3">
                            <label for="" class="required">Place of Birth</label>
                            <textarea required placeholder="Enter Place of Birth" type="text" name="placeofbirth" class="form-control"></textarea>
                        </div> 

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Civil Status</label>
                            <select name="civilstatus" required class="form-control">
                                <option value="" selected="true" disabled="disabled">Select Civil Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <hr>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Person with Disability (PWD)</label>
                            <br>
                            <input required class="ml-2" type="radio" name="pwd" value="Yes"> Yes
                            <input required class="ml-2" type="radio" name="pwd" value="No"> No
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">4P's Beneficiary?</label>
                            <br>
                            <input required class="ml-2" type="radio" name="fourps" value="Yes"> Yes
                            <input required class="ml-2" type="radio" name="fourps" value="No"> No
                        </div>

                        <div class="col-md-12 mb-3">
                        <hr>
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="" class="required">Member of an <strong>Indigenous Group</strong>?</label>
                        <br>
                        <input required class="ml-2" type="radio" name="ig" value="Yes"> Yes
                        <input required class="ml-2" type="radio" name="ig" value="No"> No
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="igyes" class="">If yes, specify:</label>
                            <input  placeholder="" type="text" name="igyes" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="" class="required">With <strong>Government ID</strong>?</label>
                        <br>
                        <input required class="ml-2" type="radio" name="govid" value="Yes"> Yes
                        <input required class="ml-2" type="radio" name="govid" value="No"> No
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="govidyes" class="">If yes, specify:</label>
                            <input  placeholder="" type="text" name="govidyes" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                        <label for="" class="required">Member of any <strong>Farmers Association/Cooperative</strong>?</label>
                        <br>
                        <input required class="ml-2" type="radio" name="fac" value="Yes"> Yes
                        <input required class="ml-2"  type="radio" name="fac" value="No"> No
                        </div>

                        
                        <div class="col-md-8 mb-3">
                            <label for="facyes" class="">If yes, specify:</label>
                            <input  placeholder="" type="text" name="facyes" class="form-control">
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
                            <input required  class="ml-4" type="radio" name="livelihood" value="Farmworker" id="option2" onclick="showDiv('div2')"> Farmworker/Laborer
                            <input required  class="ml-4" type="radio" name="livelihood" value="Agri Youth" id="option3" onclick="showDiv('div3')"> Agri Youth
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
                            <input type="file" class="input-large btn btn-secondary" name="image" id="image1" accept=".jpg, .jpeg, .png" value="" onchange="previewImage('frame1', 'image1')" required>
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
    //$('#submit-btn').prop('disabled', true);

    // debounce functions for each input field
    var debouncedCheckEmail = _.debounce(checkEmail, 500);
    var debouncedCheckPhone = _.debounce(checkPhone, 500);
    var debouncedCheckRefNumber = _.debounce(checkRefNumber, 500);

    // attach event listeners for each input field
    $('#email-input').on('input', debouncedCheckEmail);
    $('#phone-input').on('input', debouncedCheckPhone);
    $('#reference_number-input').on('input', debouncedCheckRefNumber);

    function checkEmail() {
        var email = $('#email-input').val();
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
        var phone = $('#phone-input').val();
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
    var reference_number = $('#reference_number-input').val();
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

    function checkIfAllFieldsValid() {
        // check if all input fields are valid and enable submit button if so
        if ($('#email-error').is(':empty') && $('#phone-error').is(':empty') && $('#reference_number-error').is(':empty')) {
            $('#submit-btn').prop('disabled', false);
        }
    }
    });
</script>