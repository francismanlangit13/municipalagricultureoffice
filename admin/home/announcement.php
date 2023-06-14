<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Other</li>
    <li class="breadcrumb-item">Announcement</li>
</ol>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="announcement_add" class="btn btn-success btn-icon-split"> 
            <span class="icon text-white-50">
                <i class="fas fa-bullhorn"></i>
            </span>
            <span class="text">Add Announcement</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width:5%">No.</th>
                        <th style="width:15%">Title</th>
                        <th style="width:40%">Body</th>
                        <th style="width:20%">Date Announced</th>
                        <th style="width:20%">Posted By</th>
                        <th style="width:10%">Status</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT announcement.*, user.*, DATE_FORMAT(announcement.ann_date, '%m-%d-%Y %h:%i:%s %p') as short_date
                        FROM announcement
                        INNER JOIN user
                        ON announcement.user_id = user.user_id
                        WHERE ann_status != 'Archive' AND ann_deleted != 1";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $row){
                    ?>
                    <tr>
                        <td><?= $row['ann_id']; ?></td>
                        <td><?= $row['ann_title']; ?></td>
                        <td><?= $row['ann_body']; ?></td>
                        <td><?= $row['short_date']; ?></td>
                        <td><?= $row['fname']; ?> <?= $row['lname']; ?></td>
                        <td>
                            <?php if($row['ann_status'] == 'Pending'){ ?>
                                <span class="rounded-pill badge badge-success bg-gradient-info px-3">Pending</span>
                            <?php } else{ ?>
                                <span class="rounded-pill badge badge-success bg-gradient-success px-3">Posted</span>
                            <?php } ?>
                        </td>
                        <td> 
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 mb-1" style="zoom:95%">
                                    <a href="announcement_view?id=<?=$row['ann_id'];?>" class="btn btn-info btn-icon-split"> 
                                        <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                        <span class="text ml-2 mr-2">View</span>
                                    </a>
                                </div>
                                <?php if ($row['ann_status'] != 'Posted'){ ?>
                                    <div class="col-md-12 mb-1">
                                        <a href="announcement_update?id=<?=$row['ann_id'];?>" class="btn btn-success btn-icon-split"> 
                                            <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                            <span class="text">Update</span>
                                        </a>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <button type="submit" data-toggle="modal" value="<?=$row['ann_id']; ?>" data-target="#exampleModalPublish" onclick="publishModal(this)" class="btn btn-warning btn-icon-split" href="#">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-paper-plane"></i>
                                            </span>
                                            <span class="text">Publish</span>
                                        </button>
                                    </div>
                                <?php } ?>
                                <!-- <div class="col-md-12 mb-1">
                                    <form action="code.php" method="POST" style="zoom:105%;">
                                        <button type="submit" name="ann_delete" value="<?=$row['ann_id']; ?>" class="btn btn-danger btn-icon-split" href="#">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </button> 
                                    </form>
                                </div> -->
                                <div class="col-md-12 mb-1" style="zoom:103%;">
                                    <button type="button" data-toggle="modal" value="<?=$row['ann_id']; ?>" data-target="#exampleModalDelete" onclick="deleteModal(this)" class="btn btn-danger btn-icon-split">
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
                        }
                            else{
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

<!-- Modal Delete -->
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
            <input type="hidden" id="delete_id" name="ann_delete" value="">
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

<!-- Modal Publish -->
<div class="modal fade" id="exampleModalPublish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Publish Announcement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to publish this announcement <label id="label_post"></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="code.php" method="POST">
            <input type="hidden" id="ann_post" name="ann_post" value="">
            <button type="submit" class="btn btn-warning">Publish</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script>
    function publishModal(button) {
        var id = button.value;
        document.getElementById("ann_post").value = id;
        document.getElementById("label_post").innerHTML = id;
    }
</script>