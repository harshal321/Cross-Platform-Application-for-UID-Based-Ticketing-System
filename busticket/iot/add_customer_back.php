<?php 
include 'header.php'; 
if ((isset($_SESSION['username'])) )
	{

	}
	else{
		echo"<script>window.location.href='../index.php';</script>";
		
	}
?>

<?php 

require_once ('connection.php');


				$name = mysqli_real_escape_string($link,$_REQUEST['name']);	
				$phone = mysqli_real_escape_string($link,$_REQUEST['mobile_number']);	
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
						window.location.href='add_customer.php';						
						</script>";
						die();
					}
					

						
				$sql = "INSERT INTO `customer`(`name`, `contact`, `email`, `address`, `username`, `password`,`balance`) 
						VALUES('$name','$phone','$email','$address','$username','$password','0')";

								
						$result = mysqli_query($link,$sql);
						
						if(!($result == null))
								{
									
									echo "<script>
											alert('Done successfully');
											window.location.href='dashboard.php';
											</script>";
									die();
																			
								}else
									{
										echo "<script>
												alert('something went wrong contact administrator');
												window.location.href='add_customer.php';
												</script>";
										die();
									}
								
					
					
				

	
	
			
 ?>