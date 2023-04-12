<?php include('../includes/authentication.php'); 


if(isset($_POST['logout_btn']))
{
    // session_destroy();
    unset( $_SESSION['auth']);
    unset( $_SESSION['auth_role']);
    unset( $_SESSION['auth_user']);

    $_SESSION['status'] = "You have successfully disconnected from your account.";
    $_SESSION['status_code'] = "success";
    header("Location: ../login/index.php");
    exit(0);
}



if(isset($_POST['add_request']))
{

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('UTC'));
    $request_date = $date->format('Y-m-d H:i:s');

    $user_id = $_POST['user_id'];
    $quantity = $_POST['quantity'];
    $product_id = $_POST['product'];
    $description = $_POST['description'];
    $request = $_POST['quantity'];
    $status = 1;

    $query = "INSERT INTO `request`(`id`, `product_id`, `request_quantity`, `description`, `request_date`, `request_status`) VALUES ('$user_id', '$product_id','$quantity','$description','$request_date', '$status')";
    $query_run = mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Request has been submitted!";
        $_SESSION['status_code'] = "success";
        header('Location: request.php');
        exit(0);
    }
    else{
        $_SESSION['status'] = "Error! SOMETHING WENT WRONG!";
        $_SESSION['status_code'] = "error";
        header('Location: request.php');
        exit(0);
    }
}

if(isset($_POST["add_concern"])){

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
  
    if(in_array($fileActExt, $allowed) && in_array($fileActExt1, $allowed1) && in_array($fileActExt2, $allowed2) && in_array($fileActExt3, $allowed3) && in_array($fileActExt4, $allowed4)){
        if($fileError === 0 && $fileError1 === 0 && $fileError2 === 0 && $fileError3 === 0 && $fileError4 === 0){
            if($fileSize < 10485760 && $fileSize1 < 10485760 && $fileSize2 < 10485760 && $fileSize3 < 10485760 && $fileSize4 < 10485760){

                $date = new DateTime();
                $date->setTimezone(new DateTimeZone('UTC'));
                $report_date = $date->format('Y-m-d H:i:s');

                $user_id = $_POST['user_id'];
                $message = $_POST['message'];
                $status = 1;
                $uploadDir = '../../assets/img/concerns/';
                $targetFile = $uploadDir . $fileName;
                $targetFile1 = $uploadDir . $fileName1;
                $targetFile2 = $uploadDir . $fileName2;
                $targetFile3 = $uploadDir . $fileName3;
                $targetFile4 = $uploadDir . $fileName4;
                $targetFile5 = $uploadDir . $fileName5;
                if (move_uploaded_file($fileTmpname, $targetFile) && move_uploaded_file($fileTmpname1, $targetFile1) && move_uploaded_file($fileTmpname2, $targetFile2) && move_uploaded_file($fileTmpname3, $targetFile3) && move_uploaded_file($fileTmpname4, $targetFile4) && move_uploaded_file($fileTmpname5, $targetFile5)) {
                    $query = "INSERT INTO `concern`(`user_id`, `message`, `photo`, `photo1`, `photo2`, `photo3`, `photo4`, `video`, `date_created`,`status_id`) VALUES ('$user_id','$message','$fileName','$fileName1', '$fileName2', '$fileName3', '$fileName4', '$fileName5','$report_date','$status')";
                    $query_run = mysqli_query($con, $query);

                    if($query_run){
                        $_SESSION['status'] = "Concern Submitted!";
                        $_SESSION['status_code'] = "success";
                        header("Location: " . base_url . "farmer/home/concern.php");
                        exit(0);
                    } else{
                        $_SESSION['status'] = "Something went wrong!";
                        $_SESSION['status_code'] = "error";
                        header("Location: " . base_url . "farmer/home/concern.php");
                        exit(0);
                    }
                }
                else{
                    $_SESSION['status']="Error uploading image.";
                    $_SESSION['status_code'] = "error";
                    header("Location: " . base_url . "farmer/home/concern.php");
                }
            } else{
                $_SESSION['status']="File is too large file must be 10mb";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/concern.php");
            }
        } else{
            $_SESSION['status']="File Error";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/concern.php");
        }
    } else{
        $_SESSION['status']="File Error";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "farmer/home/concern.php");
    }
}

