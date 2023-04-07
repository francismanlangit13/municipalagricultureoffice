<?php
include('../../db_conn.php');

	if(isset($_POST['qrcode_text'])){
		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$qrcode_text = validate($_POST['qrcode_text']);

		$qr_login_query = "SELECT * FROM user WHERE qrcode='$qrcode_text'";
		$qr_login_query_run = mysqli_query($con, $qr_login_query);

		if(mysqli_num_rows($qr_login_query_run) > 0){
			foreach($qr_login_query_run as $data){
				$user_id = $data['user_id'];
				$full_name = $data['fname'].' '.$data['lname'];
				$role_as = $data['user_type'];
				$user_email = $data['email'];
			}

			$_SESSION['auth'] = true;
			$_SESSION['auth_role'] = "$role_as";
			$_SESSION['auth_user'] = [
				'user_id' =>$user_id,
				'user_name' =>$full_name,
				'user_email' =>$user_email,
			];

			if( $_SESSION['auth_role'] == '1'){
				$_SESSION['status'] = "Welcome $full_name!";
				$_SESSION['status_code'] = "success";
				header("Location: " . base_url . "admin");
				exit(0);
			}
			elseif( $_SESSION['auth_role'] == '3'){
				$_SESSION['status'] = "Welcome $full_name!";
				$_SESSION['status_code'] = "success";
				header("Location: " . base_url . "farmer");
				exit(0);
			}
			elseif( $_SESSION['auth_role'] == '2'){
				$_SESSION['status'] = "Welcome $full_name!";
				header("Location: " . base_url . "staff");
				exit(0);
			}
		}
		else {
			$_SESSION['status'] = "Incorrect QR Code";
			$_SESSION['status_code'] = "error";
			header("Location: " . base_url . "login/qr");
			exit(0);
		}
	} 
	else {
		header("Location: " . base_url . "login/qr");
		exit();
	}
?>


