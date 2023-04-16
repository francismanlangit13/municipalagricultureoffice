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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Message</th>
                        <th>Photo #1</th>
                        <th>Photo #2</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT
                        report.report_id,
                        user.fname,
                        user.mname,
                        user.lname,
                        user.suffix,
                        report.message,
                        report.photo,
                        report.photo1,
                        report.date_created,
                        report.status_id
                        FROM
                        user
                        INNER JOIN report ON report.user_id = user.user_id
                        ";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $row){
                    ?>
                    <tr>
                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                        <td><?= $row['message']; ?></td>
                        <td>
                            <a href="
                                <?php
                                    if(isset($row['photo'])){
                                        echo base_url . 'assets/img/reports/' . $row['photo'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; }
                                ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="FARMER: <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?> <br> REPORT MESSAGE: <?= $row['message']; ?>">
                                <img class="zoom img-fluid img-bordered-sm"
                                src="
                                    <?php
                                        if(isset($row['photo'])){
                                            if(!empty($row['photo'])) {
                                                echo base_url . 'assets/img/reports/' . $row['photo'];
                                        } } else { echo base_url . 'assets/img/system/no-image.png'; }
                                    ?>
                                " alt="image" style="height: 120px; max-width: 120px; object-fit: cover;">
                            </a>
                        </td>
                        <td>
                            <a href="
                                <?php
                                    if(isset($row['photo1'])){
                                        if(!empty($row['photo1'])) {
                                            echo base_url . 'assets/img/reports/' . $row['photo1'];
                                    } } else { echo base_url . 'assets/img/system/no-image.png'; }
                                ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="FARMER: <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?> <br> REPORT MESSAGE: <?= $row['message']; ?>">
                                <img class="zoom img-fluid img-bordered-sm"
                                src="
                                    <?php
                                        if(isset($row['photo1'])){
                                            echo base_url . 'assets/img/reports/' . $row['photo1'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; }
                                    ?>
                                " alt="image" style="height: 120px; max-width: 120px; object-fit: cover;">
                            </a>
                        </td>
                        <td><?= $row['date_created']; ?></td>
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