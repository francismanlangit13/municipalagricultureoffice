<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>

<div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">    
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Product</li>
            <li class="breadcrumb-item">Request</li>
            <li class="breadcrumb-item">View</li>
            
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
                            $users = "SELECT
                            request.request_id, 
                            farmer.fname, 
                            farmer.mname, 
                            farmer.lname, 
                            request.id, 
                            product.product_id,
                            product.product_name, 
                            request.request_quantity, 
                            request.description, 
                            request.request_date, 
                            request.request_status
                        FROM
                            request
                            INNER JOIN
                            farmer
                            ON 
                                request.id = farmer.user_id
                            INNER JOIN
                            product
                            ON 
                                request.product_id = product.product_id
                        WHERE
                            request.request_id = '$id'";
                            
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>
            
                    <form action="code.php" method="POST">  
                    <input hidden name="user_id" value="<?=$user['request_id'];?>">
                    <input hidden name="product_id" value="<?=$user['product_id'];?>">
                    <input hidden name="farmer_id" value="<?=$user['id'];?>">
                    <div class="row"> 
                                <div class="col-md-4 mb-3">
                                <label for="">Name</label>
                                    <input class="form-control-plaintext" type="text" value="<?= $user['fname']; ?> <?= $user['mname']; ?> <?= $user['lname']; ?>" readonly>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="">Request Product</label>
                                    <input class="form-control-plaintext" type="text" value="<?= $user['product_name']; ?>" readonly>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="">Request Quantity</label>
                                    <input class="form-control-plaintext"  name="quantity"  value="<?=$user['request_quantity']; ?>" readonly>
                                </div>


                                <div class="col-md-12 mb-3">
                                <label for="Description">Description</label>
                                <textarea placeholder="Enter Description" name="editdescription" required   class="form-control-plaintext" readonly rows="5"> <?= $user['description']; ?></textarea>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="">Request Date</label>
                                    <input type="datetime" class="form-control-plaintext" type="text" value="<?= $user['request_date']; ?>" readonly>
                                </div>


                                </div>

                                <div class="text-right">
                                <a href="request.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="approve_request" class="btn btn-primary">Approve</button>
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