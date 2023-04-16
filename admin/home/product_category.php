<?php 
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Product</li>
    <li class="breadcrumb-item">Product Category</li>
</ol>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="product_category_add" class="btn btn-success btn-icon-split"> 
            <span class="icon text-white-50">
                <i class="fas fa-clipboard-list"></i>
            </span>
            <span class="text">Add Category</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th width="25%">Category Name</th>
                        <th width="60%">Description</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT *, 
                        product_category.*
                        FROM
                        product_category";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            $number = 1; // Define a variable to keep track of the iterations
                            foreach($query_run as $row){
                    ?>
                    <tr>
                        <td><?= $number++ ?></td>
                        <td><?= $row['category_name']; ?></td>
                        <td><?= $row['category_description']; ?></td>
                        <td> 
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 mb-1" style="zoom:95%">
                                    <a href="product_category_view?id=<?=$row['product_category_id'];?>" class="btn btn-info btn-icon-split"> 
                                        <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                        <span class="text ml-2 mr-2">View</span>
                                    </a>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <a href="product_category_update?id=<?=$row['product_category_id'];?>" class="btn btn-success btn-icon-split"> 
                                        <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                        <span class="text">Update</span>
                                    </a>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <form action="code.php" method="POST" style="zoom:105%;">  
                                        <button type="submit" name="category_delete" value="<?=$row['product_category_id']; ?>" class="btn btn-danger btn-icon-split" href="#">
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
                        <tr>
                            <td colspan="6">No Record Found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>





<?php include('../includes/footer.php');?>