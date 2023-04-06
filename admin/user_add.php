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
                                    <input required placeholder="Enter Email" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control">
                                </div>
                            
                                <div class="col-md-4 mb-3">
                                    <label for="" class="required">Phone Number</label>
                                    <input required placeholder="Enter Phone Number" type="text" name="phone" pattern="09[0-9]{9}" maxlength="11" class="form-control">
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
                                    <input required type="file" name="userprofile" class="input-large btn btn-secondary" id="dp" accept=".jpg, .jpeg, .png" onchange="preview()">
                                </div>

                                <div class="col-md-6">
                                </div>

                                <div class="col-md-5 text-center">
                                    <br>
                                    <h5>Current Picture</h5>
                                    <img class="mt-2" id="frame" src ="../assets/img/no-image.png" alt="Profile Picture" width="240px" height="180px"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" name="add_user" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
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