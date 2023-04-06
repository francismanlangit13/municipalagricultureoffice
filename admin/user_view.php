<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>


    <ol class="breadcrumb mb-4">    
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item">Update User Account</li>
    </ol>
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
                                <input disabled  type="text" value="<?=$user['fname'];?>" class="form-control">
                            </div> 
                        
                            <div class="col-md-3 mb-3">
                                <label for="">Middle Name</label>
                                <input disabled type="text" value="<?=$user['mname'];?>"class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="" class="required">Last Name</label>
                                <input disabled  type="text" value="<?=$user['lname'];?>" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="suffix">Suffix</label>
                                <input disabled  type="text" value="<?=$user['suffix'];?>" class="form-control">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="suffix">Gender</label>
                                <input disabled  type="text" value="<?=$user['gender'];?>" class="form-control">
                            </div>

                            <div class="col-md-5 mb-3">
                                <label for="" class="required">Religion</label>
                                <input disabled type="text" value="<?=$user['religion'];?>" class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="date" class="required">Date of Birth</label>
                                <input disabled class="form-control" value="<?=$user['birthday'];?>" placeholder="MM/DD/YYY" type="date"/>
                            </div>

                            <div class="col-md-9 mb-3">
                                <label for="" class="required">Place of Birth</label>
                                <input disabled type="text" value="<?=$user['birthplace'];?>" class="form-control">
                            </div> 

                            <div class="col-md-3 mb-3">
                                <label for="" class="required">Civil Status</label>
                                <input disabled type="text" value="<?=$user['civil_status'];?>" class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="" class="required">Email</label>
                                <input disabled type="email" name="email" value="<?=$user['email'];?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control">
                            </div>
                        
                            <div class="col-md-4 mb-3">
                                <label for="" class="required">Phone Number</label>
                                <input disabled type="text" name="phone" value="<?=$user['phone'];?>" pattern="09[0-9]{9}" maxlength="11" class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="" class="required">Role</label>
                                <?php
                                if ($user['user_type'] == 1) { ?>
                                    <input disabled type="text" value="Admin" class="form-control">
                                <?php } 
                                if ($user['user_type'] == 2) { ?>
                                    <input disabled type="text" value="Staff" class="form-control">
                                <?php } ?>
                            </div>

                            <div class="col-md-6">
                            </div>

                            <div class="col-md-6">
                            </div>

                            <div class="col-md-5 text-center">
                                <br>
                                <h5>Current Picture</h5>
                                <img class="mt-2" id="frame"
                                    <?php
                                        if(isset($user['picture'])){
                                            echo 'src ="data:image;base64,'.base64_encode($user['picture']).'"';
                                        } else { echo 'src ="../assets/img/no-image.png"'; }
                                    ?>
                                alt="Profile Picture" width="240px" height="180px"/>
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
            </div>
        <br>
    </div>

<?php include('includes/footer.php');?>
<script>
    // File upload image preview
    function preview() {
        let image = document.getElementById("frame");
        let fileInput = document.getElementsByName("profilepicture")[0];
        
        if (fileInput.files.length > 0) {
            let file = fileInput.files[0];
            image.src = URL.createObjectURL(file);
        } else {
            image.src = "../assets/img/no-image.png";
        }
    }
</script>