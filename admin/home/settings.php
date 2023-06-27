<?php
    include('../includes/header.php');
?>
<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Account</li>
    <li class="breadcrumb-item">Update Account</li>
</ol>
<form action="code.php" method="POST" enctype="multipart/form-data"> 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>My Account Information</h5>
                </div>
                <div class="card-body">
                    <h2 hidden><?php echo $_SESSION['auth_user']['user_id']; ?></h2>
                    <?php
                        $user_id = $_SESSION['auth_user']['user_id'];
                        $sql = "SELECT * FROM `user` WHERE user_id=$user_id";
                        $sql_run = mysqli_query($con, $sql);
                        if(mysqli_num_rows($sql_run) > 0){
                        foreach($sql_run as $row){
                    ?>
                    <div class="row"> 
                        <input type="hidden" name="user_id" value="<?=$row['user_id'];?>">
                        <div class="col-md-3 mb-3">
                            <label for="" class="required">First Name</label>
                            <input placeholder="Enter First Name" id="fname" name="fname" value="<?=$row['fname'];?>" class="form-control" required>
                            <div id="fname-error"></div>
                        </div> 
                        <div class="col-md-3 mb-3">
                            <label for="">Middle Name</label>
                            <input placeholder="Enter Middle Name" id="mname" name="mname" value="<?=$row['mname'];?>" class="form-control">
                            <div id="mname-error"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="" class="required">Last Name</label>
                            <input placeholder="Enter Last Name" id="lname" name="lname" value="<?=$row['lname'];?>" class="form-control" required>
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
                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Email</label> 
                            <input placeholder="Enter Email Address" type="email" name="email" value="<?=$row['email'];?>" class="form-control" required id="email-input">
                            <div id="email-error"></div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="password">New Password</label>
                            <input type="password" name="password" class="form-control" minlength="8" placeholder="New Password" id="password">
                            <a href="javascript:void(0)"  style="position: relative; top: -2rem; left: 89%; cursor: pointer; color: lightgray;">
                                <img alt="show password icon" src="<?php echo base_url ?>assets/img/icons/eye-close.png" width="25rem" height="21rem" id="togglePassword">
                            </a>
                            <i style="font-size:0.85rem; margin-left:-1.5rem;">Leave this blank if you dont want to change password...</i>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="password1">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" minlength="8" placeholder="Confirm Password" id="password1">
                            <a href="javascript:void(0)"  style="position: relative; top: -2rem; left: 89%; cursor: pointer; color: lightgray;">
                                <img alt="show password icon" src="<?php echo base_url ?>assets/img/icons/eye-close.png" width="25rem" height="21rem" id="togglePassword1">
                            </a>
                            <div id="cpassword-error" style="margin-top:-1.5rem;"></div>
                        </div>
                        
                        <div class="col-md-6 text-center">
                            <label for="dp">Current Profile:</label>
                            <br>
                            <a href="
                                <?php
                                    if(isset($row['picture'])){
                                        if(!empty($row['picture'])) {
                                            echo base_url . 'assets/img/users/' . $row['picture'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="<?php if($row['user_type'] == 1){ echo"ADMIN: ";} else{ echo"ADMIN: ";} echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?>">
                                <img class="zoom img-fluid img-bordered-sm"
                                src="
                                    <?php
                                        if(isset($row['picture'])){
                                            if(!empty($row['picture'])) {
                                                echo base_url . 'assets/img/users/' . $row['picture'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>
                                " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image">Profile</label>
                            <br>
                            <input type="file" name="image" id="image1" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
                            <input type="text" name="oldimage" value="<?= $row['picture']; ?>" hidden>
                            <div class="text-center">
                                <br>
                                    <img class="zoom img-fluid img-bordered-sm" id="frame1"
                                    src="
                                        <?php
                                            if(isset($row['product_image'])){
                                                echo base_url . 'assets/img/users/' . $row['product_image'];
                                            } else { echo base_url . 'assets/img/system/no-image.png'; }
                                        ?>
                                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                                <br>
                            </div>
                        </div>

                    </div>
                    <div class="text-right">
                        <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                        <button type="submit" name="update_account" id="submit-btn" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                    </div>
                </div>
                <?php
                        }
                    }
                    else{
                ?>
                    <h4>No Record Found!</h4>
                <?php } ?>
            </div>
        </div>
    </div>
</form>
<br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>My Logs</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th width="15%">Type</th>
                                <th width="40%">Log</th>
                                <th width="20%">IP Address</th>
                                <th width="20%">IP Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                $userID = $_SESSION['auth_user'] ['user_id'];
                                $query = "SELECT *, DATE_FORMAT(user_log.date, '%m-%d-%Y %h:%i:%s %p') as date_created
                                FROM
                                user_log
                                INNER JOIN
                                user
                                ON
                                user_log.user_id = user.user_id
                                WHERE user_log.user_id = '$userID'";
                                $query_run = mysqli_query($con, $query);
                                if(mysqli_num_rows($query_run) > 0){
                                    foreach($query_run as $log){
                                    $i++
                            ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $log['type']; ?></td>
                                <td><?= $log['log']; ?></td>
                                <td><?= $log['ip_address']; ?></td>
                                <td><?= $log['date_created']; ?></td>
                            </tr>
                            <?php
                                    }
                                } else{
                            ?>
                                <tr>
                                    <td colspan="6">No Record Found</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>

<?php include('../includes/footer.php');?>

<script>
    // Get references to the password fields and label
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password1');
    const confirmLabel = document.querySelector('label[for="password1"]');
    var cpasswordNameError = document.getElementById("cpassword-error");

    // Function to check if passwords match and update required class
    function checkPasswords() {
        if (passwordInput.value) {
            confirmLabel.classList.add('required');
        } else {
            confirmLabel.classList.remove('required');
        }

        if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordInput.setCustomValidity("Passwords do not match");
            $('#cpassword-error').text('Passwords do not match').css('color', 'red');
            $('#cpassword').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#cpassword-error').empty();
            $('#cpassword-input').removeClass('is-invalid');
            $('#submit-btn').prop('disabled', false);
            confirmPasswordInput.setCustomValidity("");
        }
    }

    // Add event listeners to the password fields
    passwordInput.addEventListener('input', checkPasswords);
    confirmPasswordInput.addEventListener('input', checkPasswords);
</script>

<script>
    $(document).ready(function() {
        // disable submit button by default
        //$('#submit-btn').prop('disabled', true);

        // debounce functions for each input field
        var debouncedCheckEmail = _.debounce(checkEmail, 500);

        // attach event listeners for each input field
        $('#email-input').on('input', debouncedCheckEmail);
        $('#email-input').on('blur', debouncedCheckEmail);

        var initialEmail = $('#email-input').val(); // Store the initial email

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

            if (email !== initialEmail) { // Check if email is different from the initial email
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

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#email-error').is(':empty')) {
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

        // attach event listeners for each input field
        $('#fname').on('input', debouncedCheckFname);
        $('#mname').on('input', debouncedCheckMname);
        $('#lname').on('input', debouncedCheckLname);
        $('#suffix').on('change', debouncedCheckSuffix);

        $('#fname').on('blur', debouncedCheckFname);
        $('#mname').on('blur', debouncedCheckMname);
        $('#lname').on('blur', debouncedCheckLname);
        $('#suffix').on('blur', debouncedCheckSuffix);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#fname-error').is(':empty') && $('#mname-error').is(':empty') && $('#lname-error').is(':empty') && $('#suffix-error').is(':empty')) {
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
        
    });
</script>