<?php 
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Product</li>
    <li class="breadcrumb-item">Product Category</li>
</ol>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="product_category_add" class="btn btn-success btn-icon-split"> 
            <span class="icon text-white-50">
                <i class="fas fa-clipboard-list"></i>
            </span>
            <span class="text">Add Category</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th width="25%">Category Name</th>
                        <th width="60%">Description</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT *, 
                        product_category.*
                        FROM
                        product_category
                        WHERE product_category_status != 2";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $row){
                    ?>
                    <tr>
                        <td><?= $row['product_category_id']; ?></td>
                        <td><?= $row['category_name']; ?></td>
                        <td><?= $row['category_description']; ?></td>
                        <td> 
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 mb-1" style="zoom:97%">
                                    <a href="product_category_view?id=<?=$row['product_category_id'];?>" class="btn btn-info btn-icon-split"> 
                                        <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                        <span class="text ml-2 mr-2">View</span>
                                    </a>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <a href="product_category_update?id=<?=$row['product_category_id'];?>" class="btn btn-success btn-icon-split"> 
                                        <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                        <span class="text">Update</span>
                                    </a>
                                </div>
                                <!-- <div class="col-md-12 mb-1">
                                    <form action="code.php" method="POST" style="zoom:105%;">  
                                        <button type="submit" name="category_delete" value="<?=$row['product_category_id']; ?>" class="btn btn-danger btn-icon-split" href="#">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </button> 
                                    </form>
                                </div> -->
                                <div class="col-md-12 mb-1" style="zoom:103%;">
                                    <button type="button" data-toggle="modal" value="<?=$row['product_category_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                            }
                        } else{
                    ?>
                        <tr>
                            <td colspan="6">No Record Found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>





<?php include('../includes/footer.php');?>

<!-- Modal -->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item number <label id="label"></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="code.php" method="POST">
            <input type="hidden" id="delete_id" name="category_delete" value="">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script>
    function deleteModal(button) {
        var id = button.value;
        document.getElementById("delete_id").value = id;
        document.getElementById("label").innerHTML = id;
    }
</script>