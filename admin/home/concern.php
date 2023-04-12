<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Other</li>
    <li class="breadcrumb-item">Concern</li>
</ol>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 text-center">
        <h2><strong>FARMER'S CONCERN</strong></h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Concern #</th>
                        <th>Name</th>
                        <th>Images</th>
                        <th>Message</th>
                        <th>Date Filed</th>    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT
                        concern.concern_id, 
                        user.lname, 
                        user.mname, 
                        user.fname, 
                        concern.pic1, 
                        concern.pic2, 
                        concern.date_created, 
                        concern.concern_message
                        FROM
                        concern
                        INNER JOIN
                        user
                        ON 
                        concern.user_id = user.user_id";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $row){
                    ?>
                    <tr>
                        <td><?= $row['concern_id']; ?></td>
                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                        <td>
                            <a href="
                                <?php
                                    if(isset($row['photo'])){
                                        if(!empty($row['photo'])) {
                                            echo base_url . 'assets/img/concerns/' . $row['photo'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="FARMER: <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?> <br> REPORT MESSAGE: <?= $row['message']; ?>">
                                <img class="zoom img-fluid img-bordered-sm"
                                src="
                                    <?php
                                        if(isset($row['photo'])){
                                            echo base_url . 'assets/img/concern/' . $row['photo'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; }
                                    ?>
                                " alt="image" style="height: 120px; max-width: 120px; object-fit: cover;">
                            </a>
                        </td>
                        <td><?= $row['concern_message']; ?></td>
                        <td><?= $row['date_created']; ?></td>
                    </tr>
                    <?php
                            }
                        }
                        else{
                    ?>
                        <tr>
                            <td colspan="7">No Record Found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('../includes/footer.php');?>