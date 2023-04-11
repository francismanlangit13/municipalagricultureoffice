<?php
  include('../includes/header.php');
?>

<div class="col-lg-12 mb-3 mt-3">
  <ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">View Announcement</li>
  </ol>
  <h2 class="text-center">ANNOUNCEMENT</h2>
    <?php
      $query = "SELECT * FROM `announcement`";
      $query_run = mysqli_query($con, $query);
      $check_announcement = mysqli_num_rows($query_run) > 0;

      if($check_announcement){
          while($row = mysqli_fetch_array($query_run)){
    ?>
  <div class="card mt-3">
    <div class="card-header" style="display:grid;align-items:center; grid-template-columns:1fr 1fr 0fr; column-gap:5px;">Title: <?php echo $row['ann_title']; ?>
      <span class="text-right">Date: <?php echo $row['ann_date']; ?></span>
    </div>
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['ann_body']; ?></h5>
      <br>
      <p class="card-text">By: <?php echo $row['ann_publish'];?></p>
    </div>
  </div>
  <?php
        }
    }
    else{
        echo "No Announcement";
    }
  ?>
</div>


<?php include('../includes/footer.php');?>