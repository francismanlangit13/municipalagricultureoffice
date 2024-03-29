<?php include('../includes/header.php');?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Accounts</li>
    <li class="breadcrumb-item">User</li>
</ol>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-flex justify-content-between">
            <a href="user_add" class="btn btn-success btn-icon-split"> 
                <span class="icon text-white-50">
                    <i class="fas fa-user"></i>
                </span>
                <span class="text">Add User Account</span>
            </a>
            <form method="post" action="code.php">
                <button class="btn btn-success btn-icon-split" type="submit" name="export_user">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-csv"></i>
                    </span>
                    <span class="text">CSV</span>
                </button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th width="5%">No.</th>
                        <th width="25%">Name</th>
                        <th width="10%">Gender</th>
                        <th width="10%">Picture</th>
                        <th width="20%">Email</th>
                        <th width="15%">Phone</th>
                        <th width="5%">Role</th>
                        <th width="10%">Status</th>
                        <th width="10%">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $user_id = $_SESSION['auth_user']['user_id'];
                        $query = "SELECT
                            `user`.user_id, 
                            `user`.fname, 
                            `user`.mname, 
                            `user`.lname,
                            `user`.suffix,
                            `user`.gender,
                            `user`.email,
                            `user`.phone,
                            `user`.`password`, 
                            `user`.picture,
                            `user`.user_status_id,
                            user_type.user_name, 
                            user_status.user_status_name,
                            user_type.user_name
                        FROM
                            `user`
                        INNER JOIN
                            user_type
                        ON 
                            `user`.user_type_id = user_type.user_type_id
                        INNER JOIN
                            user_status
                        ON 
                            `user`.user_status_id = user_status.user_status_id
                        WHERE
                            `user`.user_status_id != 3 && `user`.user_type_id != 3 AND user.user_id != $user_id";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $row){
                    ?>
                    <tr class="text-center">
                        <td><?= $row['user_id']; ?></td>
                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> <?= $row['suffix']; ?></td>
                        <td><?= $row['gender']; ?></td>
                        <td>
                            <a href="
                                <?php
                                    if(isset($row['picture'])){
                                        if(!empty($row['picture'])){ 
                                            echo base_url . 'assets/img/users/' . $row['picture'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="<?php if($row['user_name'] == 'Admin'){ echo"ADMIN: ";} else{ echo"STAFF: ";} echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . ' ' . $row['suffix']; ?>">
                                <img class="zoom img-fluid img-bordered-sm"
                                src="
                                    <?php
                                        if(isset($row['picture'])){
                                            if(!empty($row['picture'])){ 
                                                echo base_url . 'assets/img/users/' . $row['picture'];
                                        } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                    ?>
                                " alt="image" style="height: 120px; max-width: 120px; object-fit: cover;">
                            </a>
                        </td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['phone']; ?></td>
                        <td><?= $row['user_name']; ?></td>
                        <td>
                            <?php if($row['user_status_id'] == 1){ ?>
                                <span class="rounded-pill badge badge-success bg-gradient-success px-3">Active</span>
                            <?php } else { ?>
                                <span class="rounded-pill badge badge-danger bg-gradient-danger px-3">In active</span>
                            <?php } ?>
                        </td>
                        <td> 
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 mb-1" style="zoom:97%">
                                    <a href="user_view?id=<?=$row['user_id'];?>" class="btn btn-info btn-icon-split"> 
                                        <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                        <span class="text ml-2 mr-2">View</span>
                                    </a>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <a href="user_update?id=<?=$row['user_id'];?>" class="btn btn-success btn-icon-split" style="zoom:97%"> 
                                        <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                        <span class="text">Update</span>
                                    </a>
                                </div>
                                <div class="col-md-12 mb-1" style="zoom:103%;">
                                    <button type="button" data-toggle="modal" value="<?=$row['user_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } } else{ ?>
                        <tr class="text-center">
                            <td colspan="10">No Record Found</td>
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
            <input type="hidden" id="delete_id" name="user_delete" value="">
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