if(isset($_POST["add_report"])){

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
  
    if(in_array($fileActExt, $allowed) && in_array($fileActExt1, $allowed1) && in_array($fileActExt2, $allowed2) && in_array($fileActExt3, $allowed3) && in_array($fileActExt4, $allowed4)){
        if($fileError === 0 && $fileError1 === 0 && $fileError2 === 0 && $fileError3 === 0 && $fileError4 === 0){
            if($fileSize < 10485760 && $fileSize1 < 10485760 && $fileSize2 < 10485760 && $fileSize3 < 10485760 && $fileSize4 < 10485760){

                $date = new DateTime();
                $date->setTimezone(new DateTimeZone('UTC'));
                $report_date = $date->format('Y-m-d H:i:s');

                $user_id = $_POST['user_id'];
                $message = $_POST['message'];
                $status = 1;
                $uploadDir = '../../assets/img/reports/';
                $targetFile = $uploadDir . $fileName;
                $targetFile1 = $uploadDir . $fileName1;
                $targetFile2 = $uploadDir . $fileName2;
                $targetFile3 = $uploadDir . $fileName3;
                $targetFile4 = $uploadDir . $fileName4;
                $targetFile5 = $uploadDir . $fileName5;
                if (move_uploaded_file($fileTmpname, $targetFile) && move_uploaded_file($fileTmpname1, $targetFile1) && move_uploaded_file($fileTmpname2, $targetFile2) && move_uploaded_file($fileTmpname3, $targetFile3) && move_uploaded_file($fileTmpname4, $targetFile4) && move_uploaded_file($fileTmpname5, $targetFile5)) {
                    $query = "INSERT INTO `report`(`user_id`, `message`, `photo`, `photo1`, `photo2`, `photo3`, `photo4`, `video`, `date_created`,`status_id`) VALUES ('$user_id','$message','$fileName','$fileName1', '$fileName2', '$fileName3', '$fileName4', '$fileName5','$report_date','$status')";
                    $query_run = mysqli_query($con, $query);

                    if($query_run){
                        $_SESSION['status'] = "Report Submitted!";
                        $_SESSION['status_code'] = "success";
                        header("Location: " . base_url . "farmer/home/report.php");
                        exit(0);
                    } else{
                        $_SESSION['status'] = "Something went wrong!";
                        $_SESSION['status_code'] = "error";
                        header("Location: " . base_url . "farmer/home/report.php");
                        exit(0);
                    }
                }
                else{
                    $_SESSION['status']="Error uploading image.";
                    $_SESSION['status_code'] = "error";
                    header("Location: " . base_url . "farmer/home/report.php");
                }
            } else{
                $_SESSION['status']="File is too large file must be 10mb";
                $_SESSION['status_code'] = "error"; 
                header("Location: " . base_url . "farmer/home/report.php");
            }
        } else{
            $_SESSION['status']="File Error";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/report.php");
        }
    } else{
        $_SESSION['status']="File Error";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "farmer/home/report.php");
    }
}


if(isset($_POST['concern_update'])){
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('UTC'));
    $concern_update = $date->format('Y-m-d H:i:s');

    $concern_id = $_POST['concern_id'];
    $message = $_POST['concern_message'];
  
      $query = "UPDATE `concern` SET `concern_message`='$message',`date_created`='$concern_update' WHERE `concern_id`=$concern_id";
      $query_run = mysqli_query($con,$query);
  
      if($query_run)
      {
          $_SESSION['status'] = "Concern Updated Successfully";
          $_SESSION['status_code'] = "success";
          header('Location: concern.php');
          exit(0);
      }
      else{
          $_SESSION['status'] = "SOMETHING WENT WRONG!";
          $_SESSION['status_code'] = "error";
          header('Location: concern.php');
          exit(0);
      }
  }


  
