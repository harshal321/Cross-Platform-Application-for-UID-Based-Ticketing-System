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
				$value = mysqli_real_escape_string($link,$_REQUEST['value']);	

						
				$sql = "INSERT INTO `bus_stops`(`name`, `value`) VALUES ('$name','$value')";

								
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