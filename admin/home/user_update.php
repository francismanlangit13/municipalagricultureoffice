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
        $sql = "SELECT * FROM user WHERE user_id='$id' AND user_status != 3 AND user_type != 3";
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
                                <option value="" selected="true" disabled="disabled">Select Civil Status</option>
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
                                <option value="" selected disabled>Select Role</option>
                                <option value="1" <?= isset($row['user_type']) && $row['user_type'] == '1' ? 'selected' : '' ?>>Admin</option>
                                <option value="2" <?= isset($row['user_type']) && $row['user_type'] == '2' ? 'selected' : '' ?>>Staff</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div style="margin-left:2rem;">
                                <label for="" class="required">User Status (<label id="myValueName"><?php if($row['user_status']=="1") { echo "Active"; } else { echo "In active"; } ?></label>)</label>
                                <br>
                                <label class="switch-new" style="margin-left:3.3rem;">
                                    <input type="checkbox" id="mySwitch" <?php if($row['user_status']=="1") {?> <?php echo "checked";?> <?php }?>>
                                    <span class="slider-new round-new"></span>
                                </label>
                                <input type="hidden" name="status" id="myValue" value="<?= $row['user_status']; ?>">
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
    //$('#submit-btn').prop('disabled', true);

    // debounce functions for each input field
    var debouncedCheckEmail = _.debounce(checkEmail, 500);
    var debouncedCheckPhone = _.debounce(checkPhone, 500);

    // attach event listeners for each input field
    $('#email-input').on('input', debouncedCheckEmail);
    $('#phone-input').on('input', debouncedCheckPhone);

    function checkEmail() {
        var email = $('#email-input').val();

        // check if email format is valid
        var emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i;
        if (!emailPattern.test(email)) {
            $('#email-error').text('Invalid email format').css('color', 'red');
            $('#email-input').addClass('is-invalid');
            checkIfAllFieldsValid();
            return;
        }

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

        // check if phone number format is valid
        var phoneNumberPattern = /^09[0-9]{9}$/;
        if (!phoneNumberPattern.test(phone)) {
            $('#phone-error').text('Invalid phone number format').css('color', 'red');
            $('#phone-input').addClass('is-invalid');
            checkIfAllFieldsValid();
            return;
        }

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

    function checkIfAllFieldsValid() {
      // check if all input fields are valid and enable submit button if so
      if ($('#email-error').is(':empty') && $('#phone-error').is(':empty')) {
        $('#submit-btn').prop('disabled', false);
      }
    }

    // Additional code from the second script block
    $('#email-input').on('blur', function() {
      if ($('#email-input').val().trim() === '') {
        $('#email-error').text('Please input email').css('color', 'red');
        $('#email-input').addClass('is-invalid');
        $('#submit-btn').prop('disabled', true);
      } else {
        $('#email-error').empty();
        $('#email-input').removeClass('is-invalid');
        // enable submit button if email is inputted.
        checkIfAllFieldsValid();
      }
    });

    $('#phone-input').on('blur', function() {
      if ($('#phone-input').val().trim() === '') {
        $('#phone-error').text('Please input phone number').css('color', 'red');
        $('#phone-input').addClass('is-invalid');
        $('#submit-btn').prop('disabled', true);
      } else {
        $('#phone-error').empty();
        $('#phone-input').removeClass('is-invalid');
        // enable submit button if phone number is inputted.
        checkIfAllFieldsValid();
      }
    });
  });
</script>

<script>
    var firstNameInput = document.getElementById("fname");
    var firstNameError = document.getElementById("fname-error");
    var middleNameInput = document.getElementById("mname");
    var middleNameError = document.getElementById("mname-error");
    var lastNameInput = document.getElementById("lname");
    var lastNameError = document.getElementById("lname-error");
    var suffixSelect = document.getElementById("suffix");
    var suffixNameError = document.getElementById("suffix-error");
    var religionNameInput = document.getElementById("religion");
    var religionNameError = document.getElementById("religion-error");
    var placeofbirthNameInput = document.getElementById("placeofbirth");
    var placeofbirthNameError = document.getElementById("placeofbirth-error");

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

    function checkIfAllFieldsValid() {
      // check if all input fields are valid and enable submit button if so
      if ($('#fname-error').is(':empty') && $('#lname-error').is(':empty') && $('#suffix-error').is(':empty') && $('#religion-error').is(':empty') && $('#placeofbirth-error').is(':empty')) {
        $('#submit-btn').prop('disabled', false);
      }
    }
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