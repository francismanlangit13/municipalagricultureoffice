<?php
    include('../includes/header.php');
?>
<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Report</li>
    <li class="breadcrumb-item">Add Report</li>
</ol>
<form action="code.php" method="POST" enctype="multipart/form-data">  
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Report information</h5>
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

                        <div class="col-md-4 mb-3" style="display:grid;">
                            <label for="image1" id="image1-label">Image1</label>
                            <input required type="file" name="photo" class="input-large btn btn-secondary" id="image1" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
                            <br>
                            <img class="mt-3 mb-5" id="frame1" src ="<?php echo base_url ?>assets/img/system/no-image.png" alt="Profile Picture" width="240px" height="180px" style="justify-self:center;">
                        </div>

                        <div class="col-md-4 mb-3" style="display:grid;">
                            <label for="image2" id="image2-label">Image2</label>
                            <input type="file" name="photo1" class="input-large btn btn-secondary" id="image2" accept=".jpg, .jpeg, .png" onchange="previewImage('frame2', 'image2')">
                            <br>
                            <img class="mt-3 mb-5" id="frame2" src ="<?php echo base_url ?>assets/img/system/no-image.png" alt="Profile Picture" width="240px" height="180px" style="justify-self:center;">
                        </div>

                        <div class="col-md-4 mb-3" style="display:grid;">
                            <label for="image3" id="image3-label">Image3</label>
                            <input type="file" name="photo2" class="input-large btn btn-secondary" id="image3" accept=".jpg, .jpeg, .png" onchange="previewImage('frame3', 'image3')">
                            <br>
                            <img class="mt-3 mb-5" id="frame3" src ="<?php echo base_url ?>assets/img/system/no-image.png" alt="Profile Picture" width="240px" height="180px" style="justify-self:center;">
                        </div>

                        <div class="col-md-4 mb-3" style="display:grid;">
                            <label for="image4" id="image4-label">Image4</label>
                            <input type="file" name="photo3" class="input-large btn btn-secondary" id="image4" accept=".jpg, .jpeg, .png" onchange="previewImage('frame4', 'image4')">
                            <br>
                            <img class="mt-3 mb-5" id="frame4" src ="<?php echo base_url ?>assets/img/system/no-image.png" alt="Profile Picture" width="240px" height="180px" style="justify-self:center;">
                        </div>

                        <div class="col-md-4 mb-3" style="display:grid;">
                            <label for="image5" id="image5-label">Image5</label>
                            <input type="file" name="photo4" class="input-large btn btn-secondary" id="image5" accept=".jpg, .jpeg, .png" onchange="previewImage('frame5', 'image5')">
                            <br>
                            <img class="mt-3 mb-5" id="frame5" src ="<?php echo base_url ?>assets/img/system/no-image.png" alt="Profile Picture" width="240px" height="180px" style="justify-self:center;">
                        </div>

                        <div class="col-md-4 mb-3" style="display:grid;">
                            <label for="image6" id="image6-label">Video</label>
                            <input type="file" name="video" class="input-large btn btn-secondary" id="image6" accept=".mp4, .3gp, .mov" onchange="previewImage('frame6', 'image6')">
                            <br>
                            <video class="mt-3 mb-5" id="frame6" src ="<?php echo base_url ?>assets/img/system/no-video.mp4" alt="Profile Picture" width="240px" height="180px" style="justify-self:center;">
                        </div>
                    </div>
                    <div class="text-right">
                      <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                      <button type="submit" name="add_report" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include('../includes/footer.php');?>

<script>
  var fileInput1 = document.getElementById('image1');
  var label1 = document.getElementById('image1-label');
  fileInput1.addEventListener('change', function() {
    if (fileInput1.value) {
      label1.classList.add('required');
      fileInput1.required = true;
    } else {
      label1.classList.remove('required');
      fileInput1.required = false;
    }
  });

  var fileInput2 = document.getElementById('image2');
  var label2 = document.getElementById('image2-label');
  fileInput2.addEventListener('change', function() {
    if (fileInput2.value) {
      label2.classList.add('required');
      fileInput2.required = true;
    } else {
      label2.classList.remove('required');
      fileInput2.required = false;
    }
  });

  var fileInput3 = document.getElementById('image3');
  var label3 = document.getElementById('image3-label');
  fileInput3.addEventListener('change', function() {
    if (fileInput3.value) {
      label3.classList.add('required');
      fileInput3.required = true;
    } else {
      label3.classList.remove('required');
      fileInput3.required = false;
    }
  });

  var fileInput4 = document.getElementById('image4');
  var label4 = document.getElementById('image4-label');
  fileInput4.addEventListener('change', function() {
    if (fileInput4.value) {
      label4.classList.add('required');
      fileInput4.required = true;
    } else {
      label4.classList.remove('required');
      fileInput4.required = false;
    }
  });

  var fileInput5 = document.getElementById('image5');
  var label5 = document.getElementById('image5-label');
  fileInput5.addEventListener('change', function() {
    if (fileInput5.value) {
      label5.classList.add('required');
      fileInput5.required = true;
    } else {
      label5.classList.remove('required');
      fileInput5.required = false;
    }
  });

  var fileInput6 = document.getElementById('image6');
  var label6 = document.getElementById('image6-label');
  fileInput6.addEventListener('change', function() {
    if (fileInput6.value) {
      label6.classList.add('required');
      fileInput6.required = true;
    } else {
      label6.classList.remove('required');
      fileInput6.required = false;
    }
  });
</script>