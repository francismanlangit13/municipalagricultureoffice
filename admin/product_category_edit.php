<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>

<div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">    
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Product</li>
            <li class="breadcrumb-item">Manage Category</li>
            
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h5>Add Category</h5>
                    </div>
                    <div class="card-body">
                   
                    <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT * FROM product_category WHERE product_category_id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>
            
                    <form action="code.php" method="POST">  
                    <input type="hidden" name="user_id" value="<?=$user['product_category_id'];?>">
                    <div class="row"> 
                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input required placeholder="Enter Category Name" name="editcategory_name" value="<?= $user['category_name']; ?>" class="form-control">
                                </div>


                                <div class="col-md-12 mb-3">
                                <label for="Description">Description</label>
                                <textarea placeholder="Enter Description" name="editdescription" required  value="<?= $user['category_description']; ?>" class="form-control" rows="5"><?= $user['category_description']; ?></textarea>
                                </div>


                                </div>

                                <div class="text-right">
                                <a href="product_category.php" class="btn btn-danger">Back</a>
                                <button type="subamit" name="edit_category" class="btn btn-primary">Save</button>
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