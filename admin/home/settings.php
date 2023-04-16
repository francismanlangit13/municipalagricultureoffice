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
                        <div class="col-md-4 mb-3">
                            <label for="" class="required">First Name</label>
                            <input placeholder="Enter First Name" name="fname" value="<?=$row['fname'];?>" class="form-control" required>
                        </div> 
                        <div class="col-md-4 mb-3">
                            <label for="">Middle Name</label>
                            <input placeholder="Enter Middle Name" name="mname" value="<?=$row['mname'];?>" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="" class="required">Last Name</label>
                            <input placeholder="Enter Last Name" name="lname" value="<?=$row['lname'];?>" class="form-control" required>
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
                                ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="<?php if($row['user_type'] == 1){ echo"ADMIN: ";} else{ echo"STAFF: ";} echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?>">
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

<?php include('../includes/footer.php');?>

<script>
  // Get references to the password fields and label
  const passwordInput = document.getElementById('password');
  const confirmPasswordInput = document.getElementById('password1');
  const confirmLabel = document.querySelector('label[for="password1"]');

  // Function to check if passwords match and update required class
  function checkPasswords() {
    if (passwordInput.value) {
      confirmLabel.classList.add('required');
    } else {
      confirmLabel.classList.remove('required');
    }

    if (passwordInput.value !== confirmPasswordInput.value) {
      confirmPasswordInput.setCustomValidity("Passwords do not match");
    } else {
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

    function checkIfAllFieldsValid() {
        // check if all input fields are valid and enable submit button if so
        if ($('#email-error').is(':empty')) {
        $('#submit-btn').prop('disabled', false);
        }
    }
    });
</script>