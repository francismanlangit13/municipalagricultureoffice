<?php 
    include('../includes/header.php');
?>
    
<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Accounts</li>
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item">Add User Account</li>
</ol>
<form action="code.php" method="POST" enctype="multipart/form-data" >  
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h5>User information</h5>
                </div>
                <div class="card-body">

                    <div class="row"> 
                        <div class="col-md-3 mb-3">
                            <label for="" class="required">First Name</label>
                            <input required placeholder="Enter First Name" type="text" name="fname" class="form-control">
                        </div> 
                    
                        <div class="col-md-3 mb-3">
                            <label for="">Middle Name</label>
                            <input placeholder="Enter Middle Name" type="text" name="mname" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Last Name</label>
                            <input required placeholder="Enter Last Name" type="text" name="lname" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="suffix">Suffix</label>
                                <select class="form-control" name="suffix">
                                    <option value="" selected disabled>Select Suffix</option>
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

                        <div class="col-md-5 mb-3">
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

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Email</label>
                            <input required placeholder="Enter Email" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="email-input">
                            <div id="email-error"></div>
                        </div>
                    
                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Phone Number</label>
                            <input required placeholder="Enter Phone Number" type="text" name="phone" pattern="09[0-9]{9}" maxlength="11" class="form-control" id="phone-input">
                            <div id="phone-error"></div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Role</label>
                            <select name="role" required class="form-control">
                                <option value="" selected disabled>Select Role</option>
                                <option value="1">Admin</option>
                                <option value="2">Staff</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="dp" class="required">Profile Picture</label>
                            <input required type="file" name="image" class="input-large btn btn-secondary" id="image1" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
                        </div>

                        <div class="col-md-6">
                        </div>

                        <div class="col-md-5 text-center">
                            <br>
                            <h5>Current Picture</h5>
                            <img class="mt-2" id="frame1" src ="<?php echo base_url ?>assets/img/system/no-image.png" alt="Profile Picture" width="240px" height="180px"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
        <div class="text-right">
            <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
            <button type="submit" name="add_user" id="submit-btn" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
        </div>
    <br>
</form>

<?php include('../includes/footer.php');?>

<script>
    $(document).ready(function() {
    // disable submit button by default
    //$('#submit-btn').prop('disabled', true);

    // debounce functions for each input field
    var debouncedCheckEmail = _.debounce(checkEmail, 500);
    var debouncedCheckPhone = _.debounce(checkPhone, 500);
    //var debouncedCheckRefNumber = _.debounce(checkRefNumber, 500);

    // attach event listeners for each input field
    $('#email-input').on('input', debouncedCheckEmail);
    $('#phone-input').on('input', debouncedCheckPhone);
    //$('#refnumber-input').on('input', debouncedCheckRefNumber);

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

    //   function checkRefNumber() {
    //     var refNumber = $('#refnumber-input').val();
    //     $.ajax({
    //       url: 'ajax.php', // replace with the actual URL to check reference number
    //       method: 'POST', // use the appropriate HTTP method
    //       data: { refnumber: refNumber },
    //       success: function(response) {
    //         if (response.exists) {
    //           $('#refnumber-error').text('Reference number already taken').css('color', 'red');
    //           $('#refnumber-input').addClass('is-invalid');
    //           // disable submit button if reference number is taken
    //           $('#submit-btn').prop('disabled', true);
    //         } else {
    //           $('#refnumber-error').empty();
    //           $('#refnumber-input').removeClass('is-invalid');
    //           // enable submit button if reference number is valid
    //           checkIfAllFieldsValid();
    //         }
    //       },
    //       error: function() {
    //         $('#refnumber-error').text('Error checking reference number');
    //       }
    //     });
    //   }

    function checkIfAllFieldsValid() {
        // check if all input fields are valid and enable submit button if so
        if ($('#email-error').is(':empty') && $('#phone-error').is(':empty')) {
        $('#submit-btn').prop('disabled', false);
        }
    }
    });
</script>