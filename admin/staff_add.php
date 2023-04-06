<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>


        <ol class="breadcrumb mb-4">    
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Account</li>
            <li class="breadcrumb-item">Staff</li>
            <li class="breadcrumb-item">Add Account</li>
        </ol>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                    <h5>Staff Information</h5>
                    </div>
                    <div class="card-body">

                    <form action="code.php" method="POST" enctype="multipart/form-data" >  
                    <div class="row"> 

                    <div class="col-md-4 mb-3">
                                    <label for="">First Name</label>
                                    <input required placeholder="Enter First Name" type="text" name="fname" class="form-control">
                                </div> 
                            

                                <div class="col-md-4 mb-3">
                                    <label for="">Middle Name</label>
                                    <input required placeholder="Enter Middle Name" type="text" name="mname" class="form-control">
                                </div>


                                <div class="col-md-4 mb-3">
                                    <label for="">Last Name</label>
                                    <input required placeholder="Enter Last Name" type="text" name="lname" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Email</label>
                                    <input required placeholder="Enter Email Address" type="email" name="email" class="form-control">
                                </div>

                                
                                <div class="col-md-6 mb-3">
                                  
                                </div>

                                <div class="col-md-12 mb-3 text-center">                                   
                                <hr> <h5>DOCUMENT</h5>  <hr>                                
                                </div>

                               
                                <div class="col-md-12">
                                <label for="dp">Profile:</label>
                                <br>
                                <input type="file" name="userprofile" id="dp" accept=".jpg, .jpeg, .png">
                                </div>

                                </div>
                                <div class="text-right">
                                <a href="staff.php" class="btn btn-danger">Back</a>

                                <button type="submit" name="add_staff" class="btn btn-primary">Save</button>
                                </div>
                               

                            </form>


                    </div>
                    </div>
                </div>
            </div>
        </div>






<?php include('includes/footer.php');?>