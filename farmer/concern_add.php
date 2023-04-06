<?php include('authentication.php');?>
<?php include('includes/header.php');?>


<div class="container-fluid px-4">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h5>Send a Concern Message</h5>
                    </div>
                    <div class="card-body">

                    
                    <form action="code.php" method="POST" enctype="multipart/form-data">  
                    <div class="row"> 


                                <div class="col-md-12 mb-3">
                                <label for="Description" class="required">Message</label>
                                <textarea placeholder="Enter Message" name="concern_message" required type="text" class="form-control" rows="3"></textarea>
                                </div>

                                <?php if(isset($_SESSION['auth_user']))  ?>

                                <label for="" hidden="true">user_id</label>
                                    <input required type="text" hidden name="user_id" value="<?=  $_SESSION['auth_user']['user_id']; ?>" class="form-control">
                               
                                    <div class="col-md-6 mt-4">
                                <label for="image" class="required">Image</label>
                                <input type="file" name="pic1" id="image" accept=".jpg, .jpeg, .png" value="" required>
                                </div>

                                <div class="col-md-6 mt-4">
                                <label for="image" class="required">Image </label>
                                <input type="file" name="pic2" id="image" accept=".jpg, .jpeg, .png" value="" required>
                                </div>

                                </div>

                                <div class="text-right">
                                <a href="concern.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="concern_add" class="btn btn-primary">Add</button>
                                </div>
                            

                            </form>
                   

                    </div>
                </div>
            </div>
        </div>
</div>





<?php include('includes/footer.php');?>