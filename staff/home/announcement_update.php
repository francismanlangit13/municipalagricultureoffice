<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Other</li>
    <li class="breadcrumb-item">Announcement</li>
    <li class="breadcrumb-item">Update</li>
</ol>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $users = "SELECT * FROM announcement WHERE ann_id='$id' AND ann_status = 'Pending' AND ann_deleted != 1";
        $users_run = mysqli_query($con, $users);
        if(mysqli_num_rows($users_run) > 0){
            foreach($users_run as $user){
?>
<form action="code.php" method="POST">  
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Announcement information</h5>
                </div>
                <div class="card-body">
                    <input type="hidden" name="user_id" value="<?=$user['ann_id'];?>"> 
                    <div class="row"> 
                        <div class="col-md-12 mb-3">
                            <label for="">Title</label>
                            <input required placeholder="Enter Announcement Title" type="text" id="announcement_title" name="edit_announcement_title" class="form-control" value="<?=$user['ann_title'];?>">
                            <div id="announcement_title-error"></div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="Description">Body</label>
                            <textarea placeholder="Enter Message" required type="text" id="announcement_message" name="edit_announcement_message" class="form-control" rows="3"><?= $user['ann_body']; ?></textarea>
                            <div id="announcement_message-error"></div>
                        </div>
                    </div>
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

<script>
    $(document).ready(function() {
        // disable submit button by default
        // $('#submit-btn').prop('disabled', true);

        // debounce functions for each input field
        var debouncedCheckTitle = _.debounce(checkTitle, 500);
        var debouncedCheckBody = _.debounce(checkBody, 500);

        // attach event listeners for each input field
        $('#announcement_title').on('input', debouncedCheckTitle);
        $('#announcement_message').on('input', debouncedCheckBody);

        $('#announcement_title').on('blur', debouncedCheckTitle);
        $('#announcement_message').on('blur', debouncedCheckBody);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#announcement_title-error').is(':empty') && $('#announcement_message-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            } else {
                $('#submit-btn').prop('disabled', true);
            }
        }
        
        function checkTitle() {
            var announcement_title = $('#announcement_title').val().trim();
            
            // show error if announcement_title is empty
            if (announcement_title === '') {
                $('#announcement_title-error').text('Please input title').css('color', 'red');
                $('#announcement_title').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for announcement_title if needed
            
            $('#announcement_title-error').empty();
            $('#announcement_title').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkBody() {
            var announcement_message = $('#announcement_message').val().trim();
            
            // show error if announcement_message is empty
            if (announcement_message === '') {
                $('#announcement_message-error').text('Please input body').css('color', 'red');
                $('#announcement_message').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for middle name if needed
            
            $('#announcement_message-error').empty();
            $('#announcement_message').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
    });
</script>