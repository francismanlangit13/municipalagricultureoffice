<?php
    include('../includes/header.php');
?>

<form action="code.php" method="POST">
    <ol class="breadcrumb mb-4">    
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item">Update</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Update Category</h5>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $users = "SELECT * FROM product_category WHERE product_category_id='$id' ";
                            $users_run = mysqli_query($con, $users);
                            if(mysqli_num_rows($users_run) > 0){
                                foreach($users_run as $user){
                    ?>
                    <input type="hidden" name="user_id" value="<?=$user['product_category_id'];?>">
                    <div class="row"> 
                        <div class="col-md-12 mb-3">
                            <label for="" class="required">Name</label>
                            <input required placeholder="Enter Category Name" name="editcategory_name" value="<?= $user['category_name']; ?>" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="Description" class="required">Description</label>
                            <textarea placeholder="Enter Description" name="editdescription" required  value="<?= $user['category_description']; ?>" class="form-control" rows="5"><?= $user['category_description']; ?></textarea>
                        </div>
                    </div>
                    <?php
                            }
                        }
                        else{
                    ?>
                        <h4>No Record Found!</h4>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <br>
                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" name="edit_category" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                </div>
            <br>
        </div>
    </div>
</form>

<?php include('../includes/footer.php');?>