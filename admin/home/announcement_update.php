<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Other</li>
    <li class="breadcrumb-item">Announcement</li>
    <li class="breadcrumb-item">Update Announcement</li>
</ol>
<form action="code.php" method="POST">  
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Announcement information</h5>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $users = "SELECT * FROM announcement WHERE ann_id='$id' ";
                            $users_run = mysqli_query($con, $users);
                            if(mysqli_num_rows($users_run) > 0){
                                foreach($users_run as $user){
                    ?>
                    <input type="hidden" name="user_id" value="<?=$user['ann_id'];?>"> 
                    <div class="row"> 
                        <div class="col-md-12 mb-3">
                            <label for="">Title</label>
                            <input required placeholder="Enter Announcement Title" type="text" name="edit_announcement_title" class="form-control" value="<?=$user['ann_title'];?>">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="Description">Body</label>
                            <textarea placeholder="Enter Message" required type="text"  name="edit_announcement_message" class="form-control" rows="3"><?= $user['ann_body']; ?></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Sender</label>
                            <input required placeholder="Enter Sender" type="text" name="edit_announcement_sender" class="form-control" value="<?=$user['ann_publish'];?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Date and Time Announced</label>
                            <input type="datetime-local" name="edit_announcement_dt" class="form-control" value="<?=$user['ann_date'];?>">
                        </div>
                    </div>
                    <?php
                            }
                        }
                        else{
                    ?>
                        <h4>No Record Found!</h4>
                    <?php } } ?>
                </div>
            </div>
            <br>
                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" name="edit_announcement" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                </div>
            <br>
        </div>
    </div>
</form>
<?php include('../includes/footer.php');?>