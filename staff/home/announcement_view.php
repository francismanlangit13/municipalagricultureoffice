<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Other</li>
    <li class="breadcrumb-item">Announcement</li>
    <li class="breadcrumb-item">View</li>
</ol>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $users = "SELECT announcement.*, user.*, DATE_FORMAT(announcement.ann_date, '%m-%d-%Y %h:%i:%s %p') as short_date 
        FROM announcement 
        INNER JOIN user ON announcement.user_id = user.user_id 
        WHERE ann_id='$id' AND ann_status != 'Archive' AND ann_deleted != 1";
        $users_run = mysqli_query($con, $users);
        if(mysqli_num_rows($users_run) > 0){
            foreach($users_run as $user){
?> 
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Announcement information</h5>
            </div>
            <div class="card-body">
                <div class="row"> 
                    <div class="col-md-12 mb-3">
                        <label for="">Title</label>
                        <input disabled type="text" class="form-control" value="<?=$user['ann_title'];?>">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="Description">Body</label>
                        <textarea disabled type="text" class="form-control" rows="3"><?= $user['ann_body']; ?></textarea>
                    </div>

                    <?php if($user['ann_status'] == 'Posted'){ ?>
                        <div class="col-md-4 mb-3">
                            <label for="">Date and Time Announced</label>
                            <input disabled type="date-local" class="form-control" value="<?=$user['short_date'];?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Announced by</label>
                            <input disabled type="text" class="form-control" value="<?= $user['fname']; ?> <?= $user['lname']; ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Status</label>
                            <input disabled type="text" class="form-control" value="Posted">
                        </div>
                    <?php } else{ ?>
                        <div class="col-md-6 mb-3">
                            <label for="">Status</label>
                            <input disabled type="text" class="form-control" value="Pending">
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <br>
            <div class="text-right">
                <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        <br>
    </div>
</div>
<?php
        }
    }
    else{
?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Announcement information</h5>
                </div>
                <div class="card-body">
                    <h4>No Record Found!</h4>
                </div>
            </div>
            <br>
                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            <br>
        </div>
    </div>
<?php } } ?>
<?php include('../includes/footer.php');?>