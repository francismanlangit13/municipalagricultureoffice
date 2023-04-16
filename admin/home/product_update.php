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
                            $sql = "SELECT * FROM product WHERE product_id='$id' ";
                            $sql_run = mysqli_query($con, $sql);
                            if(mysqli_num_rows($sql_run) > 0){
                                foreach($sql_run as $row){
                    ?>
                    <input type="hidden" name="product_id" value="<?=$row['product_id'];?>">
                    <div class="row"> 
                        <div class="col-md-6 mb-3">
                            <label for="" class="required">Name</label>
                            <input required type="text" name="name"  value="<?= $row['product_name']; ?>" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="required">Quantity</label>
                            <input required type="text" name="quantity"  value="<?= $row['product_quantity']; ?>" class="form-control">
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
                            <input type="date" required name="exp_date" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?= $row['exp_date']; ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image1" id="image1-label">Product Image1</label>
                            <br>
                            <input type="file" name="photo" id="image1" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
                            <input type="text" name="oldimage" value="<?= $row['photo']; ?>" hidden>
                            <div class="text-center">
                                <br>
                                <a href="
                                    <?php
                                        if(isset($row['photo'])){
                                            if(!empty($row['photo'])){ 
                                                echo base_url . 'assets/img/products/' . $row['photo'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="PRODUCT IMAGE1">
                                    <img class="zoom img-fluid img-bordered-sm" id="frame1"
                                    src="
                                        <?php
                                            if(isset($row['photo'])){
                                                if(!empty($row['photo'])) {
                                                    echo base_url . 'assets/img/products/' . $row['photo'];
                                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                        ?>
                                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                                </a>
                                <br>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image2" id="image2-label" class="">Product Image2</label>
                            <br>
                            <input type="file" name="photo1" id="image2" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame2', 'image2')">
                            <input type="text" name="oldimage1" value="<?= $row['photo1']; ?>" hidden>
                            <div class="text-center">
                                <br>
                                <a href="
                                    <?php
                                        if(isset($row['photo1'])){
                                            if(!empty($row['photo1'])){ 
                                                echo base_url . 'assets/img/products/' . $row['photo1'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="PRODUCT IMAGE2">
                                    <img class="zoom img-fluid img-bordered-sm" id="frame2"
                                    src="
                                        <?php
                                            if(isset($row['photo1'])){
                                                if(!empty($row['photo1'])) {
                                                    echo base_url . 'assets/img/products/' . $row['photo1'];
                                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                        ?>
                                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                                </a>
                                <br>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image3" id="image3-label">Product Image3</label>
                            <br>
                            <input type="file" name="photo2" id="image3" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame3', 'image3')">
                            <input type="text" name="oldimage2" value="<?= $row['photo2']; ?>" hidden>
                            <div class="text-center">
                                <br>
                                <a href="
                                    <?php
                                        if(isset($row['photo2'])){
                                            if(!empty($row['photo2'])){ 
                                                echo base_url . 'assets/img/products/' . $row['photo2'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="PRODUCT IMAGE3">
                                    <img class="zoom img-fluid img-bordered-sm" id="frame3"
                                    src="
                                        <?php
                                            if(isset($row['photo2'])){
                                                if(!empty($row['photo2'])) {
                                                    echo base_url . 'assets/img/products/' . $row['photo2'];
                                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                        ?>
                                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                                </a>
                                <br>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image4" id="image4-label">Product Image4</label>
                            <br>
                            <input type="file" name="photo3" id="image4" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame4', 'image4')">
                            <input type="text" name="oldimage3" value="<?= $row['photo3']; ?>" hidden>
                            <div class="text-center">
                                <br>
                                <a href="
                                    <?php
                                        if(isset($row['photo3'])){
                                            if(!empty($row['photo3'])){ 
                                                echo base_url . 'assets/img/products/' . $row['photo3'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="PRODUCT IMAGE4">
                                    <img class="zoom img-fluid img-bordered-sm" id="frame4"
                                    src="
                                        <?php
                                            if(isset($row['photo3'])){
                                                if(!empty($row['photo3'])) {
                                                    echo base_url . 'assets/img/products/' . $row['photo3'];
                                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                        ?>
                                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                                </a>
                                <br>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="required"><strong>Status</strong></label>
                            <select name="status" required class="form-control">
                                <option value="" selected disabled>Status</option>
                                <option value="Available" <?= $row['product_status'] == 'Available' ? 'selected' :'' ?> >Available</option>
                                <option value="Not Available" <?= $row['product_status'] == 'Not Available' ? 'selected' :'' ?> >Not Available</option>
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

<script>
  var fileInput1 = document.getElementById('image1');
  var label1 = document.getElementById('image1-label');
  fileInput1.addEventListener('change', function() {
    if (fileInput1.value) {
      label1.classList.add('required');
      fileInput1.required = true;
    } else {
      label1.classList.remove('required');
      fileInput1.required = false;
    }
  });

  var fileInput2 = document.getElementById('image2');
  var label2 = document.getElementById('image2-label');
  fileInput2.addEventListener('change', function() {
    if (fileInput2.value) {
      label2.classList.add('required');
      fileInput2.required = true;
    } else {
      label2.classList.remove('required');
      fileInput2.required = false;
    }
  });

  var fileInput3 = document.getElementById('image3');
  var label3 = document.getElementById('image3-label');
  fileInput3.addEventListener('change', function() {
    if (fileInput3.value) {
      label3.classList.add('required');
      fileInput3.required = true;
    } else {
      label3.classList.remove('required');
      fileInput3.required = false;
    }
  });

  var fileInput4 = document.getElementById('image4');
  var label4 = document.getElementById('image4-label');
  fileInput4.addEventListener('change', function() {
    if (fileInput4.value) {
      label4.classList.add('required');
      fileInput4.required = true;
    } else {
      label4.classList.remove('required');
      fileInput4.required = false;
    }
  });
</script>