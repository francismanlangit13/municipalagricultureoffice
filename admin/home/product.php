<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item">Manage Products</li>
</ol>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="product_add" class="btn btn-success btn-icon-split"> 
            <span class="icon text-white-50">
            <i class="fas fa-archive"></i>
            </span>
            <span class="text">Add Product</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td width="5%">No.</td>
                        <th width="25%">Product Name</th>
                        <th width="10%">Product Image</th>
                        <th width="5">Quantity</th>
                        <th width="10%">Category</th>
                        <th width="10%">Status</th>
                        <th width="15%">Expiration Date</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT
                        *
                        FROM
                        product_category
                        INNER JOIN
                        product
                        ON 
                        product_category.product_category_id = product.product_category_id";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            $number = 1; // Define a variable to keep track of the iterations
                            foreach($query_run as $row){
                    ?>
                    <tr>
                        <td><?= $number++ ?></td>
                        <td><?= $row['product_name']; ?></td>
                        <td>
                            <a href="
                                <?php
                                    if(isset($row['photo'])){
                                        if(!empty($row['photo'])) {
                                            echo base_url . 'assets/img/products/' . $row['photo'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="PRODUCT: <?php echo $row['product_name'];?>">
                                <img class="zoom img-fluid img-bordered-sm"
                                src="
                                    <?php
                                        if(isset($row['photo'])){
                                            if(!empty($row['photo'])) {
                                                echo base_url . 'assets/img/products/' . $row['photo'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>
                                " alt="image" style="height: 120px; max-width: 120px; object-fit: cover;">
                            </a>
                        </td>
                        <td><?= $row['product_quantity']; ?></td>
                        <td><?= $row['category_name']; ?></td>
                        <td><?php if($row['product_status'] == 1){ echo "Available";} else { echo "Not Available";} ?></td>
                        <td><?= $row['exp_date']; ?></td>
                        <td> 
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 mb-1" style="zoom:95%">
                                    <a href="product_view?id=<?=$row['product_id'];?>" class="btn btn-info btn-icon-split"> 
                                        <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                        <span class="text ml-2 mr-2">View</span>
                                    </a>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <a href="product_update?id=<?=$row['product_id'];?>" class="btn btn-success btn-icon-split"> 
                                        <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                        <span class="text">Update</span>
                                    </a>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <form action="code.php" method="POST" style="zoom:105%;">
                                    <input type="text" name="oldimage" value="<?= $row['photo']; ?>" hidden>
                                        <button type="submit" name="del_product" value="<?=$row['product_id'];?>" class="btn btn-danger btn-icon-split" href="#">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </button> 
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                            }
                        } else{
                    ?>
                        <tr class="text-center">
                            <td colspan="10">No Record Found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('../includes/footer.php');?>