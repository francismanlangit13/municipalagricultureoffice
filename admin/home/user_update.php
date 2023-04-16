<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Accounts</li>
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item">Update User Account</li>
</ol>
<form action="code.php" method="POST" enctype="multipart/form-data" >  
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h5>User information</h5>
                </div>
                <div class="card-body">

                    <?php
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM user WHERE user_id='$id' ";
                            $sql_run = mysqli_query($con, $sql);

                            if(mysqli_num_rows($sql_run) > 0) {
                                foreach($sql_run as $row){
                    ?>

                    <input type="hidden" name="user_id" value="<?=$row['user_id'];?>">
                    <div class="row"> 
                        <div class="col-md-3 mb-3">
                            <label for="" class="required">First Name</label>
                            <input required  type="text" name="fname" value="<?=$row['fname'];?>" class="form-control">
                        </div> 
                    
                        <div class="col-md-3 mb-3">
                            <label for="">Middle Name</label>
                            <input  type="text" name="mname"   value="<?=$row['mname'];?>"class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Last Name</label>
                            <input required  type="text" name="lname" value="<?=$row['lname'];?>" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="suffix">Suffix</label>
                                <select class="form-control" name="suffix">
                                    <option value="" selected disabled>Select Suffix</option>
                                    <option value="Jr" <?= isset($row['suffix']) && $row['suffix'] == 'Jr' ? 'selected' : '' ?>>Jr</option>
                                    <option value="Sr" <?= isset($row['suffix']) && $row['suffix'] == 'Sr' ? 'selected' : '' ?>>Sr</option>
                                    <option value="I" <?= isset($row['suffix']) && $row['suffix'] == 'I' ? 'selected' : '' ?>>I</option>
                                    <option value="II" <?= isset($row['suffix']) && $row['suffix'] == 'II' ? 'selected' : '' ?>>II</option>
                                    <option value="III" <?= isset($row['suffix']) && $row['suffix'] == 'III' ? 'selected' : '' ?>>III</option>
                                    <option value="IV" <?= isset($row['suffix']) && $row['suffix'] == 'IV' ? 'selected' : '' ?>>IV</option>
                                    <option value="V" <?= isset($row['suffix']) && $row['suffix'] == 'V' ? 'selected' : '' ?>>V</option>
                                    <option value="VI" <?= isset($row['suffix']) && $row['suffix'] == 'VI' ? 'selected' : '' ?>>VI</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Gender</label>
                            <br>
                            <input required class="ml-2" type="radio" name="gender" value="Male" <?php if($row['gender']=="Male") {?> <?php echo "checked";?> <?php }?>> Male
                            <input required class="ml-2"  type="radio" name="gender" value="Female" <?php if($row['gender']=="Female") {?> <?php echo "checked";?> <?php }?>> Female
                        </div>

                        <div class="col-md-5 mb-3">
                            <label for="" class="required">Religion</label>
                            <input required placeholder="Enter Religion" type="text" name="religion" value="<?=$row['religion'];?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="date" class="required">Date of Birth</label>
                            <input required class="form-control" id="date" name="dob" placeholder="MM/DD/YYY" value="<?=$row['birthday'];?>" type="date"/>
                        </div>

                        <div class="col-md-9 mb-3">
                            <label for="" class="required">Place of Birth</label>
                            <textarea required value="<?=$row['birthplace'];?>" type="text" name="placeofbirth" class="form-control"><?php echo $row['birthplace']; ?></textarea>
                        </div> 

                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Civil Status</label>
                            <select name="civilstatus" required class="form-control">
                                <option value="" selected="true" disabled="disabled">Select Civil Status</option>
                                <option value="Single" <?= isset($row['civil_status']) && $row['civil_status'] == 'Single' ? 'selected' : '' ?>>Single</option>
                                <option value="Married" <?= isset($row['civil_status']) && $row['civil_status'] == 'Married' ? 'selected' : '' ?>>Married</option>
                                <option value="Widowed" <?= isset($row['civil_status']) && $row['civil_status'] == 'Widowed' ? 'selected' : '' ?>>Widowed</option>
                                <option value="Separated" <?= isset($row['civil_status']) && $row['civil_status'] == 'Separated' ? 'selected' : '' ?>>Separated</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Email</label>
                            <input required type="email" name="email" value="<?=$row['email'];?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="email-input">
                            <div id="email-error"></div>
                        </div>
                    
                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Phone Number</label>
                            <input required type="text" name="phone" value="<?=$row['phone'];?>" pattern="09[0-9]{9}" maxlength="11" class="form-control" id="phone-input">
                            <div id="phone-error"></div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Role</label>
                            <select name="role" required class="form-control">
                                <option value="" selected disabled>Select Role</option>
                                <option value="1" <?= isset($row['user_type']) && $row['user_type'] == '1' ? 'selected' : '' ?>>Admin</option>
                                <option value="2" <?= isset($row['user_type']) && $row['user_type'] == '2' ? 'selected' : '' ?>>Staff</option>
                            </select>
                        </div>
                    </div>

                    <?php
                        }
                        }
                        else {
                    ?>
                            <h4>No Record Found!</h4>
                    <?php
                            }
                        }
                    ?>
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

<?php include('../includes/footer.php');?>

<script>
    $(document).ready(function() {

    // debounce functions for each input field
    var debouncedCheckEmail = _.debounce(checkEmail, 500);
    var debouncedCheckPhone = _.debounce(checkPhone, 500);

    // attach event listeners for each input field
    $('#email-input').on('input', debouncedCheckEmail);
    $('#phone-input').on('input', debouncedCheckPhone);

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

    function checkIfAllFieldsValid() {
        // check if all input fields are valid and enable submit button if so
        if ($('#email-error').is(':empty') && $('#phone-error').is(':empty')) {
        $('#submit-btn').prop('disabled', false);
        }
    }
    });
</script>