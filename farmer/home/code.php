<?php include('../includes/authentication.php'); 

// Logout
if(isset($_POST['logout_btn'])){
    // session_destroy();
    unset( $_SESSION['auth']);
    unset( $_SESSION['auth_role']);
    unset( $_SESSION['auth_user']);

    $_SESSION['status'] = "You have successfully disconnected from your account.";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "login");
    exit(0);
}

// Update account
if(isset($_POST['update_account'])){
    $date = date('Y-m-d H:i:s');
    $user_id= $_POST['user_id'];
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $suffix= $_POST['suffix'];
    if(isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])){
        $new_password= $_POST['password'];
        $password = md5($new_password);
        $sql0 = "UPDATE `user` SET `password` = '$password' WHERE `user_id` = '$user_id'";
        $sql0_run = mysqli_query($con, $sql0);

        $cpassword_success = "Update account";
        $cpassword_success_log = "change password";
        mysqli_query($con,"INSERT INTO user_log (user_id, type, log, date) values('".$user_id."','".$cpassword_success."','".$cpassword_success_log."','$date')");
    }
    if(isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileImage = $_FILES['image'];
        $OLDfileImage = $_POST['oldimage'];
        $customFileName = 'user_' . date('Ymd_His'); // replace with your desired file name
        $ext = pathinfo($fileImage['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName = $customFileName . '.' . $ext; // append the extension to the custom file name
        $fileTmpname = $fileImage['tmp_name'];
        $fileSize = $fileImage['size'];
        $fileError = $fileImage['error'];
        $fileExt = explode('.',$fileName);
        $fileActExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');
        if(in_array($fileActExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 10485760){
            $uploadDir = '../../assets/img/users/';
            $targetFile = $uploadDir . $fileName;
            unlink($uploadDir . $OLDfileImage);

            if (move_uploaded_file($fileTmpname, $targetFile)) {
                $query = "UPDATE `user` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`suffix`='$suffix',`email`='$email',`picture`='$fileName' WHERE `user_id`='$user_id'";
                $query_run = mysqli_query($con, $query);

                $profile_success = "Update account";
                $profile_success_log = "change profile";
                mysqli_query($con,"INSERT INTO user_log (user_id, type, log, date) values('".$user_id."','".$profile_success."','".$profile_success_log."','$date')");
    
                if($query_run){
                $_SESSION['status'] = "Account updated sucessfully";
                $_SESSION['status_code'] = "success";
                header('Location: index');
                header("Location: " . base_url . "farmer/home/");
                exit(0);
                }
                else{
                $_SESSION['status'] = "Something went wrong!";
                $_SESSION['status_code'] = "error";
                header("Location: " . base_url . "farmer/home/");
                exit(0);
                }
            }
            }
            else{
            $_SESSION['status']="File is too large file must be 10mb";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/settings");
            }
        }
        else{
            $_SESSION['status']="File Error";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/settings");
        }
        }
        else{
        $_SESSION['status']="Invalid file type";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "farmer/home/settings");
        }
    }
    else{
        $query = "UPDATE `user` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`suffix`='$suffix',`email`='$email' WHERE `user_id`='$user_id'";
        $query_run = mysqli_query($con, $query);

        $info_success = "Update account";
        $info_success_log = "update information";
        mysqli_query($con,"INSERT INTO user_log (user_id, type, log, date) values('".$user_id."','".$info_success."','".$info_success_log."','$date')");

        if($query_run){
        $_SESSION['status'] = "Account updated sucessfully";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "farmer/home/");
        exit(0);
        }
        else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "farmer/home/settings");
        exit(0);
        }
    }
}

// Add request
if(isset($_POST['add_request'])){

    $user_id = $_POST['user_id'];
    $product_id = $_POST['product'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $request_date = date('Y-m-d H:i:s');
    $status = 1;
    $request_status = 1;

    $query = "INSERT INTO `request`(`user_id`, `product_id`, `request_quantity`, `description`, `request_date`, `status_id`, `request_status`) VALUES ('$user_id', '$product_id','$quantity','$description','$request_date', '$status', '$request_status')";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Your Request has been submitted!";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "farmer/home/request");
        exit(0);
    }
    else{
        $_SESSION['status'] = "Error! Something went wrong!";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "farmer/home/request");
        exit(0);
    }
}

