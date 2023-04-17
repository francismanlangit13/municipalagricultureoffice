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
                        <th style="width:20%">Image</th>
                        <th style="width:10%">Quantity</th>
                        <th style="width:25%">Description</th>
                        <th style="width:10%">Status</th>
                        <th style="width:15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_SESSION['auth_user'])) 
                            $currentUSER = $_SESSION['auth_user']['user_id'];
                            $query = "SELECT
                            *
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
                            request.user_id = $currentUSER";
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
                        <td> <?php if($row['status_id'] == "1"){ ?>
                                <p> <span style="color: blue;">Pending</span></p>
                            <?php } elseif($row['status_id'] == "2"){ ?>
                                <p><span style="color: green;">Approved</span></p>
                            <?php } else{ ?>
                                <p><span style="color: red;">Deny</span></p>
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
                                <?php if($row['status_id']=="1"){ ?>
                                    <div class="col-md-12 mb-1">
                                        <a href="request_update?id=<?=$row['request_id'];?>" class="btn btn-success btn-icon-split" style="zoom:95%"> 
                                            <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                            <span class="text">Update</span>
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="col-md-12 mb-1">
                                    <form action="code.php" method="POST" style="zoom:103%;">
                                    <input type="text" name="oldimage" value="<?= $row['photo']; ?>" hidden>
                                        <button type="submit" name="delete_request" value="<?=$row['request_id'];?>" class="btn btn-danger btn-icon-split" href="#">
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
                            <td colspan="7">No Record Found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('../includes/footer.php');?>





