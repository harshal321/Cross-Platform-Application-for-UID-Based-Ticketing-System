<?php session_start();
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	include "../connection.php";
	

	if(isset($_REQUEST['name'])){
		$price = $_REQUEST['name'];
		$_SESSION['balance'] = $price;
	}

	if(isset($_REQUEST['cst_name'])){
		$cst_id = $_REQUEST['cst_name'];
}


   $sql="SELECT balance FROM customer WHERE username ='$cst_id'";
   $result=mysqli_query($link,$sql);
   
   while($row=mysqli_fetch_assoc($result))
   {
     $balance=$row['balance'];
   }


	$new_bal = $balance + $price;

   $sql= "UPDATE `customer` SET balance = '$new_bal' WHERE username ='$cst_id'";
   $result=mysqli_query($link,$sql);

   $sql="SELECT c_id FROM customer WHERE username ='$cst_id'";
   $result=mysqli_query($link,$sql);
   
   while($row=mysqli_fetch_assoc($result))
   {
     $c_id=$row['c_id'];
   }
	
$time = time();

   $sql = "INSERT INTO `transactions`(`customer_id`, `time`, `amount`, `type`, `balance`) VALUES ('$c_id','$time','$price','0','$new_bal')";


   $result=mysqli_query($link,$sql);
   


$paytm_order_id = "ORDS" . rand(10000,99999999) . "_" . $cst_id;


	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title style="visibility: hidden;">Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
</head>
<body>
	<h1>Merchant Check Out Page</h1>
	<pre>
	</pre>
	<form method="post" style="visibility: hidden;" action="pgRedirect.php" name="payment">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo $paytm_order_id; ?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $cst_id; ?>"></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php echo $price; ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		* - Mandatory Fields
	</form>
	<script>
		document.payment.submit();
	</script>
</body>
</html>