// Add report
if(isset($_POST["add_report"])){
    $user_id = $_POST['user_id'];
    $uploadDir = '../../assets/img/reports/';
    $report_status = '1';

    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['photo'];
        $customFileName = 'report1_' . date('Ymd_His'); // replace with your desired file name
        $ext = pathinfo($photo['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName = $customFileName . '.' . $ext; // append the extension to the custom file name
        $fileTmpname = $photo['tmp_name'];
        $fileSize = $photo['size'];
        $fileError = $photo['error'];
        $fileExt = explode('.',$fileName);
        $fileActExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');
        if(in_array($fileActExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 10485760){
                    $targetFile = $uploadDir . $fileName;
                    if (move_uploaded_file($fileTmpname, $targetFile)) {
                        // emplty code.
                    }
                }
                else{
                  $_SESSION['status']="Image1 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/report");
                }
            }
            else{
                $_SESSION['status']="Image1 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/report");
            }
        }
        else{
            $_SESSION['status']="Image1 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/report");
        }
    }
    if(isset($_FILES['photo1']) && $_FILES['photo1']['error'] === UPLOAD_ERR_OK) {
        $photo1 = $_FILES['photo1'];
        $customFileName1 = 'report2_' . date('Ymd_His'); // replace with your desired file name
        $ext1 = pathinfo($photo1['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName1 = $customFileName1 . '.' . $ext1; // append the extension to the custom file name
        $fileTmpname1 = $photo1['tmp_name'];
        $fileSize1 = $photo1['size'];
        $fileError1 = $photo1['error'];
        $fileExt1 = explode('.',$fileName1);
        $fileActExt1 = strtolower(end($fileExt1));
        $allowed1 = array('jpg','jpeg','png');
        if(in_array($fileActExt1, $allowed1)){
            if($fileError1 === 0){
                if($fileSize1 < 10485760){
                    $targetFile1 = $uploadDir . $fileName1;
                    if (move_uploaded_file($fileTmpname1, $targetFile1)) {
                        // empty code.
                    }
                }
                else{
                  $_SESSION['status']="Image2 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/report");
                }
            }
            else{
                $_SESSION['status']="Image2 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/report");
            }
        }
        else{
            $_SESSION['status']="Image2 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/report");
        }
    }

    if(isset($_FILES['photo2']) && $_FILES['photo2']['error'] === UPLOAD_ERR_OK) {
        $photo2 = $_FILES['photo2'];
        $customFileName2 = 'report3_' . date('Ymd_His'); // replace with your desired file name
        $ext2 = pathinfo($photo2['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName2 = $customFileName2 . '.' . $ext2; // append the extension to the custom file name
        $fileTmpname2 = $photo2['tmp_name'];
        $fileSize2 = $photo2['size'];
        $fileError2 = $photo2['error'];
        $fileExt2 = explode('.',$fileName2);
        $fileActExt2 = strtolower(end($fileExt2));
        $allowed2 = array('jpg','jpeg','png');
        if(in_array($fileActExt2, $allowed2)){
            if($fileError2 === 0){
                if($fileSize2 < 10485760){
                    $targetFile2 = $uploadDir . $fileName2;
                    if (move_uploaded_file($fileTmpname2, $targetFile2)) {
                        // empty code.
                    }
                }
                else{
                  $_SESSION['status']="Image3 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/report");
                }
            }
            else{
                $_SESSION['status']="Image3 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/report");
            }
        }
        else{
            $_SESSION['status']="Image3 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/report");
        }
    }

    if(isset($_FILES['photo3']) && $_FILES['photo3']['error'] === UPLOAD_ERR_OK) {
        $photo3 = $_FILES['photo3'];
        $customFileName3 = 'report4_' . date('Ymd_His'); // replace with your desired file name
        $ext3 = pathinfo($photo3['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName3 = $customFileName3 . '.' . $ext3; // append the extension to the custom file name
        $fileTmpname3 = $photo3['tmp_name'];
        $fileSize3 = $photo3['size'];
        $fileError3 = $photo3['error'];
        $fileExt3 = explode('.',$fileName3);
        $fileActExt3 = strtolower(end($fileExt3));
        $allowed3 = array('jpg','jpeg','png');
        if(in_array($fileActExt3, $allowed3)){
            if($fileError3 === 0){
                if($fileSize3 < 10485760){
                    $targetFile3 = $uploadDir . $fileName3;
                    if (move_uploaded_file($fileTmpname3, $targetFile3)) {
                        // empty code.
                    }
                }
                else{
                  $_SESSION['status']="Image4 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/report");
                }
            }
            else{
                $_SESSION['status']="Image4 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/report");
            }
        }
        else{
            $_SESSION['status']="Image4 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/report");
        }
    }

    if(isset($_FILES['photo4']) && $_FILES['photo4']['error'] === UPLOAD_ERR_OK) {
        $photo4 = $_FILES['photo4'];
        $customFileName4 = 'report5_' . date('Ymd_His'); // replace with your desired file name
        $ext4 = pathinfo($photo4['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName4 = $customFileName4 . '.' . $ext4; // append the extension to the custom file name
        $fileTmpname4 = $photo4['tmp_name'];
        $fileSize4 = $photo4['size'];
        $fileError4 = $photo4['error'];
        $fileExt4 = explode('.',$fileName4);
        $fileActExt4 = strtolower(end($fileExt4));
        $allowed4 = array('jpg','jpeg','png');
        if(in_array($fileActExt4, $allowed4)){
            if($fileError4 === 0){
                if($fileSize4 < 10485760){
                    $targetFile4 = $uploadDir . $fileName4;
                    if (move_uploaded_file($fileTmpname4, $targetFile4)) {
                        // empty code.
                    }
                }
                else{
                  $_SESSION['status']="Image5 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/report");
                }
            }
            else{
                $_SESSION['status']="Image5 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/report");
            }
        }
        else{
            $_SESSION['status']="Image5 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/report");
        }
    }

    if(isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
        $video = $_FILES['video'];
        $customFileName5 = 'report6_' . date('Ymd_His'); // replace with your desired file name
        $ext5 = pathinfo($video['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName5 = $customFileName5 . '.' . $ext5; // append the extension to the custom file name
        $fileTmpname5 = $video['tmp_name'];
        $fileSize5 = $video['size'];
        $fileError5 = $video['error'];
        $fileExt5 = explode('.',$fileName5);
        $fileActExt5 = strtolower(end($fileExt5));
        $allowed5 = array('mp4','3gp','mov');
        if(in_array($fileActExt5, $allowed5)){
            if($fileError5 === 0){
                $targetFile5 = $uploadDir . $fileName5;
                if (move_uploaded_file($fileTmpname5, $targetFile5)) {
                    // empty code.
                }
            }
            else{
                $_SESSION['status']="Video file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/report");
            }
        }
        else{
            $_SESSION['status']="Video invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/report");
        }
    }

    $report_date = date('Y-m-d H:i:s');
    $title = $_POST['title'];
    $message = $_POST['message'];
    $status = 1;

    $query = "INSERT INTO `report` (`user_id`, `title`, `message`, `photo`, `photo1`, `photo2`, `photo3`, `photo4`, `video`, `date_created`, `status_id`, `report_status`) VALUES ('$user_id','$title','$message','$fileName','$fileName1', '$fileName2', '$fileName3', '$fileName4', '$fileName5','$report_date','$status','$report_status')";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Report Submitted!";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "farmer/home/report");
        exit(0);
    } else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "farmer/home/report");
        exit(0);
    }
}

