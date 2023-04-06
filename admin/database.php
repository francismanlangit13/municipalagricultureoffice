<?php include('authentication.php');?>
<?php include('includes/header.php');?>



<ol class="breadcrumb mb-4">    
  <li class="breadcrumb-item">Dashboard</li>
  <li class="breadcrumb-item">Database</li>
</ol>


<div class="container">
    <h2><center>Database</center></h2>

    <a class="mt-2" href="data_export.php" style="font-size: 30px;">Backup</a> <br>


</div>



<?php
$conn = mysqli_connect("localhost", "root", "", "maojimenez");
if (! empty($_FILES)) {
    // Validating SQL file type by extensions
    if (! in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
        "sql"
    ))) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"],'../database/'.$_FILES["backup_file"]["name"]);
            $response = restoreMysqlDB('../database/'.$_FILES["backup_file"]["name"], $conn);
        }
    }
}

function restoreMysqlDB($filePath, $conn)
{
    $sql = '';
    $error = '';

    // SQL query to drop all tables
    $qry = "SET FOREIGN_KEY_CHECKS = 0;";
    $result = mysqli_query($conn, $qry);

    $qry = "SHOW TABLES";
    $result = mysqli_query($conn, $qry);

    while($row = mysqli_fetch_row($result)) {
      $qry = "DROP TABLE IF EXISTS $row[0]";
      mysqli_query($conn, $qry);
    }

    $qry = "SET FOREIGN_KEY_CHECKS = 1;";
    $result = mysqli_query($conn, $qry);
    

    if (file_exists($filePath)) {
        $lines = file($filePath);
        
        foreach ($lines as $line) {
            
            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }
            
            $sql .= $line;
            
            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';
            }
        } // end foreach
        
        if ($error) {
            $response = array(
                "type" => "errordb",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
        }
        exec('rm ' . $filePath);
    } // end if file exists
    
    return $response;
}

?>
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
<?php
if (! empty($response)) {
    ?>
<div class="response <?php echo $response["type"]; ?>">
<?php echo nl2br($response["message"]); ?>
</div>
<?php
}
?>
    <form method="post" action="" enctype="multipart/form-data"
        id="frm-restore">
        <div class="form-row">
            <div>Choose Backup File</div>
            <div>
                <input type="file" name="backup_file" class="input-file" />
            </div>
        </div>
        <div>
            <input type="submit" name="restore" value="Restore"
                class="btn-action" />
        </div>
    </form>
</html>
         


<?php include('includes/footer.php');?>