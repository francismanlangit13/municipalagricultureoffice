<?php include('authentication.php');?>
<?php include('includes/header.php');?>


<div class="container-fluid px-4">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h5>Update Concern Message</h5>
                    </div>
                    <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];
                            $users = "SELECT * FROM concern WHERE concern_id='$id' ";
                            $users_run = mysqli_query($con, $users);

                            if(mysqli_num_rows($users_run) > 0)
                            {
                                foreach($users_run as $user)
                                {
                             ?>

<form action="code.php" method="POST">  
                    <input type="hidden" name="concern_id" value="<?=$user['concern_id'];?>">
                    <div class="row"> 

                    <div class="col-md-12 mb-3">
                                <label for="Description">Message</label>
                                <textarea placeholder="Enter Message" name="concern_message" required type="text" class="form-control" rows="3"><?= $user['concern_message']; ?></textarea>
                                </div>

                    </div>
                                <div class="text-right">
                                <a href="concern.php" class="btn btn-danger">Back</a>

                                <button type="submit" name="concern_update" class="btn btn-primary">Save</button>
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