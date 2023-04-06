<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>

<div class="container-fluid px-4">
<ol class="breadcrumb mb-4">    
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item">Manage Products</li>
            <li class="breadcrumb-item">Add Products</li>
             </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h5>Add Product</h5>
                    </div>
                    <div class="card-body">

                    
                    <form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">  
                    <div class="row"> 
                                <div class="col-md-6 mb-3">
                                    <label for="" class="required">Name</label>
                                    <input required type="text" name="name" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="required">Quantity</label>
                                    <input required type="number" name="quantity" class="form-control">
                                </div>

                                <div class="col-md-6">
                                <label for="image" class="required">Image </label>
                                <input type="file" name="product_image" id="image" accept=".jpg, .jpeg, .png" value="">
                                </div>

                                <div class="col-md-6 mb-3">

                                <?php
                                    $sql = "SELECT * FROM `product_category`";
                                    $all_categories = mysqli_query($con,$sql);
                                ?>
                                 <label for="" class="required">Category</label>
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
                                <label for="" class="required">Expiration Date</label>
                                <input type="date" required name="exp_date" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                <label for="" class="required">Status</label>
                                    <select name="status" required class="form-control">
                                        <option value="">--Select Status--</option>
                                        <option value="Available">Available</option>
                                        <option value="Not Available">Not Available</option>
                                    </select>
                                </div>

                                </div>

                                <div class="text-right">
                                <a href="manage_product.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="add_product" class="btn btn-primary">Add</button>
                                </div>
                               

                            </form>
                   

                    </div>
                </div>
            </div>
        </div>
    </div>






<?php include('includes/footer.php');?>