<?php
  session_start();
  include "connection.php";

  $username =  $_REQUEST["username"];
  $password = $_REQUEST["password"];

			$query = "SELECT username, password FROM customer WHERE username='$username' AND password='$password'  AND reg_otp = '123456789' ";
			
			$result = mysqli_query($link,$query)or die(mysqli_error());
			$num_row = mysqli_num_rows($result);
			$row=mysqli_fetch_array($result);
			if( $num_row ==1 )
			{
			  $_SESSION['username'] = $username;
			  echo"<script> alert('Login Successfull') </script>";
			  echo '<script>window.location.href = "user_dashboard.php";</script>';
			  die();
				  
			}else
			{
				echo"<script> alert('wrong username or password') </script>";
				echo '<script>window.location.href = "../index.php";</script>';
				die();
			}
  	  
  	  
  
   mysqli_close($conn);
?>