if(isset($_POST['delete_request'])){


    $id = $_POST['delete_request'];

  
      $query = "DELETE FROM `request` WHERE request_id = '$id'";
      $query_run = mysqli_query($con,$query);
  
      if($query_run)
      {
          $_SESSION['status'] = "Request Deleted Successfully";
          $_SESSION['status_code'] = "success";
          header('Location: request.php');
          exit(0);
      }
      else{
          $_SESSION['status'] = "SOMETHING WENT WRONG!";
          $_SESSION['status_code'] = "error";
          header('Location: request.php');
          exit(0);
      }
  }



  if(isset($_POST['update_request'])){

    $request_id = $_POST['request_id'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

  
      $query = "UPDATE `request` SET `product_id`='$product',`request_quantity`='$quantity',`description`='$description' WHERE `request_id`='$request_id'";
      $query_run = mysqli_query($con,$query);
  
      if($query_run)
      {
          $_SESSION['status'] = "Request Updated Successfully";
          $_SESSION['status_code'] = "success";
          header('Location: request.php');
          exit(0);
      }
      else{
          $_SESSION['status'] = "SOMETHING WENT WRONG!";
          $_SESSION['status_code'] = "error";
          header('Location: request.php');
          exit(0);
      }
  }

  if(isset($_POST['delete_concern'])){

    $id = $_POST['delete_concern'];

  
      $query = "DELETE FROM `concern` WHERE concern_id = '$id'";
      $query_run = mysqli_query($con,$query);
  
      if($query_run)
      {
          $_SESSION['status'] = "Concern Deleted Successfully";
          $_SESSION['status_code'] = "success";
          header('Location: concern.php');
          exit(0);
      }
      else{
          $_SESSION['status'] = "SOMETHING WENT WRONG!";
          $_SESSION['status_code'] = "error";
          header('Location: concern.php');
          exit(0);
      }
  }

if(isset($_POST['update_account'])){
    $user_id= $_POST['user_id'];
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $new_password= $_POST['password'];
    $password = md5($new_password);
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
              $query = "UPDATE `user` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`email`='$email',`password`='$password',`picture`='$fileName' WHERE `user_id`='$user_id'";
              $query_run = mysqli_query($con, $query);
    
              if($query_run){
                $_SESSION['status'] = "Account Updated";
                $_SESSION['status_code'] = "success";
                header('Location: index.php');
                header("Location: " . base_url . "farmer/home/settings.php");
                exit(0);
              }
              else{
                $_SESSION['status_code'] = "error";
                header("Location: " . base_url . "farmer/home/settings.php");
                exit(0);
              }
            }
          }
          else{
            $_SESSION['status']="File is too large file must be 10mb";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "farmer/home/settings.php");
          }
        }
        else{
          $_SESSION['status']="File Error";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "farmer/home/settings.php");
        }
      }
      else{
        $_SESSION['status']="Invalid file type";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "farmer/home/settings.php");
      }
    }
    else{
      $query = "UPDATE `product` SET `product_name`='$name',`product_quantity`='$quantity',`product_category_id`='$category',`product_status`='$status' WHERE `product_id`='$user_id'";
      $query_run = mysqli_query($con, $query);

      $query = "UPDATE `user` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`email`='$email',`password`='$password' WHERE `user_id`='$user_id'";
      $query_run = mysqli_query($con, $query);

      if($query_run){
        $_SESSION['status'] = "Account Updated";
        $_SESSION['status_code'] = "success";
        header('Location: index.php');
        header("Location: " . base_url . "farmer/home/settings.php");
        exit(0);
      }
      else{
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "farmer/home/settings.php");
        exit(0);
      }
    }
  }

   
    



















?>
