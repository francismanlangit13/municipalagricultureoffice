<?php
    include('../includes/header.php');
?>

<form action="code.php" method="POST">
    <ol class="breadcrumb mb-4">    
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Category</li>
        <li class="breadcrumb-item">View</li>
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
                            <input disabled placeholder="Enter Category Name" value="<?= $user['category_name']; ?>" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="Description" class="required">Description</label>
                            <textarea disabled placeholder="Enter Description" value="<?= $user['category_description']; ?>" class="form-control" rows="5"><?= $user['category_description']; ?></textarea>
                        </div>
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