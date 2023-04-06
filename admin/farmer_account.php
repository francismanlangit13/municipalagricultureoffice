<?php include('authentication.php'); ?>
<?php include('includes/header.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <ol class="breadcrumb mb-4">    
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Farmer</li>
                </ol>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <a href="farmer_add.php" class="btn btn-success btn-icon-split"> 
                                        <span class="icon text-white-50">
                                        <i class="fas fa-user"></i>
                                        </span>
                                        <span class="text">Add Farmer Account</span>
                                    </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th class="text-center" width="15%">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            $query = "SELECT
                            `user`.user_id, 
                            `user`.fname, 
                            `user`.mname, 
                            `user`.lname, 
                            `user`.email, 
                            `user`.`password`, 
                            `user`.picture,
                            `user`.gender,
                            user_type.user_name, 
                            user_status.user_status_name,
                            user_type.user_name
                        FROM
                            `user`
                            INNER JOIN
                            user_type
                            ON 
                                `user`.user_type = user_type.user_id
                            INNER JOIN
                            user_status
                            ON 
                                `user`.user_status = user_status.user_status_id
                        WHERE
                            `user`.user_status = 1 && `user`.user_type = 3";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $row['fname']; ?> <?= $row['mname']; ?> <?= $row['lname']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['gender']; ?></td>
                                        <td><?= $row['user_status_name']; ?></td>
                                        <td class="text-center"> 
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-md-12 mb-1" style="zoom:95%">
                                                    <a href="farmer_view.php?id=<?=$row['user_id'];?>" class="btn btn-info btn-icon-split"> 
                                                        <span class="icon text-white-50"><i class="fas fa-eye"></i></span>
                                                        <span class="text ml-2 mr-2">View</span>
                                                    </a>
                                                </div>
                                                <div class="col-md-12 mb-1">
                                                    <a href="farmer_update.php?id=<?=$row['user_id'];?>" class="btn btn-success btn-icon-split"> 
                                                        <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                                        <span class="text">Update</span>
                                                    </a>
                                                </div>
                                                <div class="col-md-12 mb-1">
                                                    <form action="code.php" method="POST" style="zoom:105%;">  
                                                        <button type="submit" name="user_delete" value="<?=$row['user_id']; ?>" class="btn btn-danger btn-icon-split" href="#">
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
                            else
                            {
                            ?>
                                <tr>
                                    <td colspan="6">No Record Found</td>
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
                <!-- /.container-fluid -->
<?php include('includes/footer.php');?>