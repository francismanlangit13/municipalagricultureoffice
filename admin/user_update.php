<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>


    <ol class="breadcrumb mb-4">    
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">User</li>
        <li class="breadcrumb-item">Update User Account</li>
    </ol>
    <form action="code.php" method="POST" enctype="multipart/form-data" >  
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h5>User Information</h5>
                        </div>
                        <div class="card-body">

                            <?php
                                if(isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $users = "SELECT * FROM user WHERE user_id='$id' ";
                                    $users_run = mysqli_query($con, $users);

                                    if(mysqli_num_rows($users_run) > 0) {
                                        foreach($users_run as $user){
                            ?>

                            <input type="hidden" name="user_id" value="<?=$user['user_id'];?>">
                            <div class="row"> 
                                <div class="col-md-3 mb-3">
                                    <label for="" class="required">First Name</label>
                                    <input required  type="text" name="fname" value="<?=$user['fname'];?>" class="form-control">
                                </div> 
                            
                                <div class="col-md-3 mb-3">
                                    <label for="">Middle Name</label>
                                    <input  type="text" name="mname"   value="<?=$user['mname'];?>"class="form-control">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="" class="required">Last Name</label>
                                    <input required  type="text" name="lname" value="<?=$user['lname'];?>" class="form-control">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="suffix">Suffix</label>
                                        <select class="form-control" name="suffix">
                                            <option value="" selected disabled>Select Suffix</option>
                                            <option value="Jr" <?= isset($user['suffix']) && $user['suffix'] == 'Jr' ? 'selected' : '' ?>>Jr</option>
                                            <option value="Sr" <?= isset($user['suffix']) && $user['suffix'] == 'Sr' ? 'selected' : '' ?>>Sr</option>
                                            <option value="I" <?= isset($user['suffix']) && $user['suffix'] == 'I' ? 'selected' : '' ?>>I</option>
                                            <option value="II" <?= isset($user['suffix']) && $user['suffix'] == 'II' ? 'selected' : '' ?>>II</option>
                                            <option value="III" <?= isset($user['suffix']) && $user['suffix'] == 'III' ? 'selected' : '' ?>>III</option>
                                            <option value="IV" <?= isset($user['suffix']) && $user['suffix'] == 'IV' ? 'selected' : '' ?>>IV</option>
                                            <option value="V" <?= isset($user['suffix']) && $user['suffix'] == 'V' ? 'selected' : '' ?>>V</option>
                                            <option value="VI" <?= isset($user['suffix']) && $user['suffix'] == 'VI' ? 'selected' : '' ?>>VI</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="" class="required">Gender</label>
                                    <br>
                                    <input required class="ml-2" type="radio" name="gender" value="Male" <?php if($user['gender']=="Male") {?> <?php echo "checked";?> <?php }?>> Male
                                    <input required class="ml-2"  type="radio" name="gender" value="Female" <?php if($user['gender']=="Female") {?> <?php echo "checked";?> <?php }?>> Female
                                </div>

                                <div class="col-md-5 mb-3">
                                    <label for="" class="required">Religion</label>
                                    <input required placeholder="Enter Religion" type="text" name="religion" value="<?=$user['religion'];?>" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="date" class="required">Date of Birth</label>
                                    <input required class="form-control" id="date" name="dob" placeholder="MM/DD/YYY" value="<?=$user['birthday'];?>" type="date"/>
                                </div>

                                <div class="col-md-9 mb-3">
                                    <label for="" class="required">Place of Birth</label>
                                    <textarea required value="<?=$user['birthplace'];?>" type="text" name="placeofbirth" class="form-control"><?php echo $user['birthplace']; ?></textarea>
                                </div> 

                                <div class="col-md-3 mb-3">
                                    <label for="" class="required">Civil Status</label>
                                    <select name="civilstatus" required class="form-control">
                                        <option value="" selected="true" disabled="disabled">Select Civil Status</option>
                                        <option value="Single" <?= isset($user['civil_status']) && $user['civil_status'] == 'Single' ? 'selected' : '' ?>>Single</option>
                                        <option value="Married" <?= isset($user['civil_status']) && $user['civil_status'] == 'Married' ? 'selected' : '' ?>>Married</option>
                                        <option value="Widowed" <?= isset($user['civil_status']) && $user['civil_status'] == 'Widowed' ? 'selected' : '' ?>>Widowed</option>
                                        <option value="Separated" <?= isset($user['civil_status']) && $user['civil_status'] == 'Separated' ? 'selected' : '' ?>>Separated</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="required">Email</label>
                                    <input required type="email" name="email" value="<?=$user['email'];?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control">
                                </div>
                            
                                <div class="col-md-4 mb-3">
                                    <label for="" class="required">Phone Number</label>
                                    <input required type="text" name="phone" value="<?=$user['phone'];?>" pattern="09[0-9]{9}" maxlength="11" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="required">Role</label>
                                    <select name="role" required class="form-control">
                                        <option value="" selected disabled>Select Role</option>
                                        <option value="1" <?= isset($user['user_type']) && $user['user_type'] == '1' ? 'selected' : '' ?>>Admin</option>
                                        <option value="2" <?= isset($user['user_type']) && $user['user_type'] == '2' ? 'selected' : '' ?>>Staff</option>
                                    </select>
                                </div>

                                <div class="col-md-5 text-center">
                                    <br>
                                    <h5>User Picture</h5>
                                    <img class="mt-2" id="frame" src ="
                                        <?php
                                            if(isset($user['picture'])){
                                                echo 'data:image;base64,'.base64_encode($user['picture']).'';
                                            } else { echo 'src ="../assets/img/no-image.png"'; }
                                        ?>
                                    " alt="Profile Picture" width="240px" height="180px"/>
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
                    <button type="submit" name="update_user" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                </div>
            <br>
        </div>
    </form>

<?php include('includes/footer.php');?>
<script>
    // File upload image preview
    function preview() {
        let image = document.getElementById("frame");
        let fileInput = document.getElementsByName("userprofile")[0];
        
        if (fileInput.files.length > 0) {
            let file = fileInput.files[0];
            image.src = URL.createObjectURL(file);
        } else {
            image.src = "../assets/img/no-image.png";
        }
    }
</script>