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
                        <th style="width:25%">Farmer Name</th>
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
                        request.status_id
                        FROM
                        request
                        INNER JOIN
                        user
                        ON 
                        request.id = user.user_id
                        INNER JOIN
                        product
                        ON 
                        request.product_id = product.product_id
                        INNER JOIN
                        status
                        ON 
                        request.status_id = status.status_id
                        WHERE
                        request.status_id = 1";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0){
                            $number = 1; // Define a variable to keep track of the iterations
                            foreach($query_run as $row){
                    ?>
                    <tr>
                        <td><?= $number++ ?></td>
                        <td><?= $row['reference_number']; ?></td>
                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?> <?= $row['suffix']; ?></td>
                        <td><?= $row['barangay']; ?></td>
                        <td><?= $row['product_name']; ?></td>
                        <td><?= $row['request_quantity']; ?></td>
                        <td><?= $row['status_name']; ?></td>
                        <td> 
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12 mb-1" style="zoom:95%">
                                    <a href="request_view?id=<?=$row['request_id'];?>" class="btn btn-info btn-icon-split"> 
                                        <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                        <span class="text ml-2 mr-2">View</span>
                                    </a>
                                </div>
                            </div>
                        </td>
                    
                    </tr>
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