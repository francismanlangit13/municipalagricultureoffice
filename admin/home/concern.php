<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>


<div class="container-fluid">
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
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Concern #</th>
                                            <th>Name</th>
                                            <th>Images</th>
                                            <th>Message</th>
                                            <th>Date Filed</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            $query = "SELECT
                            concern.concern_id, 
                            farmer.lname, 
                            farmer.mname, 
                            farmer.fname, 
                            concern.pic1, 
                            concern.pic2, 
                            concern.date_created, 
                            concern.concern_message
                        FROM
                            concern
                            INNER JOIN
                            farmer
                            ON 
                                concern.user_id = farmer.user_id";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                    <td><?= $row['concern_id']; ?></td>
                                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                                        <td>

                                        <?php 
echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($row['pic1']).'" 
alt="image" style="height: 170px; max-width: 310px; object-fit: cover;">';
?>

<?php 
echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($row['pic2']).'" 
alt="image" style="height: 170px; max-width: 310px; object-fit: cover;">';
?>

                                        </td>
                                        <td><?= $row['concern_message']; ?></td>
                                        <td><?= $row['date_created']; ?></td>
                                    
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