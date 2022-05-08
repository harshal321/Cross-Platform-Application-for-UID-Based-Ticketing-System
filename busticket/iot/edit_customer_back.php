<?php
  
  include "connection.php";
  

  $c_id = $_REQUEST['c_id'];
  $name = $_REQUEST['name'];
  $mobile_number = $_REQUEST['mobile_number'];
  $email = $_REQUEST['email'];
  $address = $_REQUEST['address'];
  $f_id = $_REQUEST['f_id'];

    $sql = "UPDATE `customer` SET `name`='$name',`contact`='$mobile_number',`email`='$email',`address`='$address',`f_id`= '$f_id' WHERE `c_id` = '$c_id'";

  if(mysqli_query($link, $sql))
  {
          echo"<script> alert('Data Updated') </script>";
          echo '<script>window.location.href = "dashboard.php";</script>';
   
} else{
    echo "ERROR: Could not able to execute $sql. ";
}
  
  
  
  
   mysqli_close($link);
?>