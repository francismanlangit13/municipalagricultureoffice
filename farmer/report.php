<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>


<div class="container-fluid">
    <ol class="breadcrumb mb-4">    
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Report</li>
    </ol>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="report_add.php" class="btn btn-success btn-icon-split"> 
                <span class="icon text-white-50">
                    <i class="fas fa-archive"></i>
                </span>
                <span class="text">Add Report</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Message</th>
                            <th>Photo #1</th>
                            <th>Photo #2</th>
                            <th>Status</th>
                            <th>Date Reported</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(isset($_SESSION['auth_user'])) 
                        $currentUSER = $_SESSION['auth_user']['user_id'];
                        $query = "SELECT
                            report.report_id, 
                            report.message, 
                            report.photo, 
                            report.photo1, 
                            report.status,
                            report.date_created
                            FROM
                            report
                            WHERE
                            report.user_id = $currentUSER";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                    ?>
                                    <tr>
                                    <td><?= $row['report_id']; ?></td>
                                        <td><?= $row['message']; ?></td>
                                        <td> <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($row['photo']).'" 
                                        alt="image" style="height: 170px; max-width: 310px; object-fit: cover;">';
                                        ?></td>
                                        <td>
                                        <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($row['photo1']).'" 
                                        alt="image" style="height: 170px; max-width: 310px; object-fit: cover;">'; ?>
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
                                    
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                            ?>
                                <tr>
                                    <td colspan="7">No Record Found</td>
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