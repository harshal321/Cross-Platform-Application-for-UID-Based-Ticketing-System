<?php
  session_start();
  include "connection.php";
  
  $username = $_REQUEST['Username'];
  $pass = $_REQUEST['pass1'];
  $cpass = $_REQUEST['pass2'];
  $OTP = $_REQUEST['otp'];



  if($OTP == 123 && $pass == $cpass){
    $sql = "UPDATE `customer` SET `password`= '$pass' WHERE `username` = '$username'";
  }else{

          echo"<script> alert('Password or OTP Mismatch') </script>";
          echo '<script>window.location.href = "login.php";</script>';
          die();
  }
  
  
  
  
  if(mysqli_query($link, $sql))
  {
          echo"<script> alert('Password Updated Successfully') </script>";
		      echo '<script>window.location.href = "dashboard.php";</script>';
   
} else{
    echo "ERROR: Could not able to execute $sql. ";
}
  
  
  
  
   mysqli_close($link);
?>