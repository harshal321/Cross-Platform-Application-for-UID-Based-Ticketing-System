<?php
  
  include "connection.php";
  

  $booking_id = $_REQUEST['booking_id'];

  $sql = "DELETE FROM `booking` WHERE id = '$booking_id'";

  if(mysqli_query($link, $sql))
  {
          echo"<script> alert('History deleted') </script>";
          echo '<script>window.location.href = "dashboard.php";</script>';
   
} else{
    echo "ERROR: Could not able to execute $sql. ";
}
  
  
  
  
   mysqli_close($link);
?>