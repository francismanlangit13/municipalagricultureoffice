<?php
    include('../includes/header.php');
?>
<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Concern</li>
    <li class="breadcrumb-item">Update Concern</li>
</ol>
<?php
  if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = "SELECT
  *
  FROM
  concern
  INNER JOIN
  user
  ON 
  concern.user_id = user.user_id
  WHERE
  concern.concern_id = '$id' AND concern_status != 2";
  
  $sql_run = mysqli_query($con, $sql);
  if(mysqli_num_rows($sql_run) > 0){
      foreach($sql_run as $row){
?>
<?php 
  $request_date_timestamp = strtotime($row['date_created']);
  
  // Format $user['request_date'] and the current date as "Y-m-d H:i:s"
  $request_date = date("Y-m-d H:i:s", $request_date_timestamp);
  $current_date = date("Y-m-d H:i:s", strtotime("-10 minutes")); // set 10 minutes can update the information.
  
  // Check if $user['request_date'] is greater than the current date
  if($request_date > $current_date){
?>
<form action="code.php" method="POST" enctype="multipart/form-data">  
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <h5>Concern information</h5>
        </div>
        <div class="card-body">
          <div class="row"> 
            <input type="hidden" name="concern_id" value="<?=$row['concern_id'];?>">
            <div class="col-md-12 mb-3">
                <label for="Title" class="required">Title</label>
                <input required type="text" id="title" name="title" value="<?=$row['title'];?>" class="form-control">
                <div id="title-error"></div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="Description" class="required">Message</label>
                <textarea placeholder="Enter Message" id="message" name="message" required type="text" class="form-control" rows="3"><?=$row['message']; ?></textarea>
                <div id="message-error"></div>
            </div>

            <label for="" hidden="true">user_id</label>
            <input required type="text" hidden name="user_id" value="<?=  $_SESSION['auth_user']['user_id']; ?>" class="form-control">
            
            <div class="col-md-12 mb-3 text-center">                                   
                <hr> <h5>Attachments</h5><hr>                                
            </div>

            <div class="col-md-4 mb-3">
              <label for="image1" id="image1-label">Image1</label>
              <br>
              <input type="file" name="photo" id="image1" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
              <input type="text" name="oldimage" value="<?= $row['photo']; ?>" hidden>
              <div class="text-center">
                <br>
                <a href="
                    <?php
                        if(isset($row['photo'])){
                            if(!empty($row['photo'])){ 
                                echo base_url . 'assets/img/concerns/' . $row['photo'];
                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="REPORT IMAGE1">
                    <img class="zoom img-fluid img-bordered-sm" id="frame1"
                    src="
                        <?php
                            if(isset($row['photo'])){
                                if(!empty($row['photo'])) {
                                    echo base_url . 'assets/img/concerns/' . $row['photo'];
                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                        ?>
                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                </a>
                <br>
              </div>
            </div>

            <div class="col-md-4 mb-3">
              <label for="image2" id="image2-label">Image2</label>
              <br>
              <input type="file" name="photo1" id="image2" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame2', 'image2')">
              <input type="text" name="oldimage1" value="<?= $row['photo1']; ?>" hidden>
              <div class="text-center">
                <br>
                <a href="
                    <?php
                        if(isset($row['photo1'])){
                            if(!empty($row['photo1'])){ 
                                echo base_url . 'assets/img/concerns/' . $row['photo1'];
                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="REPORT IMAGE2">
                    <img class="zoom img-fluid img-bordered-sm" id="frame2"
                    src="
                        <?php
                            if(isset($row['photo1'])){
                                if(!empty($row['photo1'])) {
                                    echo base_url . 'assets/img/concerns/' . $row['photo1'];
                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                        ?>
                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                </a>
                <br>
              </div>
            </div>

            <div class="col-md-4 mb-3">
              <label for="image3" id="image3-label">Image3</label>
              <br>
              <input type="file" name="photo2" id="image3" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame3', 'image3')">
              <input type="text" name="oldimage2" value="<?= $row['photo2']; ?>" hidden>
              <div class="text-center">
                <br>
                <a href="
                    <?php
                        if(isset($row['photo2'])){
                            if(!empty($row['photo2'])){ 
                                echo base_url . 'assets/img/concerns/' . $row['photo2'];
                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="REPORT IMAGE3">
                    <img class="zoom img-fluid img-bordered-sm" id="frame3"
                    src="
                        <?php
                            if(isset($row['photo2'])){
                                if(!empty($row['photo2'])) {
                                    echo base_url . 'assets/img/concerns/' . $row['photo2'];
                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                        ?>
                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                </a>
                <br>
              </div>
            </div>

            <div class="col-md-4 mb-3">
              <label for="image4" id="image4-label">Image4</label>
              <br>
              <input type="file" name="photo3" id="image4" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame4', 'image4')">
              <input type="text" name="oldimage3" value="<?= $row['photo3']; ?>" hidden>
              <div class="text-center">
                <br>
                <a href="
                    <?php
                        if(isset($row['photo3'])){
                            if(!empty($row['photo3'])){ 
                                echo base_url . 'assets/img/concerns/' . $row['photo3'];
                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="REPORT IMAGE4">
                    <img class="zoom img-fluid img-bordered-sm" id="frame4"
                    src="
                        <?php
                            if(isset($row['photo3'])){
                                if(!empty($row['photo3'])) {
                                    echo base_url . 'assets/img/concerns/' . $row['photo3'];
                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                        ?>
                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                </a>
                <br>
              </div>
            </div>

            <div class="col-md-4 mb-3">
              <label for="image5" id="image5-label">Image5</label>
              <br>
              <input type="file" name="phot4" id="image5" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame5', 'image5')">
              <input type="text" name="oldimage4" value="<?= $row['photo4']; ?>" hidden>
              <div class="text-center">
                <br>
                <a href="
                    <?php
                        if(isset($row['photo4'])){
                            if(!empty($row['photo4'])){ 
                                echo base_url . 'assets/img/concerns/' . $row['photo4'];
                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="REPORT IMAGE5">
                    <img class="zoom img-fluid img-bordered-sm" id="frame5"
                    src="
                        <?php
                            if(isset($row['photo4'])){
                                if(!empty($row['photo4'])) {
                                    echo base_url . 'assets/img/concerns/' . $row['photo4'];
                            } else { echo base_url . 'assets/img/system/no-image.png'; } }
                        ?>
                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                </a>
                <br>
              </div>
            </div>

            <div class="col-md-4 mb-3">
              <label for="image6" id="image6-label">Video</label>
              <br>
              <input type="file" name="video" id="image6" class="form-control-file btn btn-secondary" accept=".mp4, .3gp, .mov" onchange="previewImage('frame6', 'image6')">
              <input type="text" name="oldimage5" value="<?= $row['video']; ?>" hidden>
              <div class="text-center">
                <br>
                <a href="
                    <?php
                        if(isset($row['video'])){
                            if(!empty($row['video'])){ 
                                echo base_url . 'assets/img/concerns/' . $row['video'];
                        } else { echo base_url . 'assets/img/system/no-video.mp4'; } }
                    ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="REPORT VIDEO">
                    <video class="zoom img-fluid img-bordered-sm" id="frame6"
                    src="
                        <?php
                            if(isset($row['video'])){
                                if(!empty($row['video'])) {
                                    echo base_url . 'assets/img/concerns/' . $row['video'];
                            } else { echo base_url . 'assets/img/system/no-video.mp4'; } }
                        ?>
                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                </a>
                <br>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
        <div class="text-right">
          <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
          <button type="submit" name="update_concern" id="submit-btn" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
        </div>
      <br>
    </div>
  </div>
</form>
<?php } else { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Concern information</h5>
                </div>
                <div class="card-body">
                    No Record Found!
                </div>
            </div>
        </div>
    </div>
    <br>
        <div class="text-right">
            <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    <br>
<?php } ?>
<?php
        }
    }
    else{
?>
    <h4>No Record Found!</h4>
<?php } } ?>

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

<script>
    $(document).ready(function() {
        // disable submit button by default
        // $('#submit-btn').prop('disabled', true);

        // debounce functions for each input field
        var debouncedCheckTitle = _.debounce(checkTitle, 500);
        var debouncedCheckMessage = _.debounce(checkMessage, 500);

        // attach event listeners for each input field
        $('#title').on('input', debouncedCheckTitle);
        $('#message').on('input', debouncedCheckMessage);

        $('#title').on('blur', debouncedCheckTitle);
        $('#message').on('blur', debouncedCheckMessage);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#title-error').is(':empty') && $('#message-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            } else {
                $('#submit-btn').prop('disabled', true);
            }
        }

        function checkTitle() {
            var title = $('#title').val().trim();
            
            // show error if title is empty
            if (title === '') {
                $('#title-error').text('Please input title').css('color', 'red');
                $('#title').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for title if needed
            
            $('#title-error').empty();
            $('#title').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkMessage() {
            var message = $('#message').val().trim();
            
            // show error if message is empty
            if (message === '') {
                $('#message-error').text('Please input message').css('color', 'red');
                $('#message').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for message if needed
            
            $('#message-error').empty();
            $('#message').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
    });
</script>