// Add concern
if(isset($_POST["add_concern"])){
    $user_id = $_POST['user_id'];
    $uploadDir = '../../assets/img/concerns/';
    $concern_status = '1';

    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['photo'];
        $customFileName = 'concern1_' . date('Ymd_His'); // replace with your desired file name
        $ext = pathinfo($photo['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName = $customFileName . '.' . $ext; // append the extension to the custom file name
        $fileTmpname = $photo['tmp_name'];
        $fileSize = $photo['size'];
        $fileError = $photo['error'];
        $fileExt = explode('.',$fileName);
        $fileActExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');
        if(in_array($fileActExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 10485760){
                    $targetFile = $uploadDir . $fileName;
                    if (move_uploaded_file($fileTmpname, $targetFile)) {
                        // emplty code.
                    }
                }
                else{
                  $_SESSION['status']="Image1 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/concern");
                }
            }
            else{
                $_SESSION['status']="Image1 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/concern");
            }
        }
        else{
            $_SESSION['status']="Image1 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/concern");
        }
    }
    if(isset($_FILES['photo1']) && $_FILES['photo1']['error'] === UPLOAD_ERR_OK) {
        $photo1 = $_FILES['photo1'];
        $customFileName1 = 'concern2_' . date('Ymd_His'); // replace with your desired file name
        $ext1 = pathinfo($photo1['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName1 = $customFileName1 . '.' . $ext1; // append the extension to the custom file name
        $fileTmpname1 = $photo1['tmp_name'];
        $fileSize1 = $photo1['size'];
        $fileError1 = $photo1['error'];
        $fileExt1 = explode('.',$fileName1);
        $fileActExt1 = strtolower(end($fileExt1));
        $allowed1 = array('jpg','jpeg','png');
        if(in_array($fileActExt1, $allowed1)){
            if($fileError1 === 0){
                if($fileSize1 < 10485760){
                    $targetFile1 = $uploadDir . $fileName1;
                    if (move_uploaded_file($fileTmpname1, $targetFile1)) {
                        // empty code.
                    }
                }
                else{
                  $_SESSION['status']="Image2 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/concern");
                }
            }
            else{
                $_SESSION['status']="Image2 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/concern");
            }
        }
        else{
            $_SESSION['status']="Image2 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/concern");
        }
    }

    if(isset($_FILES['photo2']) && $_FILES['photo2']['error'] === UPLOAD_ERR_OK) {
        $photo2 = $_FILES['photo2'];
        $customFileName2 = 'concern3_' . date('Ymd_His'); // replace with your desired file name
        $ext2 = pathinfo($photo2['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName2 = $customFileName2 . '.' . $ext2; // append the extension to the custom file name
        $fileTmpname2 = $photo2['tmp_name'];
        $fileSize2 = $photo2['size'];
        $fileError2 = $photo2['error'];
        $fileExt2 = explode('.',$fileName2);
        $fileActExt2 = strtolower(end($fileExt2));
        $allowed2 = array('jpg','jpeg','png');
        if(in_array($fileActExt2, $allowed2)){
            if($fileError2 === 0){
                if($fileSize2 < 10485760){
                    $targetFile2 = $uploadDir . $fileName2;
                    if (move_uploaded_file($fileTmpname2, $targetFile2)) {
                        // empty code.
                    }
                }
                else{
                  $_SESSION['status']="Image3 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/concern");
                }
            }
            else{
                $_SESSION['status']="Image3 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/concern");
            }
        }
        else{
            $_SESSION['status']="Image3 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/concern");
        }
    }

    if(isset($_FILES['photo3']) && $_FILES['photo3']['error'] === UPLOAD_ERR_OK) {
        $photo3 = $_FILES['photo3'];
        $customFileName3 = 'concern4_' . date('Ymd_His'); // replace with your desired file name
        $ext3 = pathinfo($photo3['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName3 = $customFileName3 . '.' . $ext3; // append the extension to the custom file name
        $fileTmpname3 = $photo3['tmp_name'];
        $fileSize3 = $photo3['size'];
        $fileError3 = $photo3['error'];
        $fileExt3 = explode('.',$fileName3);
        $fileActExt3 = strtolower(end($fileExt3));
        $allowed3 = array('jpg','jpeg','png');
        if(in_array($fileActExt3, $allowed3)){
            if($fileError3 === 0){
                if($fileSize3 < 10485760){
                    $targetFile3 = $uploadDir . $fileName3;
                    if (move_uploaded_file($fileTmpname3, $targetFile3)) {
                        // empty code.
                    }
                }
                else{
                  $_SESSION['status']="Image4 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/concern");
                }
            }
            else{
                $_SESSION['status']="Image4 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/concern");
            }
        }
        else{
            $_SESSION['status']="Image4 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/concern");
        }
    }

    if(isset($_FILES['photo4']) && $_FILES['photo4']['error'] === UPLOAD_ERR_OK) {
        $photo4 = $_FILES['photo4'];
        $customFileName4 = 'concern5_' . date('Ymd_His'); // replace with your desired file name
        $ext4 = pathinfo($photo4['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName4 = $customFileName4 . '.' . $ext4; // append the extension to the custom file name
        $fileTmpname4 = $photo4['tmp_name'];
        $fileSize4 = $photo4['size'];
        $fileError4 = $photo4['error'];
        $fileExt4 = explode('.',$fileName4);
        $fileActExt4 = strtolower(end($fileExt4));
        $allowed4 = array('jpg','jpeg','png');
        if(in_array($fileActExt4, $allowed4)){
            if($fileError4 === 0){
                if($fileSize4 < 10485760){
                    $targetFile4 = $uploadDir . $fileName4;
                    if (move_uploaded_file($fileTmpname4, $targetFile4)) {
                        // empty code.
                    }
                }
                else{
                  $_SESSION['status']="Image5 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/concern");
                }
            }
            else{
                $_SESSION['status']="Image5 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/concern");
            }
        }
        else{
            $_SESSION['status']="Image5 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/concern");
        }
    }

    if(isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
        $video = $_FILES['video'];
        $customFileName5 = 'concern6_' . date('Ymd_His'); // replace with your desired file name
        $ext5 = pathinfo($video['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName5 = $customFileName5 . '.' . $ext5; // append the extension to the custom file name
        $fileTmpname5 = $video['tmp_name'];
        $fileSize5 = $video['size'];
        $fileError5 = $video['error'];
        $fileExt5 = explode('.',$fileName5);
        $fileActExt5 = strtolower(end($fileExt5));
        $allowed5 = array('mp4','3gp','mov');
        if(in_array($fileActExt5, $allowed5)){
            if($fileError5 === 0){
                $targetFile5 = $uploadDir . $fileName5;
                if (move_uploaded_file($fileTmpname5, $targetFile5)) {
                    // empty code.
                }
            }
            else{
                $_SESSION['status']="Video file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/concern");
            }
        }
        else{
            $_SESSION['status']="Video invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/concern");
        }
    }

    $concern_date = date('Y-m-d H:i:s');
    $title = $_POST['title'];
    $message = $_POST['message'];
    $status = 1;

    $query = "INSERT INTO `concern`(`user_id`, `title`, `message`, `photo`, `photo1`, `photo2`, `photo3`, `photo4`, `video`, `date_created`,`status_id`,`concern_status`) VALUES ('$user_id','$title','$message','$fileName','$fileName1', '$fileName2', '$fileName3', '$fileName4', '$fileName5','$concern_date','$status','$concern_status')";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Concern Submitted!";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "farmer/home/concern");
        exit(0);
    } else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "farmer/home/concern");
        exit(0);
    }
}

