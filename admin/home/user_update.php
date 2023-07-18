<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Accounts</li>
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item">Update</li>
</ol>
<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM user WHERE user_id='$id' AND user_status_id != 3 AND user_type_id != 3";
        $sql_run = mysqli_query($con, $sql);

        if(mysqli_num_rows($sql_run) > 0) {
            foreach($sql_run as $row){
?>
<form action="code.php" method="POST" enctype="multipart/form-data" >  
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h5>User information</h5>
                </div>
                <div class="card-body">
                    <input type="hidden" name="user_id" value="<?=$row['user_id'];?>">
                    <div class="row"> 
                        <div class="col-md-3 mb-3">
                            <label for="" class="required">First Name</label>
                            <input required  type="text" id="fname" name="fname" value="<?=$row['fname'];?>" class="form-control">
                            <div id="fname-error"></div>
                        </div> 
                    
                        <div class="col-md-3 mb-3">
                            <label for="">Middle Name</label>
                            <input  type="text" name="mname" id="mname" value="<?=$row['mname'];?>"class="form-control">
                            <div id="mname-error"></div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Last Name</label>
                            <input required  type="text" id="lname" name="lname" value="<?=$row['lname'];?>" class="form-control">
                            <div id="lname-error"></div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="suffix">Suffix</label>
                                <select class="form-control" id="suffix" name="suffix">
                                    <option value="" selected>Select Suffix</option>
                                    <option value="" <?= isset($row['suffix']) && $row['suffix'] == '' ? 'selected' : '' ?>>None</option>
                                    <option value="Jr" <?= isset($row['suffix']) && $row['suffix'] == 'Jr' ? 'selected' : '' ?>>Jr</option>
                                    <option value="Sr" <?= isset($row['suffix']) && $row['suffix'] == 'Sr' ? 'selected' : '' ?>>Sr</option>
                                    <option value="I" <?= isset($row['suffix']) && $row['suffix'] == 'I' ? 'selected' : '' ?>>I</option>
                                    <option value="II" <?= isset($row['suffix']) && $row['suffix'] == 'II' ? 'selected' : '' ?>>II</option>
                                    <option value="III" <?= isset($row['suffix']) && $row['suffix'] == 'III' ? 'selected' : '' ?>>III</option>
                                    <option value="IV" <?= isset($row['suffix']) && $row['suffix'] == 'IV' ? 'selected' : '' ?>>IV</option>
                                    <option value="V" <?= isset($row['suffix']) && $row['suffix'] == 'V' ? 'selected' : '' ?>>V</option>
                                    <option value="VI" <?= isset($row['suffix']) && $row['suffix'] == 'VI' ? 'selected' : '' ?>>VI</option>
                                </select>
                                <div id="suffix-error"></div>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Gender</label>
                            <br>
                            <input required class="ml-2" type="radio" name="gender" value="Male" <?php if($row['gender']=="Male") {?> <?php echo "checked";?> <?php }?>> Male
                            <input required class="ml-2"  type="radio" name="gender" value="Female" <?php if($row['gender']=="Female") {?> <?php echo "checked";?> <?php }?>> Female
                            <div id="gender-error"></div>
                        </div>

                        <div class="col-md-5 mb-3">
                            <label for="" class="required">Religion</label>
                            <input required placeholder="Enter Religion" type="text" id="religion" name="religion" value="<?=$row['religion'];?>" class="form-control">
                            <div id="religion-error"></div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="date" class="required">Date of Birth</label>
                            <input required class="form-control" id="date" name="dob" placeholder="MM/DD/YYY" value="<?=$row['birthday'];?>" type="date"/>
                            <div id="date-error"></div>
                        </div>

                        <div class="col-md-9 mb-3">
                            <label for="" class="required">Place of Birth</label>
                            <textarea required value="<?=$row['birthplace'];?>" type="text" id="placeofbirth" name="placeofbirth" class="form-control"><?php echo $row['birthplace']; ?></textarea>
                            <div id="placeofbirth-error"></div>
                        </div> 

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Civil Status</label>
                            <select id="civilstatus" name="civilstatus" required class="form-control">
                                <option value="" selected>Select Civil Status</option>
                                <option value="Single" <?= isset($row['civil_status']) && $row['civil_status'] == 'Single' ? 'selected' : '' ?>>Single</option>
                                <option value="Married" <?= isset($row['civil_status']) && $row['civil_status'] == 'Married' ? 'selected' : '' ?>>Married</option>
                                <option value="Widowed" <?= isset($row['civil_status']) && $row['civil_status'] == 'Widowed' ? 'selected' : '' ?>>Widowed</option>
                                <option value="Separated" <?= isset($row['civil_status']) && $row['civil_status'] == 'Separated' ? 'selected' : '' ?>>Separated</option>
                            </select>
                            <div id="civilstatus-error"></div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Email</label>
                            <input required type="email" name="email" value="<?=$row['email'];?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="email-input">
                            <div id="email-error"></div>
                        </div>
                    
                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Phone Number</label>
                            <input required type="text" name="phone" value="<?=$row['phone'];?>" pattern="09[0-9]{9}" maxlength="11" class="form-control" id="phone-input">
                            <div id="phone-error"></div>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="" class="required">Role</label>
                            <select id="role" name="role" required class="form-control">
                                <option value="" selected>Select Role</option>
                                <option value="1" <?= isset($row['user_type_id']) && $row['user_type_id'] == '1' ? 'selected' : '' ?>>Admin</option>
                                <option value="2" <?= isset($row['user_type_id']) && $row['user_type_id'] == '2' ? 'selected' : '' ?>>Staff</option>
                            </select>
                            <div id="role-error"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div style="margin-left:2rem;">
                                <label for="" class="required">User Status (<label id="myValueName"><?php if($row['user_status_id']=="1") { echo "Active"; } else { echo "In active"; } ?></label>)</label>
                                <br>
                                <label class="switch-new" style="margin-left:3.3rem;">
                                    <input type="checkbox" id="mySwitch" <?php if($row['user_status_id']=="1") {?> <?php echo "checked";?> <?php }?>>
                                    <span class="slider-new round-new"></span>
                                </label>
                                <input type="hidden" name="status" id="myValue" value="<?= $row['user_status_id']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
        <div class="text-right">
            <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
            <button type="submit" name="update_user" id="submit-btn" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
        </div>
    <br>
</form>
<?php
        }
    }
    else{
?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>User information</h5>
                </div>
                <div class="card-body">
                    <h4>No Record Found!</h4>
                </div>
            </div>
            <br>
                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            <br>
        </div>
    </div>
<?php } } ?>

