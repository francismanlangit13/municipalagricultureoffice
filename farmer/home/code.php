<?php include('authentication.php'); 


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


if(isset($_POST['concern_add']))
{

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('UTC'));
    $concern_date = $date->format('Y-m-d H:i:s');

    $user_id = $_POST['user_id'];
    $concern = $_POST['concern_message'];
    $pic1 = addslashes(file_get_contents($_FILES["pic1"]['tmp_name']));
    $pic2 = addslashes(file_get_contents($_FILES["pic2"]['tmp_name']));
    $status = "Pending";

    $query = "INSERT INTO `concern`(`user_id`, `concern_message`,`pic1`,`pic2`, `date_created`,`status`) VALUES ('$user_id','$concern','$pic1','$pic2','$concern_date','$status')";
    $query_run = mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['status'] = "Concern Message Submitted!";
        $_SESSION['status_code'] = "success";
        header('Location: concern.php');
        exit(0);
    }
    else{
        $_SESSION['status'] = "Error! SOMETHING WENT WRONG!";
        $_SESSION['status_code'] = "error";
        header('Location: concern.php');
        exit(0);
    }
}


if(isset($_POST["add_report"])){
    $photo = $_FILES['photo'];
    $photo1 = $_FILES['photo1'];
  
    $fileName = $photo['name'];
    $fileTmpname = $photo['tmp_name'];
    $fileSize = $photo['size'];
    $fileError = $photo['error'];
  
    $fileExt = explode('.',$fileName);
    $fileActExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png');

    $fileName1 = $photo1['name'];
    $fileTmpname1 = $photo1['tmp_name'];
    $fileSize1 = $photo1['size'];
    $fileError1 = $photo1['error'];
  
    $fileExt1 = explode('.',$fileName1);
    $fileActExt1 = strtolower(end($fileExt1));
    $allowed1 = array('jpg','jpeg','png');
  
  
    if(in_array($fileActExt, $allowed) && in_array($fileActExt1, $allowed1)){
      if($fileError === 0){
          if($fileSize < 10485760){

            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('UTC'));
            $report_date = $date->format('Y-m-d H:i:s');

            $user_id = $_POST['user_id'];
            $message = $_POST['message'];
            $status = "Pending";

            $photo = addslashes(file_get_contents($_FILES["photo"]['tmp_name']));
            $photo1 = addslashes(file_get_contents($_FILES["photo1"]['tmp_name']));

            $query = "INSERT INTO `report`(`user_id`, `message`, `photo`, `photo1`, `date_created`,`status`) VALUES ('$user_id','$message','$photo','$photo1','$report_date','$status')";
  
              $query_run = mysqli_query($con, $query);
  
              if($query_run){
                $_SESSION['status'] = "Report Submitted!";
                $_SESSION['status_code'] = "success";
                header('Location: ./report.php');
                exit(0);
              }else{
                $_SESSION['status'] = "Something went wrong!";
                $_SESSION['status_code'] = "error";
                header('Location: ./report.php');
                exit(0);
              }
  
          }else{
              $_SESSION['status']="File is too large file must be 10mb";
              $_SESSION['status_code'] = "error"; 
              header('Location: ./report.php');
          }
      }else{
          $_SESSION['status']="File Error";
          $_SESSION['status_code'] = "error"; 
          header('Location: ./report.php');
      }
    }else{
        $_SESSION['status']="File Error";
        $_SESSION['status_code'] = "error"; 
        header('Location: index.php');
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

  
if(isset($_POST['update_farmer_account']))
{
    $user_id= $_POST['user_id'];
    $firstpassword= $_POST['password'];
    $secondpassword= $_POST['cpassword'];
    $picture = addslashes(file_get_contents($_FILES["userprofile"]['tmp_name']));

    if($firstpassword == $secondpassword)
    {
        $query = "UPDATE `farmer` SET `password`='$password',`farmprofile`='$picture' WHERE `user_id`='$user_id'";
        $query_run = mysqli_query($con, $query);
        
        if($query_run)
        {
          $_SESSION['status'] = "Account Updated";
            $_SESSION['status_code'] = "success";
            header('Location: index.php');
            exit(0);
        }
        else
        {
            $_SESSION['status'] = "Error";
            $_SESSION['status_code'] = "error";
            header('Location: settings.php');
            exit(0);
        }
    }else{
        $_SESSION['status'] = "Password and Confirm Password does not match";
        $_SESSION['status_code'] = "error";
        header('Location: settings.php');
        exit(0);
    }
}


   
    



















?>
