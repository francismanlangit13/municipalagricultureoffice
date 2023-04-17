<?php
    include('../includes/header.php');
?>
<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Concern</li>
    <li class="breadcrumb-item">View Concern</li>
</ol>  
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
          <h5>Concern information</h5>
      </div>
      <div class="card-body">
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
          concern.concern_id = '$id'";
          
          $sql_run = mysqli_query($con, $sql);
          if(mysqli_num_rows($sql_run) > 0){
              foreach($sql_run as $row){
        ?>
        <div class="row"> 
          <div class="col-md-12 mb-3">
              <label for="Description">Message</label>
              <textarea placeholder="Enter Message" name="message" disabled type="text" class="form-control" rows="3"><?=$row['message']; ?></textarea>
          </div>
          
          <div class="col-md-12 mb-3 text-center">                                   
              <hr> <h5>Attachments</h5><hr>                                
          </div>

          <div class="col-md-4 mb-3">
            <label for="image1" id="image1-label">Image1</label>
            <br>
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
          <?php
              } }
              else{
          ?>
              <h4>No Record Found!</h4>
          <?php } } ?>
        </div>
      </div>
    </div>
    <br>
      <div class="text-right">
        <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
      </div>
    <br>
  </div>
</div>

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