<?php include('../includes/footer.php');?>

<script>
  $(document).ready(function() {
    // disable submit button by default
    // $('#submit-btn').prop('disabled', true);

    // debounce functions for each input field
    var debouncedCheckEmail = _.debounce(checkEmail, 500);
    var debouncedCheckPhone = _.debounce(checkPhone, 500);

    // attach event listeners for each input field
    $('#email-input').on('blur', debouncedCheckEmail);
    $('#phone-input').on('blur', debouncedCheckPhone);
    $('#email-input').on('input', debouncedCheckEmail); // Trigger on input change
    $('#phone-input').on('input', debouncedCheckPhone); // Trigger on input change

    function checkEmail() {
        var email = $('#email-input').val();
        var userEmailAddress = "<?php echo $row['email']; ?>"; // Display current user email

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

        if (email !== userEmailAddress) { // Check if email is different from the initial email
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
        } else {
            $('#email-error').empty();
            $('#email-input').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
    }

    function checkPhone() {
        var phone = $('#phone-input').val();
        var userPhone = "<?php echo $row['phone']; ?>"; // Display current user phone

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

        if (phone !== userPhone) { // Check if phone is different from the initial phone
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
        } else {
            $('#phone-error').empty();
            $('#phone-input').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
    }

    function checkIfAllFieldsValid() {
      // check if all input fields are valid and enable submit button if so
      if ($('#email-error').is(':empty') && $('#phone-error').is(':empty')) {
        $('#submit-btn').prop('disabled', false);
      }
    }
    
  });
</script>

<script>
    $(document).ready(function() {
        // disable submit button by default
        // $('#submit-btn').prop('disabled', true);

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
        var debouncedCheckRole = _.debounce(checkRole, 500);

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
        $('#role').on('change', debouncedCheckRole);

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
        $('#role').on('blur', debouncedCheckRole);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#fname-error').is(':empty') && $('#mname-error').is(':empty') && $('#lname-error').is(':empty') && $('#suffix-error').is(':empty') && $('#gender-error').is(':empty') && $('#religion-error').is(':empty') && $('#date-error').is(':empty') && $('#placeofbirth-error').is(':empty') && $('#civilstatus-error').is(':empty') && $('#role-error').is(':empty')) {
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

        function checkRole() {
            var roleSelect = document.getElementById('role');
            var role = roleSelect.value;
            
            // show error if the default option is selected
            if (role === '' && roleSelect.selectedIndex !== 1) {
                $('#role-error').text('Please select a role').css('color', 'red');
                $('#role').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for role if needed
            
            $('#role-error').empty();
            $('#role').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

    });
</script>

<script>
    var mySwitch = document.getElementById("mySwitch");
    var myValue = document.getElementById("myValue");
    var myValueName = document.getElementById("myValueName");
    mySwitch.addEventListener("change", function() {
        if(this.checked) {
            myValue.value = "1";
            myValueName.innerHTML = "Active";
        } else {
            myValue.value = "2";
            myValueName.innerHTML = "In active";
        }
    });
</script>