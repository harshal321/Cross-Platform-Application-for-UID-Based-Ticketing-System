<?php
  
  include "connection.php";
  

  $id = $_REQUEST['id'];

  $sql = "DELETE FROM `bus_stops` WHERE id = '$id'";

  if(mysqli_query($link, $sql))
  {
          echo"<script> alert('Bus Stop deleted') </script>";
          echo '<script>window.location.href = "dashboard.php";</script>';
   
} else{
    echo "ERROR: Could not able to execute $sql. ";
}
  
  
  
  
   mysqli_close($link);
?>