<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
session_start();

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;


$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.


$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		$_SESSION['payment_success'] = 1;
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
		$_SESSION['payment_success'] = 0;
	}
	
	$order_id = explode("_", $_POST['ORDERID']);
	$username = $order_id[1];
	$_SESSION['username'] = $username;
	$_SESSION['respcode'] = $_POST['RESPCODE'];
	$_SESSION['payment_id'] = $_POST['TXNID'];
	$_SESSION['amount'] = $_POST['TXNAMOUNT'];
	if (isset($_POST) && count($_POST)>0 )
	{ 
		echo "<script>
			window.location.href = '../iot/add_balance_back.php';
		</script>";

	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>