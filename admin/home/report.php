<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>


<div class="container-fluid">
<ol class="breadcrumb mb-4">    
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Other</li>
            <li class="breadcrumb-item">Report</li>
             </ol>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 text-center">
                            <h2><strong>REPORT</strong></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Message</th>
                                            <th>Photo #1</th>
                                            <th>Photo #2</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            $query = "SELECT
                            report.report_id,
                            farmer.fname,
                            farmer.mname,
                            farmer.lname,
                            report.message,
                            report.photo,
                            report.photo1,
                            report.date_created,
                            report.status
                            FROM
                            farmer
                            INNER JOIN report ON report.user_id = farmer.user_id
                            ";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                                        <td><?= $row['message']; ?></td>
                                        <td> <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($row['photo']).'" 
                                        alt="image" style="height: 170px; max-width: 310px; object-fit: cover;">';
                                        ?></td>

                                        <td> <?php 
                                        echo '<img class="img-fluid img-bordered-sm" src = "data:image;base64,'.base64_encode($row['photo1']).'" 
                                        alt="image" style="height: 170px; max-width: 310px; object-fit: cover;">';
                                        ?></td>
                                        <td><?= $row['date_created']; ?></td>
                                        <td class="text-center">

                                        <div class="dropdown show">
                                        <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="request_view.php?id=<?=$row['request_id'];?>">View</a>
                                       <form action="code.php" method="post">
                                        <button type="submit" class="dropdown-item"  name="req_deny" value="<?=$row['request_id'];?>">Approve</button>
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