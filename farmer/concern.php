<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>


<div class="container-fluid">
    <ol class="breadcrumb mb-4">    
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Concern</li>
    </ol>
                    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="concern_add.php" class="btn btn-success btn-icon-split"> 
                <span class="icon text-white-50">
                    <i class="fas fa-archive"></i>
                </span>
                <span class="text">Add Concern</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Message</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Date Submitted</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                                        
                        <?php

                            if(isset($_SESSION['auth_user'])) 
                            $currentUSER = $_SESSION['auth_user']['user_id'];
                            $query = "SELECT * FROM `concern` WHERE user_id= $currentUSER";
                            $query_run = mysqli_query($con, $query);
                                if(mysqli_num_rows($query_run) > 0){
                                    foreach($query_run as $row){
                        ?>
                                <tr>
                                    <td><?= $row['concern_id']; ?></td>
                                        <td><?= $row['concern_message']; ?></td>
                                        <td class="text-center">

<?php 
echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($row['pic1']).'" 
alt="image" style="height: 170px; max-width: 310px; object-fit: cover;">';
?>

<?php 
echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($row['pic2']).'" 
alt="image" style="height: 170px; max-width: 310px; object-fit: cover;">';
?>

</td>

<td>
<?php 
                                                          if($row['status']=="Pending"){
                                                              ?>
                                                               <p><span style="color: red;">Pending</span></p>
                                                              <?php
                                                          }else{
                                                              ?>
                                                                 <p><span style="color: green;">Approved</span></p>
                                                              <?php
                                                          }
                                                        ?>
</td>
                                        <td><?= $row['date_created']; ?></td>
                                    <td>
                                    <div class="btn-group">
  <button type="button" class="btn btn-success dropdown-toggle" <?php if ($row['status'] == 'Approved') echo 'disabled'; ?> data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="concern_update.php?id=<?=$row['concern_id'];?>">UPDATE</a>
    <form action="code.php" method="post"> 
    <button class="dropdown-item" type="submit" name="delete_concern" value="<?= $row['concern_id']; ?>" >DELETE</button>
    </form> 
  </div>
</div>
                                    </td>
                                </tr>
                            <?php } } else{ ?>
                                    <tr>
                                        <td colspan="7">No Record Found</td>
                                    </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>






<?php include('includes/footer.php');?>