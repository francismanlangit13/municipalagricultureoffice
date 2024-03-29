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
        <div class="d-flex justify-content-between">
            <a href="product_add" class="btn btn-success btn-icon-split"> 
                <span class="icon text-white-50">
                <i class="fas fa-archive"></i>
                </span>
                <span class="text">Add Product</span>
            </a>
            <form method="post" action="code.php">
                <button class="btn btn-success btn-icon-split" type="submit" name="export_product">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-csv"></i>
                    </span>
                    <span class="text">CSV</span>
                </button>
            </form>
        </div>
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
                        <th width="15%">Expiration Date</th>
                        <th width="10%">Status</th>
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
                        product_category.product_category_id = product.product_category_id
                        WHERE product_status != 3";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $row){
                    ?>
                    <tr>
                        <td><?= $row['product_id']; ?></td>
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
                        <td>
                            <?php if($row['exp_date'] < date) { ?>
                                <span style="color:red;"><?= $row['exp_date']; ?><br> Expired</span>
                            <?php } else { ?>
                                <span><?= $row['exp_date'];?></span>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if($row['product_status'] == 1){ ?>
                                <span class="rounded-pill badge badge-success bg-gradient-success px-3">Available</span>
                            <?php } else { ?>
                                <span class="rounded-pill badge badge-danger bg-gradient-danger px-3">Not Available</span>
                            <?php } ?>
                        </td>
                        <td> 
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 mb-1" style="zoom:97%">
                                    <a href="product_view?id=<?=$row['product_id'];?>" class="btn btn-info btn-icon-split"> 
                                        <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                        <span class="text ml-2 mr-2">View</span>
                                    </a>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <a href="product_update?id=<?=$row['product_id'];?>" class="btn btn-success btn-icon-split" style="zoom:97%"> 
                                        <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                        <span class="text">Update</span>
                                    </a>
                                </div>
                                <div class="col-md-12 mb-1" style="zoom:103%;">
                                    <button type="button" data-toggle="modal" value="<?=$row['product_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                    </button>
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

<!-- Modal -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item number <label id="label"></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="code.php" method="POST">
            <input type="hidden" id="delete_id" name="del_product" value="">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script>
    function deleteModal(button) {
        var id = button.value;
        document.getElementById("delete_id").value = id;
        document.getElementById("label").innerHTML = id;
    }
</script>