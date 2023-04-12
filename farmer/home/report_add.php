<?php
    include('../includes/header.php');
?>
<form action="code.php" method="POST" enctype="multipart/form-data">  
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Send a Report</h5>
                </div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-12 mb-3">
                            <label for="Description" class="required">Message</label>
                            <textarea placeholder="Enter Message" name="message" required type="text" class="form-control" rows="3"></textarea>
                        </div>

                        <?php if(isset($_SESSION['auth_user']))  ?>

                        <label for="" hidden="true">user_id</label>
                        <input required type="text" hidden name="user_id" value="<?=  $_SESSION['auth_user']['user_id']; ?>" class="form-control">
                        
                        <div class="col-md-12 mb-3 text-center">                                   
                            <hr> <h5>ADD PICTURE</h5><hr>                                
                        </div>

                        <div class="col-md-4">
                            <label for="image1" class="required">Image</label>
                            <input required type="file" name="photo" class="input-large btn btn-secondary" id="image1" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
                            <br>
                            <img class="mt-3 mb-5" id="frame1" src ="<?php echo base_url ?>assets/img/system/no-image.png" alt="Profile Picture" width="240px" height="180px" style="margin-left:8rem;">
                        </div>

                        <div class="col-md-4">
                            <label for="image2" class="required">Image</label>
                            <input type="file" name="photo1" class="input-large btn btn-secondary" id="image2" accept=".jpg, .jpeg, .png" onchange="previewImage('frame2', 'image2')">
                            <br>
                            <img class="mt-3 mb-5" id="frame2" src ="<?php echo base_url ?>assets/img/system/no-image.png" alt="Profile Picture" width="240px" height="180px" style="margin-left:8rem;">
                        </div>

                        <div class="col-md-4">
                            <label for="image3" class="required">Image</label>
                            <input type="file" name="photo2" class="input-large btn btn-secondary" id="image3" accept=".jpg, .jpeg, .png" onchange="previewImage('frame3', 'image3')">
                            <br>
                            <img class="mt-3 mb-5" id="frame3" src ="<?php echo base_url ?>assets/img/system/no-image.png" alt="Profile Picture" width="240px" height="180px" style="margin-left:8rem;">
                        </div>

                        <div class="col-md-4">
                            <label for="image4" class="required">Image</label>
                            <input type="file" name="photo3" class="input-large btn btn-secondary" id="image4" accept=".jpg, .jpeg, .png" onchange="previewImage('frame4', 'image4')">
                            <br>
                            <img class="mt-3 mb-5" id="frame4" src ="<?php echo base_url ?>assets/img/system/no-image.png" alt="Profile Picture" width="240px" height="180px" style="margin-left:8rem;">
                        </div>

                        <div class="col-md-4">
                            <label for="image5" class="required">Image</label>
                            <input type="file" name="photo4" class="input-large btn btn-secondary" id="image5" accept=".jpg, .jpeg, .png" onchange="previewImage('frame5', 'image5')">
                            <br>
                            <img class="mt-3 mb-5" id="frame5" src ="<?php echo base_url ?>assets/img/system/no-image.png" alt="Profile Picture" width="240px" height="180px" style="margin-left:8rem;">
                        </div>

                        <div class="col-md-4">
                            <label for="dp" class="required">Video</label>
                            <input type="file" name="video" class="input-large btn btn-secondary" id="image6" accept=".mp4, .3gp, .mov" onchange="previewImage('frame6', 'image6')">
                            <br>
                            <video class="mt-3 mb-5" id="frame6" src ="<?php echo base_url ?>assets/img/system/no-video.mp4" alt="Profile Picture" width="240px" height="180px" style="margin-left:8rem;">
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="report.php" class="btn btn-danger">Back</a>
                        <button type="submit" name="add_report" class="btn btn-primary">Add</button>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</form>

<?php include('../includes/footer.php');?>