<?php
    include('../includes/header.php');
?>


<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Other</li>
    <li class="breadcrumb-item">Report</li>
</ol>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 text-center">
        <h2><strong>REPORT</strong></h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width:5%">No.</th>
                        <th style="width:10%">Refernce Number</th>
                        <th style="width:20%">Full Name</th>
                        <th style="width:30%">Message</th>
                        <th style="width:15%">Date</th>
                        <th style="width:10%">Status</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT
                        *
                        FROM
                        user
                        INNER JOIN report ON report.user_id = user.user_id
                        ";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            $number = 1; // Define a variable to keep track of the iterations
                            foreach($query_run as $row){
                    ?>
                    <tr>
                        <td><?= $number++ ?></td>
                        <td><?= $row['reference_number']; ?></td>
                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                        <td><?= $row['message']; ?></td>
                        <td><?= $row['date_created']; ?></td>
                        <td>
                            <?php if($row['status_id'] == 1){ ?>
                                <span class="rounded-pill badge badge-secondary bg-gradient-secondary px-3">Pending</span>
                            <?php }  else if($row['status_id'] == 2){ ?>
                                <span class="rounded-pill badge badge-success bg-gradient-success px-3">Approved</span>
                            <?php } else { ?>
                                <span class="rounded-pill badge badge-danger bg-gradient-danger px-3">Deny</span>
                            <?php } ?>
                        </td>
                        <td> 
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 mb-1" style="zoom:95%">
                                    <a href="report_view?id=<?=$row['report_id'];?>" class="btn btn-info btn-icon-split"> 
                                        <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                        <span class="text ml-2 mr-2">View</span>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                        else{
                    ?>
                        <tr class="text-center">
                            <td colspan="10">No Record Found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('../includes/footer.php');?>