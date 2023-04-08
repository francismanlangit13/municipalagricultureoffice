<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>


        <ol class="breadcrumb mb-4">    
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Staff</li>
            <li class="breadcrumb-item">View Staff Account</li>
        </ol>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <h5>Staff Information</h5>
                    </div>
                    <div class="card-body">

                    
                    <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT * FROM user WHERE user_id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>

                  
                    <div class="row"> 

                    <div class="col-md-3 mb-3">
                                    <label for="">First Name</label>
                                    <input required  type="text" value="<?=$user['fname'];?>" class="form-control-plaintext">
                                </div> 
                            

                                <div class="col-md-3 mb-3">
                                    <label for="">Middle Name</label>
                                    <input required  type="text"   value="<?=$user['mname'];?>"class="form-control-plaintext">
                                </div>


                                <div class="col-md-3 mb-3">
                                    <label for="">Last Name</label>
                                    <input required  type="text" value="<?=$user['lname'];?>" class="form-control-plaintext">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="">Email</label>
                                    <input required type="email"  value="<?=$user['email'];?>" class="form-control-plaintext">
                                </div>

                              

                                <div class="col-md-12 mb-3 text-center">                                   
                                <hr> <h5>Profile Picture</h5>  <hr>                                
                                </div>

                                <div class="col-md-12 text-center">
                               
                                <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($user['picture']).'" 
                                        alt="image" style="max-height; max-width: 310px; object-fit: cover;">';
                                        ?>
                                </div>

                                </div>
                                <div class="text-right">
                                <a href="staff.php" class="btn btn-danger">Back</a>

                                <button type="submit" name="add_staff" class="btn btn-primary">Save</button>
                                </div>
                               

                          
                                <?php
                                }
                            }
                            else
                            {
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
        </div>






<?php include('includes/footer.php');?>