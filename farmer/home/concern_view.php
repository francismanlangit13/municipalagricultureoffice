<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Concern</li>
    <li class="breadcrumb-item">View</li>
    
</ol>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT *, DATE_FORMAT(concern.date_created, '%m-%d-%Y %h:%i:%s %p') as short_date_created,
		DATE_FORMAT(concern.date_updated, '%m-%d-%Y %h:%i:%s %p') as short_date_updated
        FROM concern
        INNER JOIN user
        ON concern.user_id = user.user_id
        WHERE concern.concern_id = $id AND concern_status != 2";
        $sql_run = mysqli_query($con, $sql);
        if(mysqli_num_rows($sql_run) > 0){
            foreach($sql_run as $row){
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="border-bottom:0px !important">
                <h5>View Farmer Concern</h5>
            </div>
        </div>
        <br>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Concern information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="Title">Title</label>
                        <input disabled type="text" value="<?=$row['title'];?>" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Concern Message</label>
                        <textarea class="form-control" type="text" rows="5" readonly><?= $row['message']; ?></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="" style="position:inherit;left:-7px;">Attachments</label>
                        <br>
                        <a href="
                            <?php
                                if(isset($row['photo'])){
                                    if(!empty($row['photo'])) {
                                        echo base_url . 'assets/img/concerns/' . $row['photo'];
                                } else { echo base_url . 'assets/img/system/no-image.png'; } }
                            ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="FARMER: <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?> <br> CONCERN MESSAGE: <?= $row['message']; ?>">
                            <img class="zoom img-fluid img-bordered-sm"
                            src="
                                <?php
                                    if(isset($row['photo'])){
                                        if(!empty($row['photo'])) {
                                            echo base_url . 'assets/img/concerns/' . $row['photo'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>
                            " alt="image" style="height: 100px; max-width: 160px; object-fit: cover; margin-bottom:0.5rem;">
                        </a>
                        <a href="
                            <?php
                                if(isset($row['photo1'])){
                                    if(!empty($row['photo1'])) {
                                        echo base_url . 'assets/img/concerns/' . $row['photo1'];
                                } else { echo base_url . 'assets/img/system/no-image.png'; } }
                            ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="FARMER: <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?> <br> CONCERN MESSAGE: <?= $row['message']; ?>">
                            <img class="zoom img-fluid img-bordered-sm"
                            src="
                                <?php
                                    if(isset($row['photo1'])){
                                        if(!empty($row['photo1'])) {
                                            echo base_url . 'assets/img/concerns/' . $row['photo1'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>
                            " alt="image" style="height: 100px; max-width: 160px; object-fit: cover; margin-bottom:0.5rem;">
                        </a>
                        <a href="
                            <?php
                                if(isset($row['photo2'])){
                                    if(!empty($row['photo2'])) {
                                        echo base_url . 'assets/img/concerns/' . $row['photo2'];
                                } else { echo base_url . 'assets/img/system/no-image.png'; } }
                            ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="FARMER: <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?> <br> CONCERN MESSAGE: <?= $row['message']; ?>">
                            <img class="zoom img-fluid img-bordered-sm"
                            src="
                                <?php
                                    if(isset($row['photo2'])){
                                        if(!empty($row['photo2'])) {
                                            echo base_url . 'assets/img/concerns/' . $row['photo2'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>
                            " alt="image" style="height: 100px; max-width: 160px; object-fit: cover; margin-bottom:0.5rem;">
                        </a>
                        <a href="
                            <?php
                                if(isset($row['photo3'])){
                                    if(!empty($row['photo3'])) {
                                        echo base_url . 'assets/img/concerns/' . $row['photo3'];
                                } else { echo base_url . 'assets/img/system/no-image.png'; } }
                            ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="FARMER: <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?> <br> CONCERN MESSAGE: <?= $row['message']; ?>">
                            <img class="zoom img-fluid img-bordered-sm"
                            src="
                                <?php
                                    if(isset($row['photo3'])){
                                        if(!empty($row['photo3'])) {
                                            echo base_url . 'assets/img/concerns/' . $row['photo3'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>
                            " alt="image" style="height: 100px; max-width: 160px; object-fit: cover; margin-bottom:0.5rem;">
                        </a>
                        <a href="
                            <?php
                                if(isset($row['photo4'])){
                                    if(!empty($row['photo4'])) {
                                        echo base_url . 'assets/img/concerns/' . $row['photo4'];
                                } else { echo base_url . 'assets/img/system/no-image.png'; } }
                            ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="FARMER: <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?> <br> CONCERN MESSAGE: <?= $row['message']; ?>">
                            <img class="zoom img-fluid img-bordered-sm"
                            src="
                                <?php
                                    if(isset($row['photo4'])){
                                        if(!empty($row['photo4'])) {
                                            echo base_url . 'assets/img/concerns/' . $row['photo4'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>
                            " alt="image" style="height: 100px; max-width: 160px; object-fit: cover; margin-bottom:0.5rem;">
                        </a>
                        <a href="
                            <?php
                                if(isset($row['video'])){
                                    if(!empty($row['video'])) {
                                        echo base_url . 'assets/img/concerns/' . $row['video'];
                                } else { echo base_url . 'assets/img/system/no-image.png'; } }
                            ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="FARMER: <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?> <br> CONCERN MESSAGE: <?= $row['message']; ?>">
                            <video class="zoom img-fluid img-bordered-sm"
                            src="
                                <?php
                                    if(isset($row['video'])){
                                        if(!empty($row['video'])) {
                                            echo base_url . 'assets/img/concerns/' . $row['video'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>
                            " alt="video" type="video/mp4" style="height: 100px; max-width: 160px; object-fit: cover; margin-bottom:-2.5rem;">
                        </a>
                        <br><br>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Date of Concern</label>
                        <input type="datetime" class="form-control" type="text" value="<?= $row['short_date_created']; ?>" readonly>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Status</label>
                        <select disabled class="form-control" onchange="showTextarea()">
                            <option value="" selected disabled>Select Status</option>
                            <option value="1" <?= isset($row['status_id']) && $row['status_id'] == '1' ? 'selected' : '' ?>>Pending</option>
                            <option value="2" <?= isset($row['status_id']) && $row['status_id'] == '2' ? 'selected' : '' ?>>Approved</option>
                            <option value="3" <?= isset($row['status_id']) && $row['status_id'] == '3' ? 'selected' : '' ?>>Deny</option>
                        </select>
                    </div>
                    <?php if ($row['status_id'] == 3){ ?>
                        <div class="col-md-12 mb-3" id="textarea-container">
                            <label for="">Reason why deny</label>
                            <textarea disabled placeholder="Enter reason why deny" class="form-control" rows="5"><?= $row['reason']; ?></textarea>
                        </div>
                    <?php } ?>
                    <?php if ($row['status_id'] == 2){ ?>
                        <div class="col-md-6 mb-3">
                            <label for="">Approved Date</label>
                            <input type="datetime" class="form-control"  value="<?=$row['short_date_updated']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Approved By</label>
                            <input type="datetime" class="form-control"  value="<?=$row['person']; ?>" readonly>
                        </div>
                    <?php } ?>
                    <?php if ($row['status_id'] == 3){ ?>
                        <div class="col-md-6 mb-3">
                            <label for="">Deny Date</label>
                            <input type="datetime" class="form-control"  value="<?=$row['short_date_updated']; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Deny By</label>
                            <input type="datetime" class="form-control"  value="<?=$row['person']; ?>" readonly>
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
    } }
    else{
?>
    <h4>No Record Found!</h4>
<?php } } ?>

<?php include('../includes/footer.php');?>
<script>
    function showTextarea() {
        var status = document.getElementsByName('status')[0].value;
        var container = document.getElementById('textarea-container');
        var textarea = container.getElementsByTagName('textarea')[0];
        if (status == 3) {
            container.style.display = 'block';
            textarea.setAttribute('required', true);
        } else {
            container.style.display = 'none';
            textarea.removeAttribute('required');
            textarea.value = '';
        }
    }
</script>