// Update request
if(isset($_POST['update_request'])){

    $request_id = $_POST['request_id'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $date = date('Y-m-d H:i:s');
    $query = "UPDATE `request` SET `product_id`='$product',`request_quantity`='$quantity',`description`='$description', `request_date`='$date' WHERE `request_id`='$request_id'";
    $query_run = mysqli_query($con,$query);
    if($query_run){
        $_SESSION['status'] = "Request Updated Successfully";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "farmer/home/request");
        exit(0);
    }
    else{
        $_SESSION['status'] = "SOMETHING WENT WRONG!";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "farmer/home/request");
        exit(0);
    }
}

//Update report
if(isset($_POST["update_report"])){
    $user_id = $_POST['user_id'];
    $report_id = $_POST['report_id'];
    $uploadDir = '../../assets/img/reports/';

    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['photo'];
        $OLDfileImage = $_POST['oldimage'];
        $customFileName = 'report1_' . date('Ymd_His'); // replace with your desired file name
        $ext = pathinfo($photo['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName = $customFileName . '.' . $ext; // append the extension to the custom file name
        $fileTmpname = $photo['tmp_name'];
        $fileSize = $photo['size'];
        $fileError = $photo['error'];
        $fileExt = explode('.',$fileName);
        $fileActExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');
        if(in_array($fileActExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 10485760){
                    unlink($uploadDir . $OLDfileImage);
                    $targetFile = $uploadDir . $fileName;
                    if (move_uploaded_file($fileTmpname, $targetFile)) {
                        $sql1 = "UPDATE `report` SET `photo` = '$fileName' WHERE `report_id` = '$report_id'";
                        $sql1_run = mysqli_query($con, $sql1);
                    }
                }
                else{
                  $_SESSION['status']="Image1 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/report");
                }
            }
            else{
                $_SESSION['status']="Image1 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/report");
            }
        }
        else{
            $_SESSION['status']="Image1 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/report");
        }
    }
    if(isset($_FILES['photo1']) && $_FILES['photo1']['error'] === UPLOAD_ERR_OK) {
        $photo1 = $_FILES['photo1'];
        $OLDfileImage1 = $_POST['oldimage1'];
        $customFileName1 = 'report2_' . date('Ymd_His'); // replace with your desired file name
        $ext1 = pathinfo($photo1['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName1 = $customFileName1 . '.' . $ext1; // append the extension to the custom file name
        $fileTmpname1 = $photo1['tmp_name'];
        $fileSize1 = $photo1['size'];
        $fileError1 = $photo1['error'];
        $fileExt1 = explode('.',$fileName1);
        $fileActExt1 = strtolower(end($fileExt1));
        $allowed1 = array('jpg','jpeg','png');
        if(in_array($fileActExt1, $allowed1)){
            if($fileError1 === 0){
                if($fileSize1 < 10485760){
                    unlink($uploadDir . $OLDfileImage1);
                    $targetFile1 = $uploadDir . $fileName1;
                    if (move_uploaded_file($fileTmpname1, $targetFile1)) {
                        $sql2 = "UPDATE `report` SET `photo1` = '$fileName1' WHERE `report_id` = '$report_id'";
                        $sql2_run = mysqli_query($con, $sql2);
                    }
                }
                else{
                  $_SESSION['status']="Image2 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/report");
                }
            }
            else{
                $_SESSION['status']="Image2 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/report");
            }
        }
        else{
            $_SESSION['status']="Image2 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/report");
        }
    }

    if(isset($_FILES['photo2']) && $_FILES['photo2']['error'] === UPLOAD_ERR_OK) {
        $photo2 = $_FILES['photo2'];
        $OLDfileImage2 = $_POST['oldimage2'];
        $customFileName2 = 'report3_' . date('Ymd_His'); // replace with your desired file name
        $ext2 = pathinfo($photo2['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName2 = $customFileName2 . '.' . $ext2; // append the extension to the custom file name
        $fileTmpname2 = $photo2['tmp_name'];
        $fileSize2 = $photo2['size'];
        $fileError2 = $photo2['error'];
        $fileExt2 = explode('.',$fileName2);
        $fileActExt2 = strtolower(end($fileExt2));
        $allowed2 = array('jpg','jpeg','png');
        if(in_array($fileActExt2, $allowed2)){
            if($fileError2 === 0){
                if($fileSize2 < 10485760){
                    unlink($uploadDir . $OLDfileImage2);
                    $targetFile2 = $uploadDir . $fileName2;
                    if (move_uploaded_file($fileTmpname2, $targetFile2)) {
                        $sql3 = "UPDATE `report` SET `photo2` = '$fileName2' WHERE `report_id` = '$report_id'";
                        $sql3_run = mysqli_query($con, $sql3);
                    }
                }
                else{
                  $_SESSION['status']="Image3 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/report");
                }
            }
            else{
                $_SESSION['status']="Image3 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/report");
            }
        }
        else{
            $_SESSION['status']="Image3 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/report");
        }
    }

    if(isset($_FILES['photo3']) && $_FILES['photo3']['error'] === UPLOAD_ERR_OK) {
        $photo3 = $_FILES['photo3'];
        $OLDfileImage3 = $_POST['oldimage3'];
        $customFileName3 = 'report4_' . date('Ymd_His'); // replace with your desired file name
        $ext3 = pathinfo($photo3['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName3 = $customFileName3 . '.' . $ext3; // append the extension to the custom file name
        $fileTmpname3 = $photo3['tmp_name'];
        $fileSize3 = $photo3['size'];
        $fileError3 = $photo3['error'];
        $fileExt3 = explode('.',$fileName3);
        $fileActExt3 = strtolower(end($fileExt3));
        $allowed3 = array('jpg','jpeg','png');
        if(in_array($fileActExt3, $allowed3)){
            if($fileError3 === 0){
                if($fileSize3 < 10485760){
                    unlink($uploadDir . $OLDfileImage3);
                    $targetFile3 = $uploadDir . $fileName3;
                    if (move_uploaded_file($fileTmpname3, $targetFile3)) {
                        $sql4 = "UPDATE `report` SET `photo3` = '$fileName3' WHERE `report_id` = '$report_id'";
                        $sql4_run = mysqli_query($con, $sql4);
                    }
                }
                else{
                  $_SESSION['status']="Image4 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/report");
                }
            }
            else{
                $_SESSION['status']="Image4 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/report");
            }
        }
        else{
            $_SESSION['status']="Image4 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/report");
        }
    }

    if(isset($_FILES['photo4']) && $_FILES['photo4']['error'] === UPLOAD_ERR_OK) {
        $photo4 = $_FILES['photo4'];
        $OLDfileImage4 = $_POST['oldimage4'];
        $customFileName4 = 'report5_' . date('Ymd_His'); // replace with your desired file name
        $ext4 = pathinfo($photo4['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName4 = $customFileName4 . '.' . $ext4; // append the extension to the custom file name
        $fileTmpname4 = $photo4['tmp_name'];
        $fileSize4 = $photo4['size'];
        $fileError4 = $photo4['error'];
        $fileExt4 = explode('.',$fileName4);
        $fileActExt4 = strtolower(end($fileExt4));
        $allowed4 = array('jpg','jpeg','png');
        if(in_array($fileActExt4, $allowed4)){
            if($fileError4 === 0){
                if($fileSize4 < 10485760){
                    unlink($uploadDir . $OLDfileImage4);
                    $targetFile4 = $uploadDir . $fileName4;
                    if (move_uploaded_file($fileTmpname4, $targetFile4)) {
                        $sql5 = "UPDATE `report` SET `photo4` = '$fileName4' WHERE `report_id` = '$report_id'";
                        $sql5_run = mysqli_query($con, $sql5);
                    }
                }
                else{
                  $_SESSION['status']="Image5 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/report");
                }
            }
            else{
                $_SESSION['status']="Image5 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/report");
            }
        }
        else{
            $_SESSION['status']="Image5 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/report");
        }
    }

    if(isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
        $video = $_FILES['video'];
        $OLDfileImage5 = $_POST['oldimage5'];
        $customFileName5 = 'report6_' . date('Ymd_His'); // replace with your desired file name
        $ext5 = pathinfo($video['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName5 = $customFileName5 . '.' . $ext5; // append the extension to the custom file name
        $fileTmpname5 = $video['tmp_name'];
        $fileSize5 = $video['size'];
        $fileError5 = $video['error'];
        $fileExt5 = explode('.',$fileName5);
        $fileActExt5 = strtolower(end($fileExt5));
        $allowed5 = array('mp4','3gp','mov');
        if(in_array($fileActExt5, $allowed5)){
            if($fileError5 === 0){
                $targetFile5 = $uploadDir . $fileName5;
                unlink($uploadDir . $OLDfileImage5);
                if (move_uploaded_file($fileTmpname5, $targetFile5)) {
                    $sql6 = "UPDATE `report` SET `video` = '$fileName5' WHERE `report_id` = '$report_id'";
                    $sql6_run = mysqli_query($con, $sql6);
                }
            }
            else{
                $_SESSION['status']="Video file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/report");
            }
        }
        else{
            $_SESSION['status']="Video invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/report");
        }
    }
    $report_date = date('Y-m-d H:i:s');
    $title = $_POST['title'];
    $message = $_POST['message'];
    $status = 1;

    $query = "UPDATE `report` SET `title` = '$title', `message` = '$message' WHERE `report_id` = '$report_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Report updated successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "farmer/home/report");
        exit(0);
    } else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "farmer/home/report");
        exit(0);
    }
}

