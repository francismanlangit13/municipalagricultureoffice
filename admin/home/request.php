<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Other</li>
    <li class="breadcrumb-item">Request</li>
</ol>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 text-center"> 
            <span class="text h4">Farmer Request</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width:5%">No.</th>
                        <th style="width:10%">Refernce Number</th>
                        <th style="width:25%">Full Name</th>
                        <th style="width:10%">Barangay</th>
                        <th style="width:20%">Product Name</th>
                        <th style="width:10%">Quantity</th>
                        <th style="width:10%">Status</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT
                        request.request_id,
                        user.fname, 
                        user.lname,
                        user.mname,
                        user.suffix,
                        user.reference_number,
                        user.barangay, 
                        product.product_name, 
                        request.request_quantity, 
                        request.request_date, 
                        status.status_name, 
                        request.status_id, DATE_FORMAT(request.request_date, '%m-%d-%Y %h:%i:%s %p') as short_date
                        FROM
                        request
                        INNER JOIN
                        user
                        ON 
                        request.user_id = user.user_id
                        INNER JOIN
                        product
                        ON 
                        request.product_id = product.product_id
                        INNER JOIN
                        status
                        ON 
                        request.status_id = status.status_id
                        WHERE
                        request_status != 2";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $row){
                    ?>
                    <?php if ($row['short_date'] >= date('m-d-Y', strtotime('-2 days'))){ ?>
                        <tr style="background-color: #79e179; color:black !important;">
                            <td><?= $row['request_id']; ?></td>
                            <td><?= $row['reference_number']; ?></td>
                            <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> <?= $row['suffix']; ?></td>
                            <td><?= $row['barangay']; ?></td>
                            <td><?= $row['product_name']; ?></td>
                            <td><?= $row['request_quantity']; ?></td>
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
                                    <div class="col-md-12 mb-1" style="zoom:97%">
                                        <?php if($row['status_id'] == 1){ ?>
                                            <a href="request_update?id=<?=$row['request_id'];?>" class="btn btn-success btn-icon-split"> 
                                                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                                <span class="text">Update</span>
                                            </a>
                                        <?php } else{ ?>
                                            <!-- <a href="request_view?id=<?=$row['request_id'];?>" class="btn btn-info btn-icon-split"> 
                                                <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                                <span class="text ml-2 mr-2">View</span>
                                            </a> -->
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-1" style="zoom:103%;">
                                    <button type="button" data-toggle="modal" value="<?=$row['request_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } elseif ($row['short_date'] >= date('m-d-Y', strtotime('-5 days'))){ ?>
                        <tr style="background-color: #ffd57f; color:black !important;">
                            <td><?= $row['request_id']; ?></td>
                            <td><?= $row['reference_number']; ?></td>
                            <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> <?= $row['suffix']; ?></td>
                            <td><?= $row['barangay']; ?></td>
                            <td><?= $row['product_name']; ?></td>
                            <td><?= $row['request_quantity']; ?></td>
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
                                    <div class="col-md-12 mb-1" style="zoom:97%">
                                        <?php if($row['status_id'] == 1){ ?>
                                            <a href="request_update?id=<?=$row['request_id'];?>" class="btn btn-success btn-icon-split"> 
                                                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                                <span class="text">Update</span>
                                            </a>
                                        <?php } else{ ?>
                                            <!-- <a href="request_view?id=<?=$row['request_id'];?>" class="btn btn-info btn-icon-split"> 
                                                <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                                <span class="text ml-2 mr-2">View</span>
                                            </a> -->
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-1" style="zoom:103%;">
                                    <button type="button" data-toggle="modal" value="<?=$row['request_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } elseif ($row['short_date'] >= date('m-d-Y', strtotime('-7 days'))){ ?>
                        <tr style="background-color: #ff947fe6; color:black !important;">
                            <td><?= $row['request_id']; ?></td>
                            <td><?= $row['reference_number']; ?></td>
                            <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> <?= $row['suffix']; ?></td>
                            <td><?= $row['barangay']; ?></td>
                            <td><?= $row['product_name']; ?></td>
                            <td><?= $row['request_quantity']; ?></td>
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
                                    <div class="col-md-12 mb-1" style="zoom:97%">
                                        <?php if($row['status_id'] == 1){ ?>
                                            <a href="request_update?id=<?=$row['request_id'];?>" class="btn btn-success btn-icon-split"> 
                                                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                                <span class="text">Update</span>
                                            </a>
                                        <?php } else{ ?>
                                            <!-- <a href="request_view?id=<?=$row['request_id'];?>" class="btn btn-info btn-icon-split"> 
                                                <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                                <span class="text ml-2 mr-2">View</span>
                                            </a> -->
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-1" style="zoom:103%;">
                                    <button type="button" data-toggle="modal" value="<?=$row['request_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } else{ ?>
                        <tr style="background-color: #b1b1b196; color:black !important;">
                            <td><?= $row['request_id']; ?></td>
                            <td><?= $row['reference_number']; ?></td>
                            <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> <?= $row['suffix']; ?></td>
                            <td><?= $row['barangay']; ?></td>
                            <td><?= $row['product_name']; ?></td>
                            <td><?= $row['request_quantity']; ?></td>
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
                                    <div class="col-md-12 mb-1" style="zoom:97%">
                                        <?php if($row['status_id'] == 1){ ?>
                                            <a href="request_update?id=<?=$row['request_id'];?>" class="btn btn-success btn-icon-split"> 
                                                <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                                <span class="text">Update</span>
                                            </a>
                                        <?php } else{ ?>
                                            <!-- <a href="request_view?id=<?=$row['request_id'];?>" class="btn btn-info btn-icon-split"> 
                                                <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                                <span class="text ml-2 mr-2">View</span>
                                            </a> -->
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-1" style="zoom:103%;">
                                    <button type="button" data-toggle="modal" value="<?=$row['request_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php
                            }
                        } else{
                    ?>
                        <tr>
                            <td colspan="8">No Record Found</td>
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