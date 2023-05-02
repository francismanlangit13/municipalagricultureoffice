<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Other</li>
    <li class="breadcrumb-item">Concern</li>
</ol>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 text-center">
        <h2><strong>FARMER'S CONCERN</strong></h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>  
                        <th style="width:5%">No.</th>
                        <th style="width:10%">Refernce Number</th>
                        <th style="width:20%">Full Name</th>
                        <th style="width:35%">Message</th>
                        <th style="width:15%">Date Filed</th>
                        <th style="width:5%">Status</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT
                        *, DATE_FORMAT(concern.date_created, '%m-%d-%Y %h:%i:%s %p') as short_date_created
                        FROM
                        concern
                        INNER JOIN
                        status
                        ON 
                        concern.status_id = status.status_id
                        INNER JOIN
                        user
                        ON 
                        concern.user_id = user.user_id
                        WHERE concern_status != 2";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $row){
                    ?>
                    <?php if ($row['short_date_created'] >= date('m-d-Y', strtotime('-2 days'))){ ?>
                        <tr style="background-color: #79e179; border: 1.5px solid #000000 !important; color:black !important;">
                            <td><?= $row['concern_id']; ?></td>
                            <td><?= $row['reference_number']; ?></td>
                            <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                            <td><?= $row['message']; ?></td>
                            <td><?= $row['short_date_created']; ?></td>
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
                                        <a href="concern_view?id=<?=$row['concern_id'];?>" class="btn btn-info btn-icon-split"> 
                                            <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                            <span class="text ml-2 mr-2">View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-1" style="zoom:103%;">
                                    <button type="button" data-toggle="modal" value="<?=$row['concern_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } elseif ($row['short_date_created'] >= date('m-d-Y', strtotime('-5 days'))){ ?>
                        <tr style="background-color: #ffd57f; border: 1.5px solid #000000 !important; color:black !important;">
                            <td><?= $row['concern_id']; ?></td>
                            <td><?= $row['reference_number']; ?></td>
                            <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                            <td><?= $row['message']; ?></td>
                            <td><?= $row['short_date_created']; ?></td>
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
                                        <a href="concern_view?id=<?=$row['concern_id'];?>" class="btn btn-info btn-icon-split"> 
                                            <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                            <span class="text ml-2 mr-2">View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-1" style="zoom:103%;">
                                    <button type="button" data-toggle="modal" value="<?=$row['concern_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } elseif ($row['short_date_created'] >= date('m-d-Y', strtotime('-7 days'))){ ?>
                        <tr style="background-color: #ff947fe6; border: 1.5px solid #000000 !important; color:black !important;">
                            <td><?= $row['concern_id']; ?></td>
                            <td><?= $row['reference_number']; ?></td>
                            <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                            <td><?= $row['message']; ?></td>
                            <td><?= $row['short_date_created']; ?></td>
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
                                        <a href="concern_view?id=<?=$row['concern_id'];?>" class="btn btn-info btn-icon-split"> 
                                            <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                            <span class="text ml-2 mr-2">View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-1" style="zoom:103%;">
                                    <button type="button" data-toggle="modal" value="<?=$row['concern_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php } else{ ?>
                        <tr style="background-color: #b1b1b196; border: 1.5px solid #000000 !important; color:black !important;">
                            <td><?= $row['concern_id']; ?></td>
                            <td><?= $row['reference_number']; ?></td>
                            <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                            <td><?= $row['message']; ?></td>
                            <td><?= $row['short_date_created']; ?></td>
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
                                        <a href="concern_view?id=<?=$row['concern_id'];?>" class="btn btn-info btn-icon-split"> 
                                            <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                            <span class="text ml-2 mr-2">View</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-1" style="zoom:103%;">
                                    <button type="button" data-toggle="modal" value="<?=$row['concern_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
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
            <input type="hidden" id="delete_id" name="delete_concern" value="">
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