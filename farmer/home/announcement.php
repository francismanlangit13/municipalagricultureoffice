<?php
  include('../includes/header.php');
?>

<div class="col-lg-12 mb-3 mt-3">
  <ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">View Announcement</li>
  </ol>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h3 class="text-center">ANNOUNCEMENT</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width:100%" id="table-desc" hidden>Body</th>
            </tr>
          </thead>
          <tbody>
            <?php
              //$query = "SELECT announcement.*, user.*, DATE_FORMAT(announcement.ann_date, '%m-%d-%Y') as short_date FROM `announcement` INNER JOIN `user` ON announcement.user_id = user.user_id WHERE announcement.ann_date >= DATE_SUB(NOW(), INTERVAL 10 DAY) ORDER BY announcement.ann_date DESC";
              $query = "SELECT announcement.*, user.*, DATE_FORMAT(announcement.ann_date, '%m-%d-%Y') as short_date FROM `announcement` INNER JOIN `user` ON announcement.user_id = user.user_id WHERE ann_status = 'Posted' AND ann_deleted = 0 AND announcement.ann_date <= NOW() ORDER BY announcement.ann_date DESC";
              $query_run = mysqli_query($con, $query);
              $check_announcement = mysqli_num_rows($query_run) > 0;

              if($check_announcement){
                  while($row = mysqli_fetch_array($query_run)){
            ?>
            <tr>
              <td>
                <?php if ($row['short_date'] >= date('m-d-Y', strtotime('-2 days'))){ ?>
                  <div class="card mt-3" style="background-color: aquamarine; border: 1.5px solid #000000 !important; color:black !important;">
                    <div class="card-header" style="display:grid;align-items:center; grid-template-columns:1fr 1fr 0fr; column-gap:5px; background-color:#54f3be;">Title: <?php echo $row['ann_title']; ?>
                      <span class="text-right">Date: <?php echo $row['short_date']; ?></span>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['ann_body']; ?></h5>
                      <br>
                      <p class="card-text">Announced by: <?php echo $row['fname'];?> <?php echo $row['lname'];?></p>
                    </div>
                  </div>
                <?php } elseif ($row['short_date'] >= date('m-d-Y', strtotime('-5 days'))){ ?>
                  <div class="card mt-3" style="background-color: #ffd57f; border: 1.5px solid #000000 !important; color:black !important;">
                    <div class="card-header" style="display:grid;align-items:center; grid-template-columns:1fr 1fr 0fr; column-gap:5px; background-color: #ffcb61a3;">Title: <?php echo $row['ann_title']; ?>
                      <span class="text-right">Date: <?php echo $row['short_date']; ?></span>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['ann_body']; ?></h5>
                      <br>
                      <p class="card-text">Announced by: <?php echo $row['fname'];?> <?php echo $row['lname'];?></p>
                    </div>
                  </div>
                <?php } elseif ($row['short_date'] >= date('m-d-Y', strtotime('-7 days'))){ ?>
                  <div class="card mt-3" style="background-color: #ff947fe6; border: 1.5px solid #000000 !important; color:black !important;">
                    <div class="card-header" style="display:grid;align-items:center; grid-template-columns:1fr 1fr 0fr; column-gap:5px; background-color: #ff947f;">Title: <?php echo $row['ann_title']; ?>
                      <span class="text-right">Date: <?php echo $row['short_date']; ?></span>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['ann_body']; ?></h5>
                      <br>
                      <p class="card-text">Announced by: <?php echo $row['fname'];?> <?php echo $row['lname'];?></p>
                    </div>
                  </div>
                <?php } else{ ?>
                  <div class="card mt-3" style="background-color: #b1b1b196; border: 1.5px solid #000000 !important; color:black !important;">
                    <div class="card-header" style="display:grid;align-items:center; grid-template-columns:1fr 1fr 0fr; column-gap:5px; background-color: #b1b1b1;">Title: <?php echo $row['ann_title']; ?>
                      <span class="text-right">Date: <?php echo $row['short_date']; ?></span>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['ann_body']; ?></h5>
                      <br>
                      <p class="card-text">Announced by: <?php echo $row['fname'];?> <?php echo $row['lname'];?></p>
                    </div>
                  </div>
                <?php } ?>
              </td>
            </tr>
            <?php
                }
              }
              else{
            ?>
              <tr>
                <td colspan="6">No Record Found</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include('../includes/footer.php');?>
<script>
  $(document).ready(function(){
    $('#table-desc').trigger('click');
  });
</script>