//Update concern
if(isset($_POST["update_concern"])){
    $user_id = $_POST['user_id'];
    $concern_id = $_POST['concern_id'];
    $uploadDir = '../../assets/img/concerns/';

    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['photo'];
        $OLDfileImage = $_POST['oldimage'];
        $customFileName = 'concern1_' . date('Ymd_His'); // replace with your desired file name
        $ext = pathinfo($photo['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName = $customFileName . '.' . $ext; // append the extension to the custom file name
        $fileTmpname = $photo['tmp_name'];
        $fileSize = $photo['size'];
        $fileError = $photo['error'];
        $fileExt = explode('.',$fileName);
        $fileActExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');
        if(in_array($fileActExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 10485760){
                    unlink($uploadDir . $OLDfileImage);
                    $targetFile = $uploadDir . $fileName;
                    if (move_uploaded_file($fileTmpname, $targetFile)) {
                        $sql1 = "UPDATE `concern` SET `photo` = '$fileName' WHERE `concern_id` = '$concern_id'";
                        $sql1_run = mysqli_query($con, $sql1);
                    }
                }
                else{
                  $_SESSION['status']="Image1 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/concern");
                }
            }
            else{
                $_SESSION['status']="Image1 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/concern");
            }
        }
        else{
            $_SESSION['status']="Image1 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/concern");
        }
    }
    if(isset($_FILES['photo1']) && $_FILES['photo1']['error'] === UPLOAD_ERR_OK) {
        $photo1 = $_FILES['photo1'];
        $OLDfileImage1 = $_POST['oldimage1'];
        $customFileName1 = 'concern2_' . date('Ymd_His'); // replace with your desired file name
        $ext1 = pathinfo($photo1['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName1 = $customFileName1 . '.' . $ext1; // append the extension to the custom file name
        $fileTmpname1 = $photo1['tmp_name'];
        $fileSize1 = $photo1['size'];
        $fileError1 = $photo1['error'];
        $fileExt1 = explode('.',$fileName1);
        $fileActExt1 = strtolower(end($fileExt1));
        $allowed1 = array('jpg','jpeg','png');
        if(in_array($fileActExt1, $allowed1)){
            if($fileError1 === 0){
                if($fileSize1 < 10485760){
                    unlink($uploadDir . $OLDfileImage1);
                    $targetFile1 = $uploadDir . $fileName1;
                    if (move_uploaded_file($fileTmpname1, $targetFile1)) {
                        $sql2 = "UPDATE `concern` SET `photo1` = '$fileName1' WHERE `concern_id` = '$concern_id'";
                        $sql2_run = mysqli_query($con, $sql2);
                    }
                }
                else{
                  $_SESSION['status']="Image2 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/concern");
                }
            }
            else{
                $_SESSION['status']="Image2 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/concern");
            }
        }
        else{
            $_SESSION['status']="Image2 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/concern");
        }
    }

    if(isset($_FILES['photo2']) && $_FILES['photo2']['error'] === UPLOAD_ERR_OK) {
        $photo2 = $_FILES['photo2'];
        $OLDfileImage2 = $_POST['oldimage2'];
        $customFileName2 = 'concern3_' . date('Ymd_His'); // replace with your desired file name
        $ext2 = pathinfo($photo2['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName2 = $customFileName2 . '.' . $ext2; // append the extension to the custom file name
        $fileTmpname2 = $photo2['tmp_name'];
        $fileSize2 = $photo2['size'];
        $fileError2 = $photo2['error'];
        $fileExt2 = explode('.',$fileName2);
        $fileActExt2 = strtolower(end($fileExt2));
        $allowed2 = array('jpg','jpeg','png');
        if(in_array($fileActExt2, $allowed2)){
            if($fileError2 === 0){
                if($fileSize2 < 10485760){
                    unlink($uploadDir . $OLDfileImage2);
                    $targetFile2 = $uploadDir . $fileName2;
                    if (move_uploaded_file($fileTmpname2, $targetFile2)) {
                        $sql3 = "UPDATE `concern` SET `photo2` = '$fileName2' WHERE `concern_id` = '$concern_id'";
                        $sql3_run = mysqli_query($con, $sql3);
                    }
                }
                else{
                  $_SESSION['status']="Image3 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/concern");
                }
            }
            else{
                $_SESSION['status']="Image3 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/concern");
            }
        }
        else{
            $_SESSION['status']="Image3 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/concern");
        }
    }

    if(isset($_FILES['photo3']) && $_FILES['photo3']['error'] === UPLOAD_ERR_OK) {
        $photo3 = $_FILES['photo3'];
        $OLDfileImage3 = $_POST['oldimage3'];
        $customFileName3 = 'concern4_' . date('Ymd_His'); // replace with your desired file name
        $ext3 = pathinfo($photo3['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName3 = $customFileName3 . '.' . $ext3; // append the extension to the custom file name
        $fileTmpname3 = $photo3['tmp_name'];
        $fileSize3 = $photo3['size'];
        $fileError3 = $photo3['error'];
        $fileExt3 = explode('.',$fileName3);
        $fileActExt3 = strtolower(end($fileExt3));
        $allowed3 = array('jpg','jpeg','png');
        if(in_array($fileActExt3, $allowed3)){
            if($fileError3 === 0){
                if($fileSize3 < 10485760){
                    unlink($uploadDir . $OLDfileImage3);
                    $targetFile3 = $uploadDir . $fileName3;
                    if (move_uploaded_file($fileTmpname3, $targetFile3)) {
                        $sql4 = "UPDATE `concern` SET `photo3` = '$fileName3' WHERE `concern_id` = '$concern_id'";
                        $sql4_run = mysqli_query($con, $sql4);
                    }
                }
                else{
                  $_SESSION['status']="Image4 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/concern");
                }
            }
            else{
                $_SESSION['status']="Image4 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/concern");
            }
        }
        else{
            $_SESSION['status']="Image4 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/concern");
        }
    }

    if(isset($_FILES['photo4']) && $_FILES['photo4']['error'] === UPLOAD_ERR_OK) {
        $photo4 = $_FILES['photo4'];
        $OLDfileImage4 = $_POST['oldimage4'];
        $customFileName4 = 'concern5_' . date('Ymd_His'); // replace with your desired file name
        $ext4 = pathinfo($photo4['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName4 = $customFileName4 . '.' . $ext4; // append the extension to the custom file name
        $fileTmpname4 = $photo4['tmp_name'];
        $fileSize4 = $photo4['size'];
        $fileError4 = $photo4['error'];
        $fileExt4 = explode('.',$fileName4);
        $fileActExt4 = strtolower(end($fileExt4));
        $allowed4 = array('jpg','jpeg','png');
        if(in_array($fileActExt4, $allowed4)){
            if($fileError4 === 0){
                if($fileSize4 < 10485760){
                    unlink($uploadDir . $OLDfileImage4);
                    $targetFile4 = $uploadDir . $fileName4;
                    if (move_uploaded_file($fileTmpname4, $targetFile4)) {
                        $sql5 = "UPDATE `concern` SET `photo4` = '$fileName4' WHERE `concern_id` = '$concern_id'";
                        $sql5_run = mysqli_query($con, $sql5);
                    }
                }
                else{
                  $_SESSION['status']="Image5 file is too large file must be 10mb";
                  $_SESSION['status_code'] = "error"; 
                  header("Location: " . base_url . "farmer/home/concern");
                }
            }
            else{
                $_SESSION['status']="Image5 file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/concern");
            }
        }
        else{
            $_SESSION['status']="Image5 invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/concern");
        }
    }

    if(isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
        $video = $_FILES['video'];
        $OLDfileImage5 = $_POST['oldimage5'];
        $customFileName5 = 'concern6_' . date('Ymd_His'); // replace with your desired file name
        $ext5 = pathinfo($video['name'], PATHINFO_EXTENSION); // get the file extension
        $fileName5 = $customFileName5 . '.' . $ext5; // append the extension to the custom file name
        $fileTmpname5 = $video['tmp_name'];
        $fileSize5 = $video['size'];
        $fileError5 = $video['error'];
        $fileExt5 = explode('.',$fileName5);
        $fileActExt5 = strtolower(end($fileExt5));
        $allowed5 = array('mp4','3gp','mov');
        if(in_array($fileActExt5, $allowed5)){
            if($fileError5 === 0){
                $targetFile5 = $uploadDir . $fileName5;
                unlink($uploadDir . $OLDfileImage5);
                if (move_uploaded_file($fileTmpname5, $targetFile5)) {
                    $sql6 = "UPDATE `concern` SET `video` = '$fileName5' WHERE `concern_id` = '$concern_id'";
                    $sql6_run = mysqli_query($con, $sql6);
                }
            }
            else{
                $_SESSION['status']="Video file error";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/concern");
            }
        }
        else{
            $_SESSION['status']="Video invalid file type";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/concern");
        }
    }
    $concern_date = date('Y-m-d H:i:s');
    $title = $_POST['title'];
    $message = $_POST['message'];
    $status = 1;

    $query = "UPDATE `concern` SET `title`= '$title', `message` = '$message' WHERE `concern_id` = '$concern_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Concern updated successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "farmer/home/concern");
        exit(0);
    } else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "farmer/home/concern");
        exit(0);
    }
}

