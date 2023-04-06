<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>


<div class="container-fluid">
<ol class="breadcrumb mb-4">    
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item">Manage Products</li>
             </ol>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <a href="manage_product_add.php" class="btn btn-success btn-icon-split"> 
                                        <span class="icon text-white-50">
                                        <i class="fas fa-archive"></i>
                                        </span>
                                        <span class="text">Add Product</span>
                                    </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                         <td>Id</td>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Quantity</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Expiration Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            $query = "SELECT
                            product.product_id, 
                            product.product_name, 
                            product.product_image, 
                            product.product_quantity, 
                            product.exp_date, 
                            product_category.category_name, 
                            product.product_status
                        FROM
                            product_category
                            INNER JOIN
                            product
                            ON 
                                product_category.product_category_id = product.product_category_id";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['product_id']; ?></td>
                                        <td><?= $row['product_name']; ?></td>
                                        <td> <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($row['product_image']).'" 
                                        alt="image" style="height: 170px; max-width: 310px; object-fit: cover;">';
                                        ?></td>
                                        <td><?= $row['product_quantity']; ?></td>
                                        <td><?= $row['category_name']; ?></td>
                                        <td><?= $row['product_status']; ?></td>
                                        <td><?= $row['exp_date']; ?></td>
                                        
                                        <td> 
                                            
                                        <div class="dropdown show">
  <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    ACTION
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="manage_product_update.php?id=<?=$row['product_id'];?>">Update</a>
    <form action="code.php" method="post">
<button type="submit" class="dropdown-item" name="del_product" value="<?=$row['product_id'];?>">Delete</button>
</form>
  </div>
</div>

                                </td>
                                    
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                            ?>
                                <tr>
                                    <td colspan="7">No Record Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>






<?php include('includes/footer.php');?>