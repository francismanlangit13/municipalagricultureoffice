<?php
    include('../includes/header.php');
?>

<form action="code.php" method="POST">
    <ol class="breadcrumb mb-4">    
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item">Add</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Category information</h5>
                </div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-12 mb-3">
                            <label for="" class="required">Name</label>
                            <input required placeholder="Enter Category Name" id="cname" name="name" class="form-control">
                            <div id="cname-error"></div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="Description" class="required">Description</label>
                            <textarea required placeholder="Enter Description" id="description" name="description" class="form-control" rows="5"></textarea>
                            <div id="description-error"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" name="add_category" id="submit-btn" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                </div>
            <br>
        </div>
    </div>
</form>

<?php include('../includes/footer.php');?>

<!-- <script>
    var cnameNameInput = document.getElementById("cname");
    var cnameNameError = document.getElementById("cname-error");
    var descriptionNameInput = document.getElementById("description");
    var descriptionNameError = document.getElementById("description-error");

    cnameNameInput.addEventListener("blur", function() {
        if (cnameNameInput.value.trim() === "") {
            $('#cname-error').text('Please input category name').css('color', 'red');
            $('#cname').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#cname-error').empty();
            $('#cname').removeClass('is-invalid');
            // enable submit button if category name are inputed.
            checkIfAllFieldsValid();
        }
    });

    descriptionNameInput.addEventListener("blur", function() {
        if (descriptionNameInput.value.trim() === "") {
            $('#description-error').text('Please input quantity').css('color', 'red');
            $('#description').addClass('is-invalid');
            $('#submit-btn').prop('disabled', true);
        } else {
            $('#description-error').empty();
            $('#description').removeClass('is-invalid');
            // enable submit button if description is inputed.
            checkIfAllFieldsValid();
        }
    });

    function checkIfAllFieldsValid() {
      // check if all input fields are valid and enable submit button if so
      if ($('#cname-error').is(':empty') && $('#description-error').is(':empty')) {
        $('#submit-btn').prop('disabled', false);
      }
    }
</script> -->

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