<?php
  
  include "connection.php";
  

  $transacton_id = $_REQUEST['transacton_id'];

  $sql = "DELETE FROM `transactions` WHERE id = '$transacton_id'";

  if(mysqli_query($link, $sql))
  {
          echo"<script> alert('Transaction History deleted') </script>";
          echo '<script>window.location.href = "dashboard.php";</script>';
   
} else{
    echo "ERROR: Could not able to execute $sql. ";
}
  
  
  
  
   mysqli_close($link);
?>