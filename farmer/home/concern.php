<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Concern</li>
</ol>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="concern_add" class="btn btn-success btn-icon-split"> 
            <span class="icon text-white-50">
                <i class="fas fa-archive"></i>
            </span>
            <span class="text">Add Concern</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width:5%;">No.</th>
                        <th style="width:45%;">Message</th>
                        <th style="width:25%;">Attachments</th>
                        <th style="width:5%;">Status</th>
                        <th style="width:10%;">Date Submitted</th>
                        <th style="width:10%;">Action</th>
                    </tr>
                </thead>
                <tbody>                 
                    <?php
                        if(isset($_SESSION['auth_user']))
                            $currentUSER = $_SESSION['auth_user']['user_id'];
                            $query = "SELECT * FROM `concern` 
                                      INNER JOIN `user` ON concern.user_id = user.user_id 
                                      WHERE user.user_id = $currentUSER";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row){
                    ?>
                    <tr>
                        <td><?= $row['concern_id']; ?></td>
                        <td><?= $row['message']; ?></td>
                        <td class="text-center">
                        <a href="
                            <?php
                                if(isset($row['photo'])){
                                    if(!empty($row['photo'])) {
                                        echo base_url . 'assets/img/concerns/' . $row['photo'];
                                } } else { echo base_url . 'assets/img/system/no-image.png'; }
                            ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="FARMER: <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?> <br> CONCERN MESSAGE: <?= $row['message']; ?>">
                            <img class="zoom img-fluid img-bordered-sm"
                            src="
                                <?php
                                    if(isset($row['photo'])){
                                        if(!empty($row['photo1'])) {
                                            echo base_url . 'assets/img/concerns/' . $row['photo'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>
                            " alt="image" style="height: 120px; max-width: 120px; object-fit: cover;">
                        </a>
                        </td>

                        <td>
                            <?php if($row['status_id']==1){ ?>
                                <p><span style="color: red;">Pending</span></p>
                            <?php } else{ ?>
                                <p><span style="color: green;">Approved</span></p>
                            <?php } ?>
                        </td>
                        <td><?= $row['date_created']; ?></td>
                        <td> 
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 mb-1" style="zoom:95%">
                                    <a href="concern_view?id=<?=$row['concern_id'];?>" class="btn btn-info btn-icon-split"> 
                                        <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                        <span class="text ml-2 mr-2">View</span>
                                    </a>
                                </div>
                                <?php if($row['status_id']=="1"){ ?>
                                    <div class="col-md-12 mb-1">
                                        <a href="concern_update?id=<?=$row['concern_id'];?>" class="btn btn-success btn-icon-split" style="zoom:95%"> 
                                            <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                            <span class="text">Update</span>
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="col-md-12 mb-1">
                                    <form action="code.php" method="POST" style="zoom:103%;">
                                    <input type="text" name="oldimage" value="<?= $row['photo']; ?>" hidden>
                                        <button type="submit" name="delete_concern" value="<?=$row['report_id'];?>" class="btn btn-danger btn-icon-split" href="#">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </button> 
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

<?php include('../includes/footer.php');?>