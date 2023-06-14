<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Request</li>
</ol>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="request_add" class="btn btn-success btn-icon-split"> 
            <span class="icon text-white-50">
            <i class="fas fa-archive"></i>
            </span>
            <span class="text">Add Request</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width:5%">ID</th>
                        <th style="width:15%">Product Name</th>
                        <th style="width:20%">Product Image</th>
                        <th style="width:10%">Quantity</th>
                        <th style="width:25%">Description</th>
                        <th style="width:10%">Date request</th>
                        <th style="width:10%">Status</th>
                        <th style="width:15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_SESSION['auth_user'])) 
                            $currentUSER = $_SESSION['auth_user']['user_id'];
                            $query = "SELECT
                            *, DATE_FORMAT(request.request_date, '%m-%d-%Y %h:%i:%s %p') as short_date_created
                            FROM
                            request
                            INNER JOIN
                            product
                            ON 
                            request.product_id = product.product_id
                            INNER JOIN
                            user
                            ON
                            request.user_id = user.user_id
                            WHERE
                            request_status = 1 AND request.user_id = $currentUSER ORDER BY request.request_date DESC";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row){
                    ?>
                    <tr>
                        <td><?= $row['request_id']; ?></td>
                        <td><?= $row['product_name']; ?></td>
                        <td>
                            <img src="
                                <?php
                                    if(isset($row['photo'])){
                                        if(!empty($row['photo'])) {
                                        echo base_url . 'assets/img/products/' . $row['photo'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>
                            " alt="image" style="height:5rem !important; width:5rem !important; display:inline !important; margin-left:0.4rem;">
                        </td>
                        <td class="text-center"><?= $row['request_quantity']; ?></td>
                        <td><?= $row['description'];?></td>
                        <td class="text-center"><?= $row['short_date_created']; ?></td>
                        <td>
                            <?php if($row['status_id'] == 1){ ?>
                                <span class="rounded-pill badge badge-secondary bg-gradient-secondary px-3">Pending</span>
                            <?php }  else if($row['status_id'] == 2){ ?>
                                <span class="rounded-pill badge badge-success bg-gradient-success px-3">Approved</span>
                            <?php } else { ?>
                                <span class="rounded-pill badge badge-danger bg-gradient-danger px-3">Deny</span>
                            <?php } ?>
                        </td>
                        <td> 
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 mb-1" style="zoom:95%">
                                    <a href="request_view?id=<?=$row['request_id'];?>" class="btn btn-info btn-icon-split"> 
                                        <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                        <span class="text ml-2 mr-2">View</span>
                                    </a>
                                </div>
                                <?php 
                                    $date_timestamp = strtotime($row['request_date']);
                                    
                                    // Format $row['date_created'] and the current date as "Y-m-d H:i:s"
                                    $date_created = date("Y-m-d H:i:s", $date_timestamp);
                                    $current_date = date("Y-m-d H:i:s", strtotime("-10 minutes")); // set 10 minutes can update the information.
                                    
                                    // Check if $row['date_created'] is greater than the current date
                                    if ($date_created > $current_date){
                                ?>
                                    <?php if($row['status_id']=="1"){ ?>
                                        <div class="col-md-12 mb-1">
                                            <a href="request_update?id=<?=$row['request_id'];?>" class="btn btn-success btn-icon-split" style="zoom:95%"> 
                                                <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                                <span class="text">Update</span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-12 mb-1" style="zoom:103%;">
                                        <button type="button" data-toggle="modal" value="<?=$row['request_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </button>
                                    </div>
                                <?php } else { } ?>
                                <?php 
                                    $date_timestamp = strtotime($row['request_date']);
                                    
                                    // Format $row['date_created'] and the current date as "Y-m-d H:i:s"
                                    $date_created = date("Y-m-d H:i:s", $date_timestamp);
                                    $deadline = date("Y-m-d H:i:s", strtotime("-7 days")); // set 7days can show update and delete the information.
                                    
                                    // Check if $row['date_created'] is greater than the current date
                                    if ($date_created < $deadline){
                                ?>
                                    <div class="col-md-12 mb-1" style="zoom:103%;">
                                        <button type="button" data-toggle="modal" value="<?=$row['request_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </button>
                                    </div>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                    <?php
                            }
                        }
                        else{
                    ?>
                        <tr>
                            <td colspan="7">No Record Found</td>
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
            <input type="hidden" id="delete_id" name="delete_request" value="">
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