<?php
  
  include "connection.php";
  

  $id = $_REQUEST['c_id'];


    $sql = "DELETE FROM `customer` WHERE `c_id` = '$id'";


  
  if(mysqli_query($link, $sql))
  {
          echo"<script> alert('Customer Deleted Successfully') </script>";
		      echo '<script>window.location.href = "dashboard.php";</script>';
   
} else{
    echo "ERROR: Could not able to execute $sql. ";
}
  
  
   mysqli_close($link);
?>