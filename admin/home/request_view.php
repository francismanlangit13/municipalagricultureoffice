<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Other</li>
    <li class="breadcrumb-item">Request</li>
    <li class="breadcrumb-item">View</li>
    
</ol>
<form action="code.php" method="POST">
    <div class="row">
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $users = "SELECT
                *
                FROM
                request
                INNER JOIN
                user
                ON 
                request.id = user.user_id
                INNER JOIN
                product
                ON 
                request.product_id = product.product_id
                WHERE
                request.request_id = '$id'";
                
                $users_run = mysqli_query($con, $users);
                if(mysqli_num_rows($users_run) > 0){
                    foreach($users_run as $user){
        ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="border-bottom:0px !important">
                    <h5>View Farmer Request</h5>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Farmer information</h5>
                </div>
                <div class="card-body">
                    
                    <input hidden name="user_id" value="<?=$user['request_id'];?>">
                    <input hidden name="product_id" value="<?=$user['product_id'];?>">
                    <input hidden name="farmer_id" value="<?=$user['id'];?>">
                    <div class="row"> 
                        <div class="col-md-8 mb-3">
                            <label for="reference_number">Reference Number</label>
                            <input disabled type="text" value="<?=$user['reference_number'];?>" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Farmer Picture" style="position:inherit;left:-7px; top:-27px;">Farmer Picture</label>
                            <a <?php
                                    if(isset($user['picture'])){
                                        echo 'href="data:image;base64,' . base64_encode($user['picture']) . '"';
                                    } else { echo 'href="' . base_url . 'assets/img/system/no-image.png"'; }
                                ?> class="link-preview portfolio-lightbox" data-gallery="portfolioGallery">
                                <img class="icon-circle" id="frame" src ="
                                    <?php
                                        if(isset($user['picture'])){
                                            echo 'data:image;base64,'.base64_encode($user['picture']).'';
                                        } else { echo base_url . 'assets/img/system/no-image.png'; }
                                    ?>
                                " alt="Profile Picture" style="height:5rem !important; width:5rem !important; display:inline !important; margin-left:0.4rem;"/>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="Last Name">Last Name</label>
                            <input disabled type="text" value="<?=$user['lname'];?>" class="form-control">
                        </div> 
                    
                        <div class="col-md-3 mb-3">
                            <label for="Middle Name">Middle Name</label>
                            <input disabled type="text" value="<?=$user['mname'];?>" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="First Name">First Name</label>
                            <input disabled type="text" value="<?=$user['fname'];?>" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="suffix">Suffix</label>
                            <input disabled type="text" value="<?=$user['suffix'];?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">   
                            <label for="Purok">Purok</label>
                            <input disabled type="text" value="<?=$user['purok'];?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="Sreet">Street</label>
                            <input disabled type="text" value="<?=$user['street'];?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="Barangay">Barangay</label>
                            <input disabled type="text" value="<?=$user['barangay'];?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="Municipality/City">Municipality/City</label>
                            <input disabled type="text" value="<?=$user['municipality'];?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="Province">Province</label>
                            <input disabled type="text" value="<?=$user['province'];?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="Region">Region</label>
                            <input disabled type="text" value="<?=$user['region'];?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Request information</h5>
                </div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-4 mb-3">
                            <label for="">Request Product</label>
                            <input class="form-control-plaintext" type="text" value="<?= $user['product_name']; ?>" readonly>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="">Request Quantity</label>
                            <input class="form-control-plaintext"  name="quantity"  value="<?=$user['request_quantity']; ?>" readonly>
                        </div>


                        <div class="col-md-12 mb-3">
                            <label for="Description">Description</label>
                            <textarea placeholder="Enter Description" name="editdescription" required   class="form-control-plaintext" readonly rows="5"> <?= $user['description']; ?></textarea>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="">Request Date</label>
                            <input type="datetime" class="form-control-plaintext" type="text" value="<?= $user['request_date']; ?>" readonly>
                        </div>
                    </div>
                            <div class="text-right">
                            <a href="request.php" class="btn btn-danger">Back</a>
                            <button type="submit" name="approve_request" class="btn btn-primary">Approve</button>
                            </div>
                            
                </div>
            </div>
        </div>
        <?php
            } }
            else{
        ?>
            <h4>No Record Found!</h4>
        <?php } } ?>
    </div>
</form>




<?php include('../includes/footer.php');?>