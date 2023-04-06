<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>

<div class="container-fluid px-4">
<ol class="breadcrumb mb-4">    
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item">Manage Products</li>
            <li class="breadcrumb-item">Edit Products</li>
             </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h5>Add Product</h5>
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT * FROM product WHERE product_id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>

                    
                    <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">  
                        
                    <input type="hidden" name="product_id" value="<?=$user['product_id'];?>">
                    <div class="row"> 
                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input required type="text" name="name"  value="<?= $user['product_name']; ?>" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="">Quantity</label>
                                    <input required type="text" name="quantity"  value="<?= $user['product_quantity']; ?>" class="form-control">
                                </div>


                                <div class="col-md-6">
                                <label for="image">Image : </label>
                                <input required type="file" name="product_image" id ="image" accept=".jpg, .jpeg, .png" value="">
                                </div>

                                <div class="col-md-6 mb-3">
                                
                                

                                <?php
                                    $sql = "SELECT * FROM `product_category`";
                                    $all_categories = mysqli_query($con,$sql);
                                ?>
                                 <label for="">Category:</label>
                                <select name="category">
                                    <?php
                                        // use a while loop to fetch data
                                        // from the $all_categories variable
                                        // and individually display as an option
                                        while ($category = mysqli_fetch_array(
                                                $all_categories,MYSQLI_ASSOC)):;
                                    ?>
                                        <option value="<?php echo $category["product_category_id"];
                                            // The value we usually set is the primary key
                                        ?>">
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
                                <input type="date" name="exp_date" value="<?= $user['exp_date']; ?>" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for=""><strong>Status</strong></label>
                                    <select name="status" required class="form-control">
                                        <option value="">--Status--</option>
                                        <option value="Available" <?= $user['product_status'] == 'Available' ? 'selected' :'' ?> >Available</option>
                                        <option value="Not Available" <?= $user['product_status'] == 'Not Available' ? 'selected' :'' ?> >Not Available</option>
                                    </select>
                                </div>
                                
                                </div>

                                <div class="text-right">
                                <a href="manage_product.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="update_product" class="btn btn-primary">Save</button>
                                </div>
                               

                            </form>
                   
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