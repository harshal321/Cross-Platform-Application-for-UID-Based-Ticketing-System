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


				$start = mysqli_real_escape_string($link,$_REQUEST['start']);
				$stop = mysqli_real_escape_string($link,$_REQUEST['stop']);
				$cost = mysqli_real_escape_string($link,$_REQUEST['cost']);

				if($start == $stop)
				{
						echo "<script>
											alert('Start and Stop point can not be same ');
											window.location.href='add_cost.php';
											</script>";
									die();

				}

				if($cost == 0)
				{
						echo "<script>
											alert('Cost can not be 0 ');
											window.location.href='add_cost.php';
											</script>";
									die();

				}


						
				$sql = "INSERT INTO `ticket_amount`( `start`, `end`, `cost`) VALUES ('$start','$stop','$cost')";
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