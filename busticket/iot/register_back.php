<?php 
session_start();

require_once ('connection.php');
require_once ('sms.php');

$time = time();


				$name = mysqli_real_escape_string($link,$_REQUEST['name']);	
				$phone = mysqli_real_escape_string($link,$_REQUEST['phone']);	
				$address = mysqli_real_escape_string($link,$_REQUEST['address']);
				$email = mysqli_real_escape_string($link,$_REQUEST['email']);	
				$username = mysqli_real_escape_string($link,$_REQUEST['username']);	
				$password = mysqli_real_escape_string($link,$_REQUEST['password']);	
	 
				$sql1="SELECT username FROM customer WHERE username='$username'";
				$result1=mysqli_query($link,$sql1);				
				while($row1=mysqli_fetch_assoc($result1))
					{
						echo "<script>
						alert('Username Already exist');
						window.location.href='register.php';						
						</script>";
						die();
					}

				$sql1="SELECT username FROM customer WHERE contact='$phone'";
				$result1=mysqli_query($link,$sql1);				
				while($row1=mysqli_fetch_assoc($result1))
					{
						echo "<script>
						alert('Phone Number Already exist');
						window.location.href='register.php';						
						</script>";
						die();
					}
					
				$otp = rand(1000, 9999);
						
				$sql = "INSERT INTO `customer`(`name`, `contact`, `email`, `address`, `username`, `password`, `reg_otp`,`otp_time`) 
						VALUES('$name','$phone','$email','$address','$username','$password', '$otp','$time' )";

								
						$result = mysqli_query($link,$sql);
						
						if(!($result == null))
								{
										$phone_no = $phone;
										sms($phone_no, $otp);
										$_SESSION['reg_otp'] = $otp;
										$_SESSION['reg_username'] = $username;									
										$_SESSION['reg_time'] = time();									
									
									echo "<script>
											alert('OTP sent successfully');
											window.location.href='get_otp.php';
											</script>";
									die();
																			
								}else
									{
										


										echo "<script>
												alert('something went wrong contact administrator');
												window.location.href='../index.php';
												</script>";
										die();
									}
								
					
					
				

	
	
			
 ?>