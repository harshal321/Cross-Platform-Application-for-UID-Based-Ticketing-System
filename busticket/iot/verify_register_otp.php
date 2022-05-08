<?php 
session_start();
require_once ('connection.php');

$otp_generated =  $_SESSION['reg_otp'];
$username =  $_SESSION['reg_username'];


$time = $_SESSION['reg_time'];

$otp_user = $_REQUEST['OTP'];



$time_now = time();







if($time_now  > ( $time + 60) )
{


  	            $sql1="DELETE from customer where username='$username'";

				$result1=mysqli_query($link,$sql1);	
			    if(mysqli_query($link, $sql1))
  					{
						echo "<script>
								alert('OTP Time out, Register Again.');
								window.location.href='register.php';
							</script>";
							die();
										
					}

        

}else
					{


						if($otp_user != $otp_generated)
							{
								echo "<script>
														alert('Wrong OTP please try again');
														window.location.href='get_otp.php';
													</script>";
													die();


							}




								$sql1="UPDATE `customer` SET  reg_otp = '123456789' WHERE username =  '$username'";
								$result1=mysqli_query($link,$sql1);


								if($otp_user == $otp_generated)
								{
								   echo "<script>
												alert('OTP Verified');
												window.location.href='../index.php';
												</script>";
										die();
								}


										
					}



?>