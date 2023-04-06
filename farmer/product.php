<?php include('authentication.php');?>
<?php include('includes/header.php');?>

<div class="container">
<ol class="breadcrumb mb-4">    
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">View Product</li>
</ol>
<h2 class="text-center mb-3">PRODUCT</h2>

            <div class="row"> 
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card-group">
                        <?php
                            $query = "SELECT
                            product.product_id, 
                            product.product_name, 
                            product.product_image, 
                            product.product_quantity, 
                            product_category.category_name, 
                            product.product_status
                        FROM
                            product
                            INNER JOIN
                            product_category
                            ON 
                                product.product_category_id = product_category.product_category_id";
                            $query_run = mysqli_query($con, $query);
                            $product = mysqli_num_rows($query_run) > 0;

                        if($product)
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                            ?>
                            <div class="col-12 col-md-6 col-lg-3 mb-4">
                            <div class="card h-100">
                                <img class="img-fluid card-img-top" src="data:image;base64,<?php echo base64_encode($row['product_image']) ?>"  alt="user-avatar" style= "height:250px; width: 100%; object-fit: cover;">
                                <div class="card-body">
                                    <h3 class="card-title text-center" style="font-size: 22px;"><?php echo $row['product_name']; ?></h3>
                                    <p class="card-text text-center"> <?php echo $row['product_quantity'];?> PCS REMAINING</p>
                                    <p class="card-text text-center"> <?php echo $row['category_name'];?> </p>
                                    
                                 </div>
                                  
                              
                            </div>
                            </div>
                        <?php
                        }
                        }
                        else
                        {
                        echo "Nothing to View";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

<?php include('includes/footer.php');?>

