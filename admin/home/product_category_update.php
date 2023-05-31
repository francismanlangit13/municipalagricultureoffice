<?php
    include('../includes/header.php');
?>

<form action="code.php" method="POST">
    <ol class="breadcrumb mb-4">    
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item">Update</li>
    </ol>
    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $users = "SELECT * FROM product_category WHERE product_category_id='$id' AND product_category_status !=2";
            $users_run = mysqli_query($con, $users);
            if(mysqli_num_rows($users_run) > 0){
                foreach($users_run as $user){
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Category information</h5>
                </div>
                <div class="card-body">
                    <input type="hidden" name="user_id" value="<?=$user['product_category_id'];?>">
                    <div class="row"> 
                        <div class="col-md-12 mb-3">
                            <label for="" class="required">Name</label>
                            <input required placeholder="Enter Category Name" id="cname" name="editcategory_name" value="<?= $user['category_name']; ?>" class="form-control">
                            <div id="cname-error"></div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="Description" class="required">Description</label>
                            <textarea placeholder="Enter Description" id="description" name="editdescription" required  value="<?= $user['category_description']; ?>" class="form-control" rows="5"><?= $user['category_description']; ?></textarea>
                            <div id="description-error"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" name="edit_category" id="submit-btn" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
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
                        <h5>Category information</h5>
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
</form>

<?php include('../includes/footer.php');?>

<script>
    $(document).ready(function() {
        // disable submit button by default
        $('#submit-btn').prop('disabled', true);

        // debounce functions for each input field
        var debouncedCheckName = _.debounce(checkName, 500);
        var debouncedCheckDescription = _.debounce(checkDescription, 500);

        // attach event listeners for each input field
        $('#cname').on('input', debouncedCheckName);
        $('#description').on('input', debouncedCheckDescription);

        $('#cname').on('blur', debouncedCheckName);
        $('#description').on('blur', debouncedCheckDescription);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#cname-error').is(':empty') && $('#description-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            } else {
                $('#submit-btn').prop('disabled', true);
            }
        }
        
        function checkName() {
            var cname = $('#cname').val().trim();
            
            // show error if cname is empty
            if (cname === '') {
                $('#cname-error').text('Please input category name').css('color', 'red');
                $('#cname').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for cname if needed
            
            $('#cname-error').empty();
            $('#cname').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkDescription() {
            var description = $('#description').val().trim();
            
            // show error if description is empty
            if (description === '') {
                $('#description-error').text('Please input description').css('color', 'red');
                $('#description').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for description if needed
            
            $('#description-error').empty();
            $('#description').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
    });
</script>