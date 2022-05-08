<?php
  
  include "connection.php";
  

  $username = $_REQUEST['Username'];
  $pass = $_REQUEST['pass1'];
  $cpass = $_REQUEST['pass2'];
  $OTP = $_REQUEST['otp'];


  if($OTP == 123 && $pass == $cpass){
    $sql = "UPDATE `admin` SET `password`= '$pass' WHERE `username` = '$username'";
    echo $sql;
  }else{

          echo"<script> alert('Password Mismatch OR Wrong OTP') </script>";
          echo '<script>window.location.href = "adminlogin.php";</script>';
          die();
  }
  
  
  
  
  if(mysqli_query($link, $sql))
  {
          echo"<script> alert('Password Updated Successfully') </script>";
		      echo '<script>window.location.href = "adminlogin.php";</script>';
   
} else{
    echo "ERROR: Could not able to execute $sql. ";
}
  
  
  
  
   mysqli_close($link);
?>