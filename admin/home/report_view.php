<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Other</li>
    <li class="breadcrumb-item">Request</li>
    <li class="breadcrumb-item">View</li>
    
</ol>
<form action="code.php" method="POST">
    <div class="row">
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT *
                FROM report
                INNER JOIN user
                ON report.user_id = user.user_id
                WHERE report.report_id = $id";
                $sql_run = mysqli_query($con, $sql);
                if(mysqli_num_rows($sql_run) > 0){
                    foreach($sql_run as $row){
        ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="border-bottom:0px !important">
                    <h5>View Farmer Report</h5>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Farmer information</h5>
                </div>
                <div class="card-body">
                    
                    <input hidden name="report_id" value="<?=$row['report_id'];?>">
                    <input hidden name="farmer_id" value="<?=$row['id'];?>">
                    <div class="row"> 
                        <div class="col-md-8 mb-3">
                            <label for="reference_number">Reference Number</label>
                            <input disabled type="text" value="<?=$row['reference_number'];?>" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="Farmer Picture" style="position:inherit;left:-7px; top:-27px;">Farmer Picture</label>
                            <a href="
                                <?php
                                    if(isset($row['picture'])){
                                        if(!empty($row['picture'])) {
                                            echo base_url . 'assets/img/users/' . $row['picture'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="FARMER: <?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?>">
                                <img class="icon-circle"
                                src="
                                    <?php
                                        if(isset($row['picture'])){
                                            if(!empty($row['picture'])) {
                                                echo base_url . 'assets/img/users/' . $row['picture'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>
                                " alt="image" style="height:5rem !important; width:5rem !important; display:inline !important; margin-left:0.4rem;">
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="Last Name">Last Name</label>
                            <input disabled type="text" value="<?=$row['lname'];?>" class="form-control">
                        </div> 
                    
                        <div class="col-md-3 mb-3">
                            <label for="Middle Name">Middle Name</label>
                            <input disabled type="text" value="<?=$row['mname'];?>" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="First Name">First Name</label>
                            <input disabled type="text" value="<?=$row['fname'];?>" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="suffix">Suffix</label>
                            <input disabled type="text" value="<?=$row['suffix'];?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">   
                            <label for="Purok">Purok</label>
                            <input disabled type="text" value="<?=$row['purok'];?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="Sreet">Street</label>
                            <input disabled type="text" value="<?=$row['street'];?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="Barangay">Barangay</label>
                            <input disabled type="text" value="<?=$row['barangay'];?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="Municipality/City">Municipality/City</label>
                            <input disabled type="text" value="<?=$row['municipality'];?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="Province">Province</label>
                            <input disabled type="text" value="<?=$row['province'];?>" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="Region">Region</label>
                            <input disabled type="text" value="<?=$row['region'];?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Report information</h5>
                </div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-12 mb-3">
                            <label for="">Report Message</label>
                            <textarea class="form-control" type="text" rows="5" readonly><?= $row['message']; ?></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Date of Report</label>
                            <input type="datetime" class="form-control" type="text" value="<?= $row['date_created']; ?>" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="required">Status</label>
                            <select required class="form-control" name="status" onchange="showTextarea()">
                                <option value="" selected disabled>Select Status</option>
                                <option value="1" <?= isset($row['status_id']) && $row['status_id'] == '1' ? 'hidden' : '' ?>>Pending</option>
                                <option value="2" <?= isset($row['status_id']) && $row['status_id'] == '2' ? 'hidden' : '' ?>>Approved</option>
                                <option value="3" <?= isset($row['status_id']) && $row['status_id'] == '3' ? 'hidden' : '' ?>>Deny</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3" id="textarea-container" style="display:none">
                            <label for="" class="required">Reason why deny</label>
                            <textarea placeholder="Enter reason why deny" class="form-control" name="reason" rows="5"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" style="position:inherit;left:-7px;">Report Images</label>
                            <br>
                            <a href="
                                <?php
                                    if(isset($row['photo'])){
                                        if(!empty($row['photo'])) {
                                            echo base_url . 'assets/img/reports/' . $row['photo'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="REPORT: <?php echo $row['message']; ?>">
                                <img class="zoom img-fluid img-bordered-sm"
                                src="
                                    <?php
                                        if(isset($row['photo'])){
                                            if(!empty($row['photo'])) {
                                                echo base_url . 'assets/img/reports/' . $row['photo'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>
                                " alt="image" style="height: 100px; max-width: 160px; object-fit: cover; margin-bottom:0.5rem;">
                            </a>
                            <a href="
                                <?php
                                    if(isset($row['photo1'])){
                                        if(!empty($row['photo1'])) {
                                            echo base_url . 'assets/img/reports/' . $row['photo1'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="REPORT: <?php echo $row['message']; ?>">
                                <img class="zoom img-fluid img-bordered-sm"
                                src="
                                    <?php
                                        if(isset($row['photo1'])){
                                            if(!empty($row['photo1'])) {
                                                echo base_url . 'assets/img/reports/' . $row['photo1'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>
                                " alt="image" style="height: 100px; max-width: 160px; object-fit: cover; margin-bottom:0.5rem;">
                            </a>
                            <a href="
                                <?php
                                    if(isset($row['photo2'])){
                                        if(!empty($row['photo2'])) {
                                            echo base_url . 'assets/img/reports/' . $row['photo2'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="REPORT: <?php echo $row['message']; ?>">
                                <img class="zoom img-fluid img-bordered-sm"
                                src="
                                    <?php
                                        if(isset($row['photo2'])){
                                            if(!empty($row['photo2'])) {
                                                echo base_url . 'assets/img/reports/' . $row['photo2'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>
                                " alt="image" style="height: 100px; max-width: 160px; object-fit: cover; margin-bottom:0.5rem;">
                            </a>
                            <a href="
                                <?php
                                    if(isset($row['photo3'])){
                                        if(!empty($row['photo3'])) {
                                            echo base_url . 'assets/img/reports/' . $row['photo3'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="REPORT: <?php echo $row['message']; ?>">
                                <img class="zoom img-fluid img-bordered-sm"
                                src="
                                    <?php
                                        if(isset($row['photo3'])){
                                            if(!empty($row['photo3'])) {
                                                echo base_url . 'assets/img/reports/' . $row['photo3'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>
                                " alt="image" style="height: 100px; max-width: 160px; object-fit: cover; margin-bottom:0.5rem;">
                            </a>
                            <a href="
                                <?php
                                    if(isset($row['photo4'])){
                                        if(!empty($row['photo4'])) {
                                            echo base_url . 'assets/img/reports/' . $row['photo4'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="REPORT: <?php echo $row['message']; ?>">
                                <img class="zoom img-fluid img-bordered-sm"
                                src="
                                    <?php
                                        if(isset($row['photo4'])){
                                            if(!empty($row['photo4'])) {
                                                echo base_url . 'assets/img/reports/' . $row['photo4'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>
                                " alt="image" style="height: 100px; max-width: 160px; object-fit: cover; margin-bottom:0.5rem;">
                            </a>
                            <a href="
                                <?php
                                    if(isset($row['video'])){
                                        if(!empty($row['video'])) {
                                            echo base_url . 'assets/img/reports/' . $row['video'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="REPORT: <?php echo $row['message']; ?>">
                                <video class="zoom img-fluid img-bordered-sm"
                                src="
                                    <?php
                                        if(isset($row['video'])){
                                            if(!empty($row['video'])) {
                                                echo base_url . 'assets/img/reports/' . $row['video'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>
                                " alt="video" type="video/mp4" style="height: 100px; max-width: 160px; object-fit: cover; margin-bottom:-2.5rem;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                <div class="text-right">
                <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" name="report_save" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                </div>
            <br>
        </div>
        <?php
            } }
            else{
        ?>
            <h4>No Record Found!</h4>
        <?php } } ?>
    </div>
</form>

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