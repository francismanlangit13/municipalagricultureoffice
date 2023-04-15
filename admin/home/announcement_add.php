<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Other</li>
    <li class="breadcrumb-item">Announcement</li>
    <li class="breadcrumb-item">Add Announcement</li>
</ol>
<form action="code.php" method="post" autocomplete="off" enctype="multipart/form-data">  
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Announcement information</h5>
                </div>
                <div class="card-body">
                    <div class="row"> 
                        <div class="col-md-12 mb-3">
                            <label for="" class="required">Title</label>
                            <input required placeholder="Enter Announcement Title" type="text" name="announcement_title" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                        <label for="Description" class="required">Body</label>
                        <textarea placeholder="Enter Message" required type="text"  name="announcement_message" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="required">Sender</label>
                            <input required placeholder="Enter Sender" type="text" name="announcement_sender" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3" >
                        <label for="">Date</label>
                        <input type="input" name="announcement_dt" id="date" value="<?php echo date ?>" class="form-control">
                        </div>       
                    </div>
                </div>
            </div>
            <br>
                <div class="text-right">
                    <a href="javascript:history.back()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" name="add_announcement" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                </div>
            <br>
        </div>
    </div>
</form>

<?php include('../includes/footer.php');?>