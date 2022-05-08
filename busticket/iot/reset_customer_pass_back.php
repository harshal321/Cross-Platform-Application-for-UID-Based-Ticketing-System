<?php
  
  include "connection.php";
  

  $username = $_REQUEST['name'];
  $pass = $_REQUEST['pass1'];
  $cpass = $_REQUEST['pass2'];


  if($pass == $cpass){
    $sql = "UPDATE `customer` SET `password`= '$pass' WHERE `username` = '$username'";

  }else{

          echo"<script> alert('Password Mismatch') </script>";
          echo '<script>window.location.href = "dashboard.php";</script>';
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