<?php 

require_once ('connection.php');


				$name = mysqli_real_escape_string($link,$_REQUEST['name']);	
				$phone = mysqli_real_escape_string($link,$_REQUEST['phone']);	
				$comment = mysqli_real_escape_string($link,$_REQUEST['comment']);	
						
				$sql = "INSERT INTO `feedback`( `name`, `number`, `feedback`) 
						VALUES('$name','$phone','$comment')";

								
						$result = mysqli_query($link,$sql);
						
						if(!($result == null))
								{
									
									echo "<script>
											alert('Done successfully');
											window.location.href='../index.php';
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