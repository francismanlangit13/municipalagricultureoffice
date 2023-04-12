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
        <a href="request_add.php" class="btn btn-success btn-icon-split"> 
            <span class="icon text-white-50">
            <i class="fas fa-archive"></i>
            </span>
            <span class="text">Add Request</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_SESSION['auth_user'])) 
                            $currentUSER = $_SESSION['auth_user']['user_id'];
                            $query = "SELECT
                            request.request_id, 
                            request.id, 
                            product.product_name, 
                            request.request_quantity, 
                            request.description, 
                            request.request_date, 
                            request.status_id, 
                            product.product_image
                            FROM
                            request
                            INNER JOIN
                            product
                            ON 
                            request.product_id = product.product_id
                            INNER JOIN
                            user
                            ON 
                            request.id = user.user_id
                            WHERE
                            request.id = $currentUSER";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0){
                                foreach($query_run as $row){
                    ?>
                    <tr>
                        <td><?= $row['request_id']; ?></td>
                        <td><?= $row['product_name']; ?></td>
                        <td>
                            <img class="icon-circle"
                            src="
                                <?php
                                    if(isset($row['product_image'])){
                                        if(!empty($row['product_image'])) {
                                        echo base_url . 'assets/img/users/' . $row['product_image'];
                                    } else { echo base_url . 'assets/img/system/no-image.png'; } }
                                ?>
                            " alt="image" style="height:5rem !important; width:5rem !important; display:inline !important; margin-left:0.4rem;">
                        </td>
                        <td class="text-center"><?= $row['request_quantity']; ?></td>
                        <td><?= $row['description'];?></td>
                        <td> <?php if($row['status_id'] == "Pending"){ ?>
                                <p> <span style="color: blue;">Pending</span></p>
                            <?php } elseif($row['status_id'] == "Approved"){ ?>
                                <p><span style="color: green;">Approved</span></p>
                            <?php } else{ ?>
                                <p><span style="color: red;">Deny</span></p>
                            <?php } ?>
                        </td>
                        <td>  
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" <?php if ($row['status_id'] == 'Approved') echo 'disabled'; ?> class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="request_update.php?id=<?=$row['request_id'];?>">UPDATE</a>
                                    <form action="code.php" method="post"> 
                                    <button class="dropdown-item" type="submit" name="delete_request" value="<?= $row['request_id']; ?>" >DELETE</button>
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





