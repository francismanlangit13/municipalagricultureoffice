<?php include('../includes/header.php'); ?>
<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Request</li>
    <li class="breadcrumb-item">Update Request</li>
</ol>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $users = "SELECT *
        FROM request WHERE request_id='$id' AND request_status = 1";
        $users_run = mysqli_query($con, $users);

        if(mysqli_num_rows($users_run) > 0){
            foreach($users_run as $user){
?>
<?php 
    $request_date_timestamp = strtotime($user['request_date']);
    
    // Format $user['request_date'] and the current date as "Y-m-d H:i:s"
    $request_date = date("Y-m-d H:i:s", $request_date_timestamp);
    $current_date = date("Y-m-d H:i:s", strtotime("-10 minutes")); // set 10 minutes can update the information.
    
    // Check if $user['request_date'] is greater than the current date
    if($request_date > $current_date){
?>
<form action="code.php" method="POST">
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Request information</h5>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="request_id" value="<?=$user['request_id'];?>">
                        <div class="row"> 
                            <div class="col-md-6 mb-3">
                                <?php
                                    $sql = "SELECT * FROM `product` WHERE product_status = 1";
                                    $all_categories = mysqli_query($con,$sql);
                                ?>
                                <label for="" class="required">Product:</label>
                                <select name="product" id="product_id" required class="form-control">
                                    <?php
                                        // use a while loop to fetch data
                                        // from the $all_categories variable
                                        // and individually display as an option
                                        while ($category = mysqli_fetch_array(
                                                $all_categories,MYSQLI_ASSOC)):;
                                    ?>
                                        <option value="<?php echo $category["product_id"];
                                            // The value we usually set is the primary key
                                        ?>">
                                            <?php echo $category["product_name"];
                                                // To show the category name to the user
                                            ?>
                                        </option>
                                    <?php
                                        endwhile;
                                        // While loop must be terminated
                                    ?>
                                </select>
                                <div id="product_id-error"></div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="" class="required">Quantity</label>
                                <input required type="text" name="quantity" id="product_quantity-input" value="<?=$user['request_quantity'];?>" class="form-control">
                                <div id="product_quantity-error"></div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="Description" class="required">Description</label>
                                <textarea placeholder="Enter Message" id="message" name="description" required type="text" class="form-control" rows="3"><?=$user['description'];?></textarea>
                                <div id="message-error"></div>
                            </div>

                            <?php if(isset($_SESSION['auth_user']))  ?>
                            <label for="" hidden="true">user_id</label>
                            <input required type="text" hidden name="user_id" value="<?=  $_SESSION['auth_user']['user_id']; ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                    <div class="text-right">
                        <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                        <button type="submit" name="update_request" id="submit-btn" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                    </div>
                <br>
            </div>
        </div>
    </div>
</form>
<?php } else { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Request information</h5>
                </div>
                <div class="card-body">
                    No Record Found!
                </div>
            </div>
        </div>
    </div>
    <br>
        <div class="text-right">
            <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    <br>
<?php } ?>
<?php
        }
    }
    else{
?>
    <h4>No Record Found!</h4>
<?php } } ?>

<?php include('../includes/footer.php'); ?>

<script>
    $(document).ready(function() {

        // debounce functions for each input field
        var debouncedCheckQuantity = _.debounce(checkQuantity, 100);

        // attach event listeners for each input field
        $('#product_quantity-input').on('input', debouncedCheckQuantity);
        $('#product_id').on('change', debouncedCheckQuantity);

        function checkQuantity() {
            var product_id = $('#product_id').val();
            var product_quantity = $('#product_quantity-input').val();

            // show error if quantity is empty
            if (product_quantity === '') {
                $('#product_quantity-error').text('Please input quantity').css('color', 'red');
                $('#product_quantity-input').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            // check if numbers format is valid
            var numbersPattern = /^\d+$/;
            if (!numbersPattern.test(product_quantity)) {
                $('#product_quantity-error').text('Invalid format').css('color', 'red');
                $('#product_quantity-input').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }

            $.ajax({
                url: 'ajax.php', // replace with the actual URL to check quantity
                method: 'POST', // use the appropriate HTTP method
                data: { product_id: product_id, product_quantity: product_quantity },
                success: function(response) {
                    if (response.exists) {
                        // disable submit button if quantity is taken
                        $('#submit-btn').prop('disabled', true);
                        $('#product_quantity-error').text('Out of stock').css('color', 'red');
                        $('#product_quantity-input').addClass('is-invalid');
                    } else {
                        $('#product_quantity-error').empty();
                        $('#product_quantity-input').removeClass('is-invalid');
                        // enable submit button if quantity is valid
                        checkIfAllFieldsValid();
                    }
                },
                error: function() {
                    $('#product_quantity-error').text('Error checking quantity');
                }
            });
        }

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#product_quantity-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            }
        }
    });
</script>

<script>
    $(document).ready(function() {
        // disable submit button by default
        // $('#submit-btn').prop('disabled', true);

        // debounce functions for each input field
        var debouncedCheckProduct = _.debounce(checkProduct, 500);
        var debouncedCheckMessage = _.debounce(checkMessage, 500);

        // attach event listeners for each input field
        $('#product_id').on('input', debouncedCheckProduct);
        $('#message').on('input', debouncedCheckMessage);

        $('#product_id').on('blur', debouncedCheckProduct);
        $('#message').on('blur', debouncedCheckMessage);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#product_id-error').is(':empty') && $('#message-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            } else {
                $('#submit-btn').prop('disabled', true);
            }
        }

        function checkProduct() {
            var product_idSelect = document.getElementById('product_id');
            var product_id = product_idSelect.value;
            
            // show error if the default option is selected
            if (product_id === '' && product_idSelect.selectedIndex !== 1) {
                $('#product_id-error').text('Please select product').css('color', 'red');
                $('#product_id').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for product_id if needed
            
            $('#product_id-error').empty();
            $('#product_id').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkMessage() {
            var message = $('#message').val().trim();
            
            // show error if message is empty
            if (message === '') {
                $('#message-error').text('Please input message').css('color', 'red');
                $('#message').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for message if needed
            
            $('#message-error').empty();
            $('#message').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
    });
</script>