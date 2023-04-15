<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Accounts</li>
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item">View User Account</li>
</ol>
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
                        <label for="">First Name</label>
                        <input disabled  type="text" value="<?=$row['fname'];?>" class="form-control">
                    </div> 
                
                    <div class="col-md-3 mb-3">
                        <label for="">Middle Name</label>
                        <input disabled type="text" value="<?=$row['mname'];?>"class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Last Name</label>
                        <input disabled  type="text" value="<?=$row['lname'];?>" class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="suffix">Suffix</label>
                        <input disabled  type="text" value="<?=$row['suffix'];?>" class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="suffix">Gender</label>
                        <input disabled  type="text" value="<?=$row['gender'];?>" class="form-control">
                    </div>

                    <div class="col-md-5 mb-3">
                        <label for="">Religion</label>
                        <input disabled type="text" value="<?=$row['religion'];?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="date">Date of Birth</label>
                        <input disabled class="form-control" value="<?=$row['birthday'];?>" placeholder="MM/DD/YYY" type="date"/>
                    </div>

                    <div class="col-md-9 mb-3">
                        <label for="">Place of Birth</label>
                        <input disabled type="text" value="<?=$row['birthplace'];?>" class="form-control">
                    </div> 

                    <div class="col-md-3 mb-3">
                        <label for="">Civil Status</label>
                        <input disabled type="text" value="<?=$row['civil_status'];?>" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="">Email</label>
                        <input disabled type="email" name="email" value="<?=$row['email'];?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control">
                    </div>
                
                    <div class="col-md-4 mb-3">
                        <label for="">Phone Number</label>
                        <input disabled type="text" name="phone" value="<?=$row['phone'];?>" pattern="09[0-9]{9}" maxlength="11" class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="">Role</label>
                        <?php
                        if ($row['user_type'] == 1) { ?>
                            <input disabled type="text" value="Admin" class="form-control">
                        <?php } 
                        if ($row['user_type'] == 2) { ?>
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
                        <a href="
                            <?php
                                if(isset($row['picture'])){
                                    if(!empty($row['picture'])){ 
                                        echo base_url . 'assets/img/users/' . $row['picture'];
                                } else { echo base_url . 'assets/img/system/no-image.png'; } }
                            ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="<?php if($row['user_type'] == 1){ echo"ADMIN: ";} else{ echo"STAFF: ";} echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?>">
                            <img class="zoom img-fluid img-bordered-sm"
                            src="
                                <?php
                                    if(isset($row['picture'])){
                                        if(!empty($row['picture'])){ 
                                            echo base_url . 'assets/img/users/' . $row['picture'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>
                            " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                        </a>
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

<?php include('../includes/footer.php');?>
<script>
    // File upload image preview
    function preview() {
        let image = document.getElementById("frame");
        let fileInput = document.getElementsByName("profilepicture")[0];
        
        if (fileInput.files.length > 0) {
            let file = fileInput.files[0];
            image.src = URL.createObjectURL(file);
        } else {
            image.src = base_url + "assets/img/system/no-image.png";
        }
    }
</script>