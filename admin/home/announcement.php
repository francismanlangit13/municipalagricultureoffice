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
                        <th style="width:10%">Status</th>
                        <th style="width:20%">Date Announced</th>
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT
                        announcement.*
                        FROM
                        announcement
                        WHERE ann_status != 'Archive'";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            $number = 1; // Define a variable to keep track of the iterations
                            foreach($query_run as $row){
                    ?>
                    <tr>
                        <td><?= $number++ ?></td>
                        <td><?= $row['ann_title']; ?></td>
                        <td><?= $row['ann_body']; ?></td>
                        <td><?= $row['ann_status']; ?></td>
                        <td><?= $row['ann_date']; ?></td>
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
                                        <form action="code.php" method="POST" style="zoom:97%;">
                                            <button type="submit" name="ann_post" value="<?=$row['ann_id']; ?>" class="btn btn-warning btn-icon-split" href="#">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-paper-plane"></i>
                                                </span>
                                                <span class="text">Publish</span>
                                            </button>
                                        </form>
                                    </div>
                                <?php } ?>
                                <div class="col-md-12 mb-1">
                                    <form action="code.php" method="POST" style="zoom:105%;">
                                        <button type="submit" name="ann_delete" value="<?=$row['ann_id']; ?>" class="btn btn-danger btn-icon-split" href="#">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </button> 
                                    </form>
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