<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>


<div class="container-fluid">
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
request_status.request_name, 
product.product_image
FROM
request
INNER JOIN
product
ON 
    request.product_id = product.product_id
INNER JOIN
farmer
ON 
    request.id = farmer.user_id
INNER JOIN
request_status
ON 
    request.request_status = request_status.request_id
WHERE
request.id = $currentUSER";
$query_run = mysqli_query($con, $query);
if(mysqli_num_rows($query_run) > 0)
{
    foreach($query_run as $row)
    {
        ?>
        <tr>
        <td><?= $row['request_id']; ?></td>
            <td><?= $row['product_name']; ?></td>
            <td> <?php 
              echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($row['product_image']).'" 
              alt="image" style="height: 200px; object-fit: cover;">';
            ?></td>
            <td class="text-center"><?= $row['request_quantity']; ?></td>
            <td><?= $row['description'];?></td>
            <td>            <?php
                            if($row['request_name'] == "Pending"){
                            ?>
                                <p> <span style="color: blue;">Pending</span></p>
                            <?php
                            }elseif($row['request_name'] == "Approved"){
                            ?>
                                <p><span style="color: green;">Approved</span></p>
                            <?php
                            }else{
                            ?>
                            <p><span style="color: red;">Deny</span></p>
                            <?php
                            }
                                ?>
                                </td>
            
            <td>  
                <!-- Example single danger button -->
<div class="btn-group">
  <button type="button" <?php if ($row['request_name'] == 'Approved') echo 'disabled'; ?> class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
else
{
?>
    <tr>
        <td colspan="7">No Record Found</td>
    </tr>
<?php
}
?>
        </tbody>
    </table>
</div>
</div>
</div>

</div>





<?php include('includes/footer.php');?>





