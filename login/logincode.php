<?php
session_start();
include('../admin/config/dbcon.php');

if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT user_id,fname,lname,email,password,user_type FROM user
    WHERE email = '$email' AND password = '$password'
    UNION
    SELECT user_id,fname,lname,email,password,user_type FROM farmer
    WHERE email = '$email' AND password = '$password' LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {
        foreach($login_query_run as $data){
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

        if( $_SESSION['auth_role'] == '1')
        {
            $_SESSION['status'] = "Welcome $full_name!";
            $_SESSION['status_code'] = "success";
            header("Location: ../admin/index.php");
            exit(0);
        }
        elseif( $_SESSION['auth_role'] == '3')
        {
            $_SESSION['status'] = "Welcome $full_name!";
            $_SESSION['status_code'] = "success";
            header("Location: ../farmer/index.php");
            exit(0);
        }
        elseif( $_SESSION['auth_role'] == '2')
        {
            $_SESSION['status'] = "Welcome $full_name!";
            $_SESSION['status_code'] = "success";
            header("Location: ../staff/index.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "Invalid Email or Password";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit(0);
    }
}   
else
{
    $_SESSION['status'] = "You are not allowed to access this site";
    $_SESSION['status_code'] = "error";
    header("Location: index.php");
    
    exit(0);
}

?>