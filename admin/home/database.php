<?php
    include('../includes/header.php');
?>

<ol class="breadcrumb mb-4">    
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Maintenance</li>
  <li class="breadcrumb-item">Database</li>
</ol>

<div class="container">
    <h2><center>Database</center></h2>
</div>

<head>
<style>
    #frm-restore {
        background: #aee5ef;
        padding: 20px;
        border-radius: 2px;
        border: #a3d7e0 1px solid;
    }

    .form-row {
        margin-bottom: 20px;
    }

    .input-file {
        background: #FFF;
        padding: 10px;
        margin-top: 5px;
        border-radius: 2px;
    }

    .btn-action {
        background: #333;
        border: 0;
        padding: 10px 40px;
        color: #FFF;
        border-radius: 2px;
    }

    .response {
        padding: 10px;
        margin-bottom: 20px;
    border-radius: 2px;
    }

    .errordb {
        background: #fbd3d3;
        font-size: 16px;
        border: #efc7c7 1px solid;
    }

    .success {
        background: #cdf3e6;
        border: #bee2d6 1px solid;
    }
    </style>
</head>
    <form method="post" action="code.php" enctype="multipart/form-data" onsubmit="showLoading()" id="frm-restore">
        <div class="form-row col-md-5">
            <div class="mr-2">Choose Backup File</div>
            <div>
                <input type="file" name="backup_file" class="form-control-file btn btn-secondary" required accept=".sql">
                <i style="color:red">Warning! Restoring the wrong database file will crash this system. Proceed with caution!</i>
            </div>
        </div>
        <div>
            <button  type="submit" name="restore" class="btn-action">Restore</button>
    </form>
            <br><br>
            <form method="post" action="data_export.php">
                <input type="submit" value="Backup" class="btn-action" />
            </form>
        </div>
</html>

<?php include('../includes/footer.php'); ?>
<script>
    function showLoading() {
        document.getElementById("loading").style.display = "";
        var element = document.getElementById("loading");
        element.classList.remove("fade-out");
    }
</script>