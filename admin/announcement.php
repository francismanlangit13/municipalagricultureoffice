<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>


<div class="container-fluid">
<ol class="breadcrumb mb-4">    
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Other</li>
            <li class="breadcrumb-item">Announcement</li>
             </ol>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <a href="announcement_add.php" class="btn btn-success btn-icon-split"> 
                                        <span class="icon text-white-50">
                                        <i class="fas fa-bullhorn"></i>
                                        </span>
                                        <span class="text">Add Announcement</span>
                                    </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Body</th>
                                            <th>Publish</th>
                                            <th>Status</th>
                                            <th>Date Announced</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            $query = "SELECT
                            announcement.*
                        FROM
                            announcement
                        WHERE ann_status = 'Pending'";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['ann_id']; ?></td>
                                        <td><?= $row['ann_title']; ?></td>
                                        <td><?= $row['ann_body']; ?></td>
                                        <td><?= $row['ann_publish']; ?></td>
                                        <td><?= $row['ann_status']; ?></td>
                                        <td><?= $row['ann_date']; ?></td>
                                        
                                        <td class="text-center">    

                                        <div class="dropdown ">
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 ACTIONS
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    
    <form action="code.php" method="POST">  
    <button type="submit" name="ann_post" value="<?=$row['ann_id']; ?>" class="dropdown-item" href="#"> POST
    </button> 
    <button type="submit" name="ann_delete" value="<?=$row['ann_id']; ?>" class="dropdown-item" href="#"> DELETE
    </button>  
</form> 
  </div>
</div>         
                                </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                            ?>
                                <tr>
                                    <td colspan="6">No Record Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>




<?php include('includes/footer.php');?>