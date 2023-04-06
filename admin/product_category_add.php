<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>

<div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">    
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Product</li>
            <li class="breadcrumb-item">Edit Category</li>
            
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h5>Add Category</h5>
                    </div>
                    <div class="card-body">

                    
                    <form action="code.php" method="POST">  
                    <div class="row"> 
                                <div class="col-md-6 mb-3">
                                    <label for="" class="required">Name</label>
                                    <input required placeholder="Enter Category Name" type="text" name="name" class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                <label for="Description" class="required">Description</label>
                                <textarea placeholder="Enter Description" name="description" required type="text" class="form-control" rows="3"></textarea>
                                </div>


                                </div>

                                <div class="text-right">
                                <a href="product_category.php" class="btn btn-danger">Back</a>
                                <button type="submit" name="add_category" class="btn btn-primary">Add</button>
                                </div>
                               

                            </form>
                   

                    </div>
                </div>
            </div>
        </div>
    </div>






<?php include('includes/footer.php');?>