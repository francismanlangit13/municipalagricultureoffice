<?php include('../includes/header.php');?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item">Update Products</li>
</ol>
<form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">  
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Product information</h5>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $users = "SELECT * FROM product WHERE product_id='$id' ";
                            $users_run = mysqli_query($con, $users);
                            if(mysqli_num_rows($users_run) > 0){
                                foreach($users_run as $user){
                    ?>
                    <div class="row"> 
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input disabled type="text" value="<?= $user['product_name']; ?>" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Quantity</label>
                            <input disabled type="text" value="<?= $user['product_quantity']; ?>" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <?php
                                $sql = "SELECT * FROM `product_category`";
                                $all_categories = mysqli_query($con,$sql);
                            ?>
                            <label for="">Category</label>
                            <select disabled class="form-control form-select">
                                <?php
                                    // use a while loop to fetch data
                                    // from the $all_categories variable
                                    // and individually display as an option
                                    while ($category = mysqli_fetch_array($all_categories,MYSQLI_ASSOC)):;
                                ?>
                                    <option value="<?php echo $category["product_category_id"]; ?>">
                                        <?php echo $category["category_name"];
                                            // To show the category name to the user
                                        ?>
                                    </option>
                                <?php
                                    endwhile;
                                    // While loop must be terminated
                                ?>
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="">Expiration Date</label>
                            <input disabled type="text" value="<?= $user['exp_date']; ?>" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image">Product Image</label>
                            <div class="text-center">
                                <br>
                                <img class="mt-2" id="frame1"
                                        <?php
                                            if(isset($user['product_image'])){
                                                echo 'src ="data:image;base64,'.base64_encode($user['product_image']).'"';
                                            } else { echo 'src ="'.base_url.'assets/img/system/no-image.png"'; }
                                        ?>
                                    alt="Profile Picture" width="240px" height="180px"/>
                                <br>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for=""><strong>Status</strong></label>
                            <select disabled class="form-control form-select">
                                <option value="" selected disabled>Status</option>
                                <option value="Available" <?= $user['product_status'] == 'Available' ? 'selected' :'' ?> >Available</option>
                                <option value="Not Available" <?= $user['product_status'] == 'Not Available' ? 'selected' :'' ?> >Not Available</option>
                            </select>
                        </div>
        
                    </div>
                                                   
                    <?php
                                }
                            }
                        else{
                    ?>
                        <h4>No Record Found!</h4>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <br>
                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            <br>
        </div>
    </div>
</form>

<?php include('../includes/footer.php');?>