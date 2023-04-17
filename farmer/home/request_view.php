<?php include('../includes/header.php'); ?>
<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Request</li>
    <li class="breadcrumb-item">View Request</li>
</ol>
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Request information</h5>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $users = "SELECT * FROM request WHERE request_id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0){
                                foreach($users_run as $user){
                    ?>
                    <div class="row"> 
                        <div class="col-md-6 mb-3">
                            <?php
                                $sql = "SELECT * FROM `product`";
                                $all_categories = mysqli_query($con,$sql);
                            ?>
                            <label for="">Product:</label>
                            <select disabled class="form-control">
                                <?php
                                    // use a while loop to fetch data
                                    // from the $all_categories variable
                                    // and individually display as an option
                                    while ($category = mysqli_fetch_array(
                                            $all_categories,MYSQLI_ASSOC)):;
                                ?>
                                    <option value="<?php echo $category["product_id"];
                                        // The value we usually set is the primary key
                                    ?>">
                                        <?php echo $category["product_name"];
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
                            <label for="">Quantity</label>
                            <input disabled type="text" value="<?=$user['request_quantity'];?>" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="Description">Description</label>
                            <textarea placeholder="Enter Description" disabled type="text" class="form-control" rows="3"><?=$user['description'];?></textarea>
                        </div>
                    </div>
                    <?php
                            }
                        }
                        else{
                    ?>
                        <h4>No Record Found!</h4>
                    <?php } } ?>
                </div>
            </div>
            <br>
                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            <br>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>