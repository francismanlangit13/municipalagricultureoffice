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
                        <th>Attachments</th>
                        <th>Status</th>
                        <th>Date Submitted</th>
                        <th>Action</th>
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
                        <a href="
                            <?php
                                if(isset($row['photo1'])){
                                    if(!empty($row['photo1'])) {
                                        echo base_url . 'assets/img/concerns/' . $row['photo1'];
                                } } else { echo base_url . 'assets/img/system/no-image.png'; }
                            ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="FARMER: <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?> <br> CONCERN MESSAGE: <?= $row['message']; ?>">
                            <img class="zoom img-fluid img-bordered-sm"
                            src="
                                <?php
                                    if(isset($row['photo1'])){
                                        if(!empty($row['photo1'])) {
                                            echo base_url . 'assets/img/concerns/' . $row['photo1'];
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
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" <?php if ($row['status_id'] == 'Approved') echo 'disabled'; ?> data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<?php include('../includes/footer.php');?>