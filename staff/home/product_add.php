<?php include('../includes/header.php');?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item">Add</li>
</ol>
<form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Product information</h5>
                </div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-6 mb-3">
                            <label for="" class="required">Name</label>
                            <input required type="text" id="pname" name="name" class="form-control">
                            <div id="pname-error"></div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="required">Quantity</label>
                            <input required type="number" id="quantity" name="quantity" class="form-control">
                            <div id="quantity-error"></div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <?php
                                $sql = "SELECT * FROM `product_category` WHERE product_category_status !=2";
                                $all_categories = mysqli_query($con,$sql);
                            ?>
                            <label for="" class="required">Category</label>
                            <select required id="category" class="form-control" name="category">
                                <option value="" selected disabled>Select Category</option>
                                <?php
                                    // use a while loop to fetch data
                                    // from the $all_categories variable
                                    // and individually display as an option
                                    while ($category = mysqli_fetch_array(
                                            $all_categories,MYSQLI_ASSOC)):;
                                ?>
                                    <option value="<?php echo $category["product_category_id"];
                                        // The value we usually set is the primary key
                                    ?>">
                                        <?php echo $category["category_name"];
                                            // To show the category name to the user
                                        ?>
                                    </option>
                                <?php
                                    endwhile;
                                    // While loop must be terminated
                                ?>
                            </select>
                            <div id="category-error"></div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="required">Expiration Date</label>
                            <input type="date" required id="exp_date" name="exp_date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                            <div id="exp_date-error"></div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image" class="required">Product Image1</label>
                            <br>
                            <input required type="file" name="photo" id="image1" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame1', 'image1')">
                            <div class="text-center">
                                <br>
                                    <img class="zoom img-fluid img-bordered-sm" id="frame1"
                                    src="
                                        <?php
                                            echo base_url . 'assets/img/system/no-image.png';
                                        ?>
                                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                                <br>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image" class="required">Product Image2</label>
                            <br>
                            <input required type="file" name="photo1" id="image2" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame2', 'image2')">
                            <input type="text" name="oldimage1" value="<?= $row['photo1']; ?>" hidden>
                            <div class="text-center">
                                <br>
                                    <img class="zoom img-fluid img-bordered-sm" id="frame2"
                                    src="
                                        <?php
                                            echo base_url . 'assets/img/system/no-image.png';
                                        ?>
                                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                                <br>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image" class="required">Product Image3</label>
                            <br>
                            <input required type="file" name="photo2" id="image3" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame3', 'image3')">
                            <input type="text" name="oldimage2" value="<?= $row['photo2']; ?>" hidden>
                            <div class="text-center">
                                <br>
                                    <img class="zoom img-fluid img-bordered-sm" id="frame3"
                                    src="
                                        <?php
                                            echo base_url . 'assets/img/system/no-image.png';
                                        ?>
                                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                                <br>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image" class="required">Product Image4</label>
                            <br>
                            <input required type="file" name="photo3" id="image4" class="form-control-file btn btn-secondary" accept=".jpg, .jpeg, .png" onchange="previewImage('frame4', 'image4')">
                            <input type="text" name="oldimage3" value="<?= $row['photo3']; ?>" hidden>
                            <div class="text-center">
                                <br>
                                    <img class="zoom img-fluid img-bordered-sm" id="frame4"
                                    src="
                                        <?php
                                            echo base_url . 'assets/img/system/no-image.png';
                                        ?>
                                    " alt="image" style="height: 180px; max-width: 240px; object-fit: cover;">
                                <br>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <br>
                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" name="add_product" id="submit-btn" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                </div>
            <br>
        </div>
    </div>
</form>

<?php include('../includes/footer.php');?>

<script>
    $(document).ready(function() {
        // disable submit button by default
        // $('#submit-btn').prop('disabled', true);

        // debounce functions for each input field
        var debouncedCheckProductname = _.debounce(checkProductname, 500);
        var debouncedCheckQuantity = _.debounce(checkQuantity, 500);
        var debouncedCheckCategory = _.debounce(checkCategory, 500);
        var debouncedCheckExpdate = _.debounce(checkExpdate, 500);

        // attach event listeners for each input field
        $('#pname').on('input', debouncedCheckProductname);
        $('#quantity').on('input', debouncedCheckQuantity);
        $('#category').on('input', debouncedCheckCategory);
        $('#exp_date').on('input', debouncedCheckExpdate);

        $('#pname').on('blur', debouncedCheckProductname);
        $('#quantity').on('blur', debouncedCheckQuantity);
        $('#category').on('blur', debouncedCheckCategory);
        $('#exp_date').on('blur', debouncedCheckExpdate);

        function checkIfAllFieldsValid() {
            // check if all input fields are valid and enable submit button if so
            if ($('#pname-error').is(':empty') && $('#quantity-error').is(':empty') && $('#category-error').is(':empty') && $('#exp_date-error').is(':empty')) {
                $('#submit-btn').prop('disabled', false);
            } else {
                $('#submit-btn').prop('disabled', true);
            }
        }
        
        function checkProductname() {
            var pname = $('#pname').val().trim();
            
            // show error if pname is empty
            if (pname === '') {
                $('#pname-error').text('Please input product name').css('color', 'red');
                $('#pname').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for pname if needed
            
            $('#pname-error').empty();
            $('#pname').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkQuantity() {
            var quantity = $('#quantity').val().trim();
            
            // show error if quantity is empty
            if (quantity === '') {
                $('#quantity-error').text('Please input quantity').css('color', 'red');
                $('#quantity').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for quantity if needed
            
            $('#quantity-error').empty();
            $('#quantity').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkCategory() {
            var categorySelect = document.getElementById('category');
            var category = categorySelect.value;
            
            // show error if the default option is selected
            if (category === '' && categorySelect.selectedIndex !== 1) {
                $('#category-error').text('Please select category').css('color', 'red');
                $('#category').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for category if needed
            
            $('#category-error').empty();
            $('#category').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }

        function checkExpdate() {
            var exp_date = $('#exp_date').val().trim();
            
            // show error if exp_date is empty
            if (exp_date === '') {
                $('#exp_date-error').text('Please input expiration date').css('color', 'red');
                $('#exp_date').addClass('is-invalid');
                checkIfAllFieldsValid();
                return;
            }
            
            // Perform additional validation for exp_date if needed
            
            $('#exp_date-error').empty();
            $('#exp_date').removeClass('is-invalid');
            checkIfAllFieldsValid();
        }
        
    });
</script>