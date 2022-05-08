<?php session_start();
  include "connection.php";
  
  $otp_sent = $_SESSION['reset_otp'];
  

  $username = $_REQUEST['Username'];
  $pass = $_REQUEST['pass1'];
  $cpass = $_REQUEST['pass2'];
  $OTP = $_REQUEST['otp'];


  if($OTP == $otp_sent && $pass == $cpass){
    $sql = "UPDATE `customer` SET `password`= '$pass' WHERE `username` = '$username'";

  }else{

          echo"<script> alert('Password Mismatch OR Wrong OTP') </script>";
          echo '<script>window.location.href = "login.php";</script>';
          die();
  }
  
  

  
  
  if(mysqli_query($link, $sql))
  {
          echo"<script> alert('Password Updated Successfully') </script>";
		      echo '<script>window.location.href = "user_dashboard.php";</script>';
   
} else{
    echo "ERROR: Could not able to execute $sql. ";
}
  
  
  
  
   mysqli_close($link);
?>