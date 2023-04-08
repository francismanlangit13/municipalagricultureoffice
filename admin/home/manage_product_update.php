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
                    <h5>Add Product</h5>
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
                    <input type="hidden" name="product_id" value="<?=$user['product_id'];?>">
                    <div class="row"> 
                        <div class="col-md-6 mb-3">
                            <label for="" class="required">Name</label>
                            <input required type="text" name="name"  value="<?= $user['product_name']; ?>" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="required">Quantity</label>
                            <input required type="text" name="quantity"  value="<?= $user['product_quantity']; ?>" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <?php
                                $sql = "SELECT * FROM `product_category`";
                                $all_categories = mysqli_query($con,$sql);
                            ?>
                            <label for="" class="required">Category</label>
                            <select class="form-control" name="category">
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
                            <label for="" class="required">Expiration Date</label>
                            <input type="date" name="exp_date" value="<?= $user['exp_date']; ?>" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image" class="required">Product Image</label>
                            <br>
                            <input required type="file" name="product_image" id="image1" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
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
                            <label for="" class="required"><strong>Status</strong></label>
                            <select name="status" required class="form-control">
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
                    <button type="submit" name="update_product" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                </div>
            <br>
        </div>
    </div>
</form>

<?php include('../includes/footer.php');?>