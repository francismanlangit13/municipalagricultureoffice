<?php include('authentication.php');?>
<?php include('includes/header.php');?>


<div class="container-fluid px-4">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h5>Edit Request</h5>
                    </div>
                    <div class="card-body">


                    <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT * FROM request WHERE request_id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>

<form action="code.php" method="POST">  
<input type="hidden" name="request_id" value="<?=$user['request_id'];?>">
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
                                    <input required type="text" name="quantity" value="<?=$user['request_quantity'];?>" class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                <label for="Description">Description</label>
                                <textarea placeholder="Enter Description" name="description" required type="text" class="form-control" rows="3"><?=$user['description'];?></textarea>
                                </div>

                                <?php if(isset($_SESSION['auth_user']))  ?>

                                <label for="" hidden="true">user_id</label>
                                    <input required type="text" hidden name="user_id" value="<?=  $_SESSION['auth_user']['user_id']; ?>" class="form-control">

                                </div>

                                <div class="text-right">
                                <a href="request.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="update_request" class="btn btn-primary">Save</button>
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