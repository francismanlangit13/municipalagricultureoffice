<?php include('authentication.php');?>
<?php include('includes/header.php');?>


<div class="container-fluid px-4">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h5>Request Product</h5>
                    </div>
                    <div class="card-body">

                    
                    <form action="code.php" method="POST">  
                    <div class="row"> 

                        <div class="col-md-6 mb-3">

                                <?php
                                    $sql = "SELECT * FROM `product`";
                                    $all_categories = mysqli_query($con,$sql);
                                ?>
                                 <label for="">Product:</label>
                                <select name="product" required class="form-control">
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
                                    <input required type="text" name="quantity" class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                <label for="Description">Description</label>
                                <textarea placeholder="Enter Description" name="description" required type="text" class="form-control" rows="3"></textarea>
                                </div>

                                <?php if(isset($_SESSION['auth_user']))  ?>

                                <label for="" hidden="true">user_id</label>
                                    <input required type="text" hidden name="user_id" value="<?=  $_SESSION['auth_user']['user_id']; ?>" class="form-control">

                                </div>

                                <div class="text-right">
                                <a href="request.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="add_request" class="btn btn-primary">Save</button>
                                </div>
                            

                            </form>
                   

                    </div>
                </div>
            </div>
        </div>
</div>





<?php include('includes/footer.php');?>