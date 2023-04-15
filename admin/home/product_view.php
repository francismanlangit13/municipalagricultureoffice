<?php include('../includes/header.php');?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item">View Products</li>
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
                    <div class="row"> 
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input disabled type="text" value="<?= $row['product_name']; ?>" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Quantity</label>
                            <input disabled type="text" value="<?= $row['product_quantity']; ?>" class="form-control">
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
                            <input disabled type="text" value="<?= $row['exp_date']; ?>" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image">Product Image</label>
                            <div class="text-center">
                                <br>
                                <a href="
                                    <?php
                                        if(isset($row['photo'])){
                                            if(!empty($row['photo'])) {
                                                echo base_url . 'assets/img/products/' . $row['photo'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="PRODUCT IMAGE1">
                                    <img class="zoom img-fluid img-bordered-sm"
                                    src="
                                        <?php
                                            if(isset($row['photo'])){
                                                if(!empty($row['photo'])) {
                                                    echo base_url . 'assets/img/products/' . $row['photo'];
                                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                        ?>
                                    " alt="image" style="height: 120px; max-width: 180px; object-fit: cover; margin-top:0.5rem;">
                                </a>
                                <a href="
                                    <?php
                                        if(isset($row['photo1'])){
                                            if(!empty($row['photo1'])) {
                                                echo base_url . 'assets/img/products/' . $row['photo1'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="PRODUCT IMAGE2">
                                    <img class="zoom img-fluid img-bordered-sm"
                                    src="
                                        <?php
                                            if(isset($row['photo1'])){
                                                if(!empty($row['photo1'])) {
                                                    echo base_url . 'assets/img/products/' . $row['photo1'];
                                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                        ?>
                                    " alt="image" style="height: 120px; max-width: 180px; object-fit: cover; margin-top:0.5rem;">
                                </a>
                                <a href="
                                    <?php
                                        if(isset($row['photo2'])){
                                            if(!empty($row['photo2'])) {
                                                echo base_url . 'assets/img/products/' . $row['photo2'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="PRODUCT IMAGE3">
                                    <img class="zoom img-fluid img-bordered-sm"
                                    src="
                                        <?php
                                            if(isset($row['photo2'])){
                                                if(!empty($row['photo2'])) {
                                                    echo base_url . 'assets/img/products/' . $row['photo2'];
                                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                        ?>
                                    " alt="image" style="height: 120px; max-width: 180px; object-fit: cover; margin-top:0.5rem;">
                                </a>
                                <a href="
                                    <?php
                                        if(isset($row['photo3'])){
                                            if(!empty($row['photo3'])) {
                                                echo base_url . 'assets/img/products/' . $row['photo3'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="PRODUCT IMAGE4">
                                    <img class="zoom img-fluid img-bordered-sm"
                                    src="
                                        <?php
                                            if(isset($row['photo3'])){
                                                if(!empty($row['photo3'])) {
                                                    echo base_url . 'assets/img/products/' . $row['photo3'];
                                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                        ?>
                                    " alt="image" style="height: 120px; max-width: 180px; object-fit: cover; margin-top:0.5rem;">
                                </a>
                                <br>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for=""><strong>Status</strong></label>
                            <select disabled class="form-control form-select">
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
                </div>
            <br>
        </div>
    </div>
</form>

<?php include('../includes/footer.php');?>