<?php include('../includes/header.php');?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item">Add Product</li>
</ol>
<form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Product information</h5>
                </div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-6 mb-3">
                            <label for="" class="required">Name</label>
                            <input required type="text" name="name" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="required">Quantity</label>
                            <input required type="number" name="quantity" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <?php
                                $sql = "SELECT * FROM `product_category`";
                                $all_categories = mysqli_query($con,$sql);
                            ?>
                            <label for="" class="required">Category</label>
                            <select required class="form-control" name="category">
                                <option value="" selected disabled>Select Category</option>
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
                            <input type="date" required name="exp_date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image" class="required">Product Image1</label>
                            <br>
                            <input required type="file" name="photo" id="image1" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
                            <div class="text-center">
                                <br>
                                    <img class="zoom img-fluid img-bordered-sm" id="frame1"
                                    src="
                                        <?php
                                            echo base_url . 'assets/img/system/no-image.png';
                                        ?>
                                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                                <br>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image" class="required">Product Image2</label>
                            <br>
                            <input required type="file" name="photo1" id="image2" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame2', 'image2')">
                            <input type="text" name="oldimage1" value="<?= $row['photo1']; ?>" hidden>
                            <div class="text-center">
                                <br>
                                    <img class="zoom img-fluid img-bordered-sm" id="frame2"
                                    src="
                                        <?php
                                            echo base_url . 'assets/img/system/no-image.png';
                                        ?>
                                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                                <br>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image" class="required">Product Image3</label>
                            <br>
                            <input required type="file" name="photo2" id="image3" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame3', 'image3')">
                            <input type="text" name="oldimage2" value="<?= $row['photo2']; ?>" hidden>
                            <div class="text-center">
                                <br>
                                    <img class="zoom img-fluid img-bordered-sm" id="frame3"
                                    src="
                                        <?php
                                            echo base_url . 'assets/img/system/no-image.png';
                                        ?>
                                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                                <br>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image" class="required">Product Image4</label>
                            <br>
                            <input required type="file" name="photo3" id="image4" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame4', 'image4')">
                            <input type="text" name="oldimage3" value="<?= $row['photo3']; ?>" hidden>
                            <div class="text-center">
                                <br>
                                    <img class="zoom img-fluid img-bordered-sm" id="frame4"
                                    src="
                                        <?php
                                            echo base_url . 'assets/img/system/no-image.png';
                                        ?>
                                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                                <br>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <br>
                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" name="add_product" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                </div>
            <br>
        </div>
    </div>
</form>

<?php include('../includes/footer.php');?>