// Delete request
if(isset($_POST['delete_request'])){
    $request_id = $_POST['delete_request'];
    $request_status = '2';
    $date_deleted = date('Y-m-d H:i:s');
    $person_id =  $_SESSION['auth_user']['user_id'];
    $sql = "SELECT * FROM user WHERE user_id='$person_id' ";
    $sql_run = mysqli_query($con, $sql);
    if(mysqli_num_rows($sql_run) > 0) {
        foreach($sql_run as $row){
            $person = $row['fname'] .' '. $row['lname'];
        }
    } 
    $query = "UPDATE `request` SET `date_deleted`='$date_deleted', `deleted_by`='$person', `request_status` = '$request_status' WHERE `request_id`= '$request_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Request deleted successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "farmer/home/request");
        exit(0);
    }
    else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "farmer/home/request");
        exit(0);
    }
}

// Delete report
if(isset($_POST['delete_report'])){
    $report_id = $_POST['delete_report'];
    $report_status = '2';
    $date_deleted = date('Y-m-d H:i:s');
    $person_id =  $_SESSION['auth_user']['user_id'];
    $sql = "SELECT * FROM user WHERE user_id='$person_id' ";
    $sql_run = mysqli_query($con, $sql);
    if(mysqli_num_rows($sql_run) > 0) {
        foreach($sql_run as $row){
            $person = $row['fname'] .' '. $row['lname'];
        }
    } 
    $query = "UPDATE `report` SET `date_deleted`='$date_deleted', `deleted_by`='$person', `report_status` = '$report_status' WHERE `report_id`= '$report_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Report deleted successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "farmer/home/report");
        exit(0);
    }
    else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "farmer/home/report");
        exit(0);
    }
}

// Delete concern
if(isset($_POST['delete_concern'])){
    $concern_id = $_POST['delete_concern'];
    $concern_status = '2';
    $date_deleted = date('Y-m-d H:i:s');
    $person_id =  $_SESSION['auth_user']['user_id'];
    $sql = "SELECT * FROM user WHERE user_id='$person_id' ";
    $sql_run = mysqli_query($con, $sql);
    if(mysqli_num_rows($sql_run) > 0) {
        foreach($sql_run as $row){
            $person = $row['fname'] .' '. $row['lname'];
        }
    } 
    $query = "UPDATE `concern` SET `date_deleted`='$date_deleted', `deleted_by`='$person', `concern_status` = '$concern_status' WHERE `concern_id`= '$concern_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['status'] = "Concern deleted successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "farmer/home/concern");
        exit(0);
    }
    else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "farmer/home/concern");
        exit(0);
    }
}

?>
