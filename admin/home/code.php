<?php include('../includes/authentication.php'); 

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '../../PHPMailer/src/Exception.php';
  require '../../PHPMailer/src/PHPMailer.php';
  require '../../PHPMailer/src/SMTP.php';

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


  if(isset($_POST['del_product'])){
    $user_id = $_POST['del_product'];
    $OLDfileImage = $_POST['oldimage'];
    $uploadDir = '../../assets/img/products/';
    unlink($uploadDir . $OLDfileImage);

    $query = "DELETE FROM `product` WHERE product_id = $user_id ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
      $_SESSION['status'] = "The Product has been successfully deleted.";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/manage_product.php");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Something is wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/manage_product.php");
      exit(0);
    } 
  }

  if(isset($_POST['user_delete'])){
    $user_id= $_POST['user_delete'];

    $query = "DELETE FROM `user` WHERE user_id = $user_id ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
      $_SESSION['status'] = "The user has been successfully deleted.";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/user.php");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Something is wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/user.php");
      exit(0);
    } 
  }

  // Add Farmer
  if(isset($_POST["add_farmer"])){
    $fileImage = $_FILES['image'];
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
          $reference_number = $_POST['reference_number'];
          $lname = $_POST['lname'];
          $mname = $_POST['mname'];
          $fname = $_POST['fname'];
          $suffix = $_POST['suffix'];
          $gender = $_POST['gender'];
          $email = $_POST['email'];
          $purok = $_POST['purok'];
          $street = $_POST['street'];
          $barangay = $_POST['barangay'];
          $municipality = "Jimenez";
          $province = "Misamis Occidental";
          $region = "10";
          $phone = $_POST['phone'];
          $religion = $_POST['religion'];
          $birthday = $_POST['dob'];
          $placeofbirth = $_POST['placeofbirth'];
          $civilstatus = $_POST['civilstatus'];
          $pwd = $_POST['pwd'];
          $fourps = $_POST['fourps'];
          $ig = $_POST['ig'];
          $igyes = $_POST['igyes'];
          $govid = $_POST['govid'];
          $govidyes = $_POST['govidyes'];
          $fac = $_POST['fac'];
          $facyes = $_POST['facyes'];
          $livelihood = $_POST['livelihood'];
          $rice = $_POST['rice'];
          $corn = $_POST['corn'];
          $other_crops_specify = $_POST['other_crops_specify'];
          $livestock = $_POST['livestock'];
          $livestock_specify = $_POST['livestock_specify'];
          $poultry = $_POST['poultry'];
          $poultry_specify = $_POST['poultry_specify'];
          $owner = $_POST['owner'];
          $land = $_POST['land'];
          $cultivation = $_POST['cultivation'];
          $planting = $_POST['planting'];
          $harvesting = $_POST['harvesting'];
          $other_farmworker_specify = $_POST['othersfarmworker'];
          $part_of_farming = $_POST['part_of_farming'];
          $attending_formal = $_POST['attending_formal'];
          $attending_nonformal = $_POST['attending_nonformal'];
          $participated = $_POST['participated'];
          $other_agri_youth_specify = $_POST['other_agri_youth_specify'];
          $qrcode = $_POST['qrcode_text'];
          $new_password = substr(md5(microtime()),rand(0,26),8);
          $password = md5($new_password);
          $user_type = 3;
          $user_status = '1';
          $uploadDir = '../../assets/img/users/';
          $targetFile = $uploadDir . $fileName;

          if (move_uploaded_file($fileTmpname, $targetFile)) {
            $query = "INSERT INTO `user`(`fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `password`, `qrcode`, `reference_number`, `picture`, `purok`, `street`, `barangay`, `municipality`, `province`, `region`, `phone`, `religion`, `birthday`, `birthplace`, `civil_status`, `pwd`, `4ps`, `ig`, `ig_specify`, `govid`, `govid_specify`, `farmersassoc`, `farmersassoc_specify`, `livelihood`, `rice`, `corn`, `other_crops_specify`, `livestock`, `livestock_specify`, `poultry`, `poultry_specify`, `owner`, `land`, `planting`, `cultivation`, `harvesting`, `other_farmworker_specify`, `part_of_farming`, `attending_formal`, `attending_nonformal`, `participated`, `other_agri_youth_specify`, `user_type`, `user_status`) VALUES ('$fname','$mname','$lname','$suffix','$gender','$email','$password','$qrcode','$reference_number','$fileName','$purok','$street','$barangay','$municipality','$province','$region','$phone', '$religion','$birthday','$placeofbirth','$civilstatus','$pwd','$fourps','$ig','$igyes','$govid','$govidyes','$fac','$facyes','$livelihood','$rice','$corn','$other_crops_specify','$livestock','$livestock_specify','$poultry','$poultry_specify', '$owner','$land','$planting','$cultivation','$harvesting','$other_farmworker_specify','$part_of_farming','$attending_formal','$attending_nonformal','$participated','$other_agri_youth_specify','$user_type','$user_status')";
            $query_run = mysqli_query($con, $query);

            if($query_run){
              $name = htmlentities($_POST['lname']);
              $email = htmlentities($_POST['email']);
              $subject = htmlentities('Username and Password Credentials');
              $message = nl2br("Welcome to MAO System! \r\n \r\n Email: $email \r\n Password: $new_password \r\n \r\n Please change your password immediately.");
              // PHP Mailer
              $mail = new PHPMailer(true);
              $mail->isSMTP();
              $mail->Host = 'smtp.gmail.com';
              $mail->SMTPAuth = true;
              $mail->Username = 'contactmaojimenez@gmail.com';
              $mail->Password = 'kcexdtybjptxgizm';
              $mail->Port = 465;
              $mail->SMTPSecure = 'ssl';
              $mail->isHTML(true);
              $mail->setFrom($email, $name);
              $mail->addAddress($_POST['email']);
              $mail->Subject = ("$email ($subject)");
              $mail->Body = $message;
              $mail->send();
        
              $_SESSION['status'] = "Farmer added successfully, Credentials was sent to their email!";
              $_SESSION['status_code'] = "success";
              header("Location: " . base_url . "admin/home/farmer_account.php");
              exit(0);
            }
            else{
              $_SESSION['status'] = "Farmer was not added";
              $_SESSION['status_code'] = "error";
              header("Location: " . base_url . "admin/home/farmer_account.php");
              exit(0);
            }
          } 
          else{
            $_SESSION['status']="Error uploading image.";
            $_SESSION['status_code'] = "error";
            header("Location: " . base_url . "admin/home/farmer_account.php");
          }
        }
        else{
          $_SESSION['status']="File is too large file must be 10mb";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "admin/home/farmer_account.php");
        }
      }
      else{
        $_SESSION['status']="File Error";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "admin/home/farmer_account.php");
      }
    }
    else{
      $_SESSION['status']="Invalid file type";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "admin/home/farmer_account.php");
    }
  }

  // Update Farmer
  if(isset($_POST["update_farmer"])){
    $user_id = $_POST['user_id'];
    $reference_number = $_POST['reference_number'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $fname = $_POST['fname'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $purok = $_POST['purok'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $municipality = "Jimenez";
    $province = "Misamis Occidental";
    $region = "10";
    $phone = $_POST['phone'];
    $religion = $_POST['religion'];
    $birthday = $_POST['dob'];
    $placeofbirth = $_POST['placeofbirth'];
    $civilstatus = $_POST['civilstatus'];
    $pwd = $_POST['pwd'];
    $fourps = $_POST['fourps'];
    $ig = $_POST['ig'];
    $igyes = $_POST['igyes'];
    $govid = $_POST['govid'];
    $govidyes = $_POST['govidyes'];
    $fac = $_POST['fac'];
    $facyes = $_POST['facyes'];
    $livelihood = $_POST['livelihood'];
    $rice = $_POST['rice'];
    $corn = $_POST['corn'];
    $other_crops_specify = $_POST['other_crops_specify'];
    $livestock = $_POST['livestock'];
    $livestock_specify = $_POST['livestock_specify'];
    $poultry = $_POST['poultry'];
    $poultry_specify = $_POST['poultry_specify'];
    $owner = $_POST['owner'];
    $land = $_POST['land'];
    $cultivation = $_POST['cultivation'];
    $planting = $_POST['planting'];
    $harvesting = $_POST['harvesting'];
    $other_farmworker_specify = $_POST['othersfarmworker'];
    $part_of_farming = $_POST['part_of_farming'];
    $attending_formal = $_POST['attending_formal'];
    $attending_nonformal = $_POST['attending_nonformal'];
    $participated = $_POST['participated'];
    $other_agri_youth_specify = $_POST['other_agri_youth_specify'];
    $qrcode = $_POST['qrcode_text'];

    $query = "UPDATE `user` SET `fname`='$fname', `mname`='$mname', `lname`='$lname', `suffix`='$suffix', `gender`='$gender', `email`='$email', `qrcode`='$qrcode', `reference_number`='$reference_number', `purok`='$purok', `street`='$street', `barangay`='$barangay', `municipality`='$municipality', `province`='$province', `region`='$region', `phone`='$phone', `religion`='$religion', `birthday`='$birthday', `birthplace`='$placeofbirth', `civil_status`='$civilstatus', `pwd`='$pwd', `4ps`='$fourps', `ig`='$ig', `ig_specify`='$igyes', `govid`='$govid', `govid_specify`='$govidyes', `farmersassoc`='$fac', `farmersassoc_specify`='$facyes', `livelihood`='$livelihood', `rice`='$rice', `corn`='$corn', `other_crops_specify`='$other_crops_specify', `livestock`='$livestock', `livestock_specify`='$livestock_specify', `poultry`='$poultry', `poultry_specify`='$poultry_specify', `owner`='$owner', `land`='$land', `planting`='$planting', `cultivation`='$cultivation', `harvesting`='$harvesting', `other_farmworker_specify`='$other_farmworker_specify', `part_of_farming`='$part_of_farming', `attending_formal`='$attending_formal', `attending_nonformal`='$attending_nonformal', `participated`='$participated', `other_agri_youth_specify`='$other_agri_youth_specify' WHERE `user_id`=$user_id";
    $query_run = mysqli_query($con, $query);

    if($query_run){

      $_SESSION['status'] = "Farmer updated successfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/farmer_account.php");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Farmer was not updated";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/farmer_account.php");
      exit(0);
    }
  }

  // Delete Farmer
  if(isset($_POST['farmer_delete'])){
    $user_id= $_POST['farmer_delete'];

    $query = "DELETE FROM `user` WHERE user_id = $user_id ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
      $_SESSION['status'] = "The farmer has been successfully deleted.";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/farmer_account.php");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Something is wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/farmer_account.php");
      exit(0);
    } 
  }


  if(isset($_POST['req_deny'])){
      $req_deny = $_POST['req_deny'];
      $status = 3;

      $query = "UPDATE `request` SET `request_status`= '$status' WHERE `request_id`= '$req_deny'";
      $query_run = mysqli_query($con, $query);
      
      if($query_run){
        $_SESSION['status'] = "Request has been denied!";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "admin/home/request.php");
        exit(0);
      }
      else{
        $_SESSION['message'] = "Something went wrong!";
        header("Location: " . base_url . "admin/home/request.php");
        exit(0);
      }
  }


  if(isset($_POST['request_save'])){
    $farmer_id = $_POST['farmer_id'];
    $request_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $reason = $_POST['reason'];
    $status = $_POST['status'];

    $query= "SELECT product_quantity FROM product WHERE product_id = '$product_id' ";
    $query_run = $con->query($query);
    $data = $query_run->fetch_assoc();
    $qt = $data['product_quantity'];

    if(isset($_POST['status']) && $_POST['status'] == 2) {
      if($qt > $quantity){

        $newpq = $qt - $quantity;

        $query1 = "UPDATE `product` SET `product_quantity`='$newpq' WHERE `product_id`='$product_id'";
        $query1_run1 = mysqli_query($con, $query1);

        $query = "UPDATE `request` SET `status_id`='$status' WHERE `request_id`= '$request_id'";
        $query_run = mysqli_query($con, $query);

        if($query_run && $query1){
          $_SESSION['status'] = "Request has been approved!";
          $_SESSION['status_code'] = "success";
          header("Location: " . base_url . "admin/home/request.php");
          exit(0);
        }
        else{
          $_SESSION['status'] = "Something went wrong!";
          $_SESSION['status_code'] = "error";
          header("Location: " . base_url . "admin/home/request.php");
          exit(0);
        }
      }
      else{
        $_SESSION['status'] = "Insufficient Stocks";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "admin/home/request.php");
        exit(0);
      }
    }
    else{
      $query = "UPDATE `request` SET `status_id`='$status', `reason` = '$reason' WHERE `request_id`= '$request_id'";
      $query_run = mysqli_query($con, $query);

      if($query_run && $query){
        $_SESSION['status'] = "Request has been deny!";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "admin/home/request.php");
        exit(0);
      }
      else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "admin/home/request.php");
        exit(0);
      }
    }
  }

  // Add user
  if(isset($_POST["add_user"])){
    $fileImage = $_FILES['image'];
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
          $fname = $_POST['fname'];
          $mname = $_POST['mname'];
          $lname = $_POST['lname'];
          $suffix = $_POST['suffix'];
          $gender = $_POST['gender'];
          $religion = $_POST['religion'];
          $birthday = $_POST['dob'];
          $placeofbirth = $_POST['placeofbirth'];
          $civilstatus = $_POST['civilstatus'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $role_as = $_POST['role'];
          $new_password = substr(md5(microtime()),rand(0,26),8);
          $password = md5($new_password);
          $user_type = $role_as;
          $user_status = '1';
          $uploadDir = '../../assets/img/users/';
          $targetFile = $uploadDir . $fileName;

          if (move_uploaded_file($fileTmpname, $targetFile)) {
            $query = "INSERT INTO `user`(`fname`, `mname`, `lname`, `suffix`, `gender`, `religion`, `birthday`, `birthplace`, `civil_status`, `email`, `phone`, `password`, `picture`, `user_type`, `user_status`) VALUES ('$fname','$mname','$lname','$suffix','$gender','$religion','$birthday','$placeofbirth','$civilstatus','$email','$phone','$password','$fileName','$user_type','$user_status')";
            $query_run = mysqli_query($con, $query);

            if($query_run){
              $name = htmlentities($_POST['lname']);
              $email = htmlentities($_POST['email']);
              $subject = htmlentities('Username and Password Credentials');
              $message = nl2br("Welcome to MAO System! \r\n \r\n Email: $email \r\n Password: $new_password \r\n \r\n Please change your password immediately.");
              // PHP Mailer
              $mail = new PHPMailer(true);
              $mail->isSMTP();
              $mail->Host = 'smtp.gmail.com';
              $mail->SMTPAuth = true;
              $mail->Username = 'contactmaojimenez@gmail.com';
              $mail->Password = 'kcexdtybjptxgizm';
              $mail->Port = 465;
              $mail->SMTPSecure = 'ssl';
              $mail->isHTML(true);
              $mail->setFrom($email, $name);
              $mail->addAddress($_POST['email']);
              $mail->Subject = ("$email ($subject)");
              $mail->Body = $message;
              $mail->send();
        
              $_SESSION['status'] = "User Added Successfully, Credentials was sent to their email!";
              $_SESSION['status_code'] = "success";
              header("Location: " . base_url . "admin/home/user.php");
              exit(0);
            }
            else{
              $_SESSION['status'] = "User was not added";
              $_SESSION['status_code'] = "error";
              header("Location: " . base_url . "admin/home/user.php");
              exit(0);
            }
          }
          else{
            $_SESSION['status']="Error uploading image.";
            $_SESSION['status_code'] = "error";
            header("Location: " . base_url . "admin/home/user.php");
          }

        }
        else{
          $_SESSION['status']="File is too large file must be 10mb";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "admin/home/user.php");
        }
      }
      else{
        $_SESSION['status']="File Error";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "admin/home/user.php");
      }
    }
    else{
      $_SESSION['status']="Invalid file type";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "admin/home/user.php");
    }
  }

  // Update user
  if(isset($_POST["update_user"])){
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $birthday = $_POST['dob'];
    $placeofbirth = $_POST['placeofbirth'];
    $civilstatus = $_POST['civilstatus'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_type = $_POST['role'];
    $user_status = '1';

    $query = "UPDATE `user` SET 
    `fname`='$fname',
    `mname`='$mname',
    `lname`='$lname',
    `suffix`='$suffix',
    `gender`='$gender',
    `religion`='$religion',
    `birthday`='$birthday',
    `birthplace`='$placeofbirth',
    `civil_status`='$civilstatus',
    `email`='$email',
    `phone`='$phone',
    `user_type`='$user_type',
    `user_status`='$user_status'
    WHERE `user_id`='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
      $_SESSION['status'] = "User updated successfully";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/user.php");
      exit(0);
    }
    else{
      $_SESSION['status'] = "User was not updated";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/user.php");
      exit(0);
    }
  }

  // Add product
  if(isset($_POST["add_product"])){
    $fileImage = $_FILES['image'];
    $customFileName = 'product_' . date('Ymd_His'); // replace with your desired file name
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
          $name = $_POST['name'];
          $quantity = $_POST['quantity'];
          $category = $_POST['category'];
          $status = $_POST['status'];
          $exp_date = $_POST['exp_date'];
          $user_status = '1';
          $uploadDir = '../../assets/img/products/';
          $targetFile = $uploadDir . $fileName;

          if (move_uploaded_file($fileTmpname, $targetFile)) {
            $query = "INSERT INTO `product`(`product_name`, `product_image`, `product_quantity`,`exp_date`, `product_category_id`, `product_status`) VALUES ('$name','$fileName','$quantity','$exp_date','$category','$status')";
            $query_run = mysqli_query($con, $query);

            if($query_run){
              $_SESSION['status'] = "Product added successfully";
              $_SESSION['status_code'] = "success";
              header("Location: " . base_url . "admin/home/manage_product.php");
              exit(0);
            }
            else{
              $_SESSION['status'] = "Product was not added";
              $_SESSION['status_code'] = "error";
              header("Location: " . base_url . "admin/home/manage_product.php");
              exit(0);
            }
          }
          else{
            $_SESSION['status']="Error uploading image.";
            $_SESSION['status_code'] = "error";
            header("Location: " . base_url . "admin/home/manage_product.php");
          }
        }
        else{
            $_SESSION['status']="File is too large file must be 10mb";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "admin/home/manage_product.php");
        }
      }
      else{
          $_SESSION['status']="File Error";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "admin/home/manage_product.php");
      }
    }
    else{
      $_SESSION['status']="Invalid file type";
      $_SESSION['status_code'] = "error"; 
      header("Location: " . base_url . "admin/home/manage_product.php");
    }
  }

  // Update product
  if(isset($_POST["update_product"])){
    $user_id = $_POST['product_id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    $status = $_POST['status'];
    if(isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
      $fileImage = $_FILES['image'];
      $OLDfileImage = $_POST['oldimage'];
      $customFileName = 'product_' . date('Ymd_His'); // replace with your desired file name
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
            $uploadDir = '../../assets/img/products/';
            $targetFile = $uploadDir . $fileName;
            unlink($uploadDir . $OLDfileImage);

            if (move_uploaded_file($fileTmpname, $targetFile)) {
              $query = "UPDATE `product` SET `product_name`='$name',`product_image`='$fileName',`product_quantity`='$quantity',`product_category_id`='$category',`product_status`='$status' WHERE `product_id`='$user_id'";
              $query_run = mysqli_query($con, $query);

              if($query_run){
                $_SESSION['status'] = "Product updated successfully";
                $_SESSION['status_code'] = "success";
                header("Location: " . base_url . "admin/home/manage_product.php");
                exit(0);
              }
              else{
                $_SESSION['status'] = "Product was not updated";
                $_SESSION['status_code'] = "error";
                header("Location: " . base_url . "admin/home/manage_product.php");
                exit(0);
              }
            }
            else{
              $_SESSION['status']="Error uploading image.";
              $_SESSION['status_code'] = "error";
              header("Location: " . base_url . "admin/home/manage_product.php");
            }

          }
          else{
            $_SESSION['status']="File is too large file must be 10mb";
            $_SESSION['status_code'] = "error"; 
            header("Location: " . base_url . "admin/home/manage_product.php");
          }
        }
        else{
          $_SESSION['status']="File Error";
          $_SESSION['status_code'] = "error"; 
          header("Location: " . base_url . "admin/home/manage_product.php");
        }
      }
      else{
        $_SESSION['status']="Invalid file type";
        $_SESSION['status_code'] = "error"; 
        header("Location: " . base_url . "admin/home/manage_product.php");
      }
    }
    else{
      $query = "UPDATE `product` SET `product_name`='$name',`product_quantity`='$quantity',`product_category_id`='$category',`product_status`='$status' WHERE `product_id`='$user_id'";
      $query_run = mysqli_query($con, $query);

      if($query_run){
        $_SESSION['status'] = "Product updated successfully";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "admin/home/manage_product.php");
        exit(0);
      }
      else{
        $_SESSION['status'] = "Product was not updated";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "admin/home/manage_product.php");
        exit(0);
      }
    }
  }

  if(isset($_POST['category_delete'])){
    $user_id= $_POST['category_delete'];
    
    $query = "DELETE FROM product_category WHERE product_category_id ='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run){
      $_SESSION['status'] = "The Category has been successfully deleted.";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/product_category.php");
      exit(0);
    } 
    else{
      $_SESSION['status'] = "There is a product under this category. Please delete the product first before deleting this category!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/product_category.php");
      exit(0);
    } 
  }



  if(isset($_POST['add_category'])){
    $name = $_POST['name'];
    $description = $_POST['description'];

    $query = "INSERT INTO `product_category`(`category_name`, `category_description`) VALUES ('$name','$description')";
    $query_run = mysqli_query($con,$query);

    if($query_run){
        $_SESSION['status'] = "New Category Added";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url . "admin/home/product_category.php");
        exit(0);
    }
    else{
        $_SESSION['status'] = "Something went wrong!";
        $_SESSION['status_code'] = "error";
        header("Location: " . base_url . "admin/home/product_category.php");
        exit(0);
    }
  }


  if(isset($_POST['add_announcement'])){
    $title = $_POST['announcement_title'];
    $body = $_POST['announcement_message'];
    $event_dt = $_POST['announcement_dt'];
    $sender = $_POST['announcement_sender'];
    $ann_status = "Pending";

    $query = "INSERT INTO `announcement`(`ann_title`, `ann_body`, `ann_publish`,`ann_status`, `ann_date`) VALUES ('$title','$body','$sender', '$ann_status','$event_dt')";
    $query_run = mysqli_query($con,$query);

    if($query_run){
      $sql = "SELECT email FROM farmer";
      $result = mysqli_query($con, $sql);

      if (mysqli_num_rows($result) > 0) {
        // Create a new PHPMailer object
        $mail = new PHPMailer(true);
        try {
          $mail->SMTPDebug = 0;                                
          $mail->isSMTP();                                    
          $mail->Host = 'smtp.gmail.com';            
          $mail->SMTPAuth = true;                        
          $mail->Username = 'contactmaojimenez@gmail.com';     
          $mail->Password = 'kcexdtybjptxgizm';                      
          $mail->Port = 465;
          $mail->SMTPSecure = 'ssl';

          // Recipients
          $mail->setFrom('contactmaojimenez@gmail.com', 'MAO JIMENEZ');
          $mail->addReplyTo('reply-to@example.com', 'DO NO REPLY!');

          // Add all email addresses from the database as BCC recipients
          while($row = mysqli_fetch_assoc($result)) {
            $mail->addBCC($row['email']);
          }

          $mail->isHTML(true);                                 
          $mail->Subject = "$title";
          $mail->Body    = "$body";
          $mail->AltBody = "$sender";

          $mail->send();
          $_SESSION['status'] = "Announcement";
          $_SESSION['status_code'] = "success";
          header('Location: announcement.php');
          exit(0);
        }
        catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
      }
      else {
        echo "No email addresses found in the database.";
      }
    }
  }


  if(isset($_POST['edit_category'])){
    $user_id = $_POST['user_id'];
    $name = $_POST['editcategory_name'];
    $description = $_POST['editdescription'];

    $query = "UPDATE `product_category` SET `category_name`='$name',`category_description`='$description' WHERE  `product_category_id`='$user_id'";
    $query_run = mysqli_query($con,$query);

    if($query_run){
      $_SESSION['status'] = "Category Update";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/product_category.php");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Someting went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/product_category.php");
      exit(0);
    }
  }


  if(isset($_POST['ann_post'])){
    $user_id= $_POST['ann_post'];
    $status = "Posted";

    $query = "UPDATE `announcement` SET `ann_status`='$status' WHERE ann_id ='$user_id'";
    $query_run = mysqli_query($con, $query);
    if($query_run){
      $_SESSION['status'] = "The announcement has been successfully posted.";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/announcement.php");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/announcement.php");
      exit(0);
    }
  }

  if(isset($_POST['ann_delete'])){
    $user_id= $_POST['ann_delete'];

    $query = "DELETE FROM announcement WHERE ann_id ='$user_id' ";
    $query_run = mysqli_query($con, $query);
    if($query_run){
      $_SESSION['status'] = "The announcement has been successfully deleted.";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/announcement.php");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Something went wrong!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/announcement.php");
      exit(0);
    }
  }

  if(isset($_POST['edit_announcement'])){
    $user_id = $_POST['user_id'];
    $edit_title = $_POST['edit_announcement_title'];
    $edit_body = $_POST['edit_announcement_message'];
    $edit_event_dt = $_POST['edit_announcement_dt'];
    $edit_sender = $_POST['edit_announcement_sender'];

    $query = "UPDATE `announcement` SET `ann_title`='$edit_title',`ann_body`='$edit_body',`ann_publish`='$edit_sender',`ann_date`='$edit_event_dt' WHERE `ann_id` = '$user_id'";
    $query_run = mysqli_query($con,$query);

    if($query_run){
      $_SESSION['status'] = "The announcement has been successfully updated!";
      $_SESSION['status_code'] = "success";
      header("Location: " . base_url . "admin/home/announcement.php");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Error! SOMETHING WENT WRONG!";
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home/announcement.php");
      exit(0);
    }
  }

  if(isset($_POST['update_account'])){
    $user_id= $_POST['user_id'];
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $picture = addslashes(file_get_contents($_FILES["userprofile"]['tmp_name']));

    $query = "UPDATE `user` SET `fname`='$fname',`mname`='$mname',`lname`='$lname',`email`='$email',`password`='$password',`picture`='$picture' WHERE `user_id`='$user_id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run){
      $_SESSION['status'] = "Account Updated";
      $_SESSION['status_code'] = "success";
      header('Location: index.php');
      header("Location: " . base_url . "admin/home");
      exit(0);
    }
    else{
      $_SESSION['status_code'] = "error";
      header("Location: " . base_url . "admin/home");
      exit(0);
    }
  }

?>
