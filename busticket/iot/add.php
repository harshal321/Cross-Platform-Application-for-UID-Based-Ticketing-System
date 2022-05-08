<?php

  require_once ('sms_journey.php');
  include "connection.php";

  $data =  $_REQUEST["data"];
  $time = time();
  $reading = explode("@", $data);
  
  $f_id = $reading[0];
  $stop_id = $reading[1];

  $sql="SELECT * FROM customer WHERE f_id='$f_id'";
  $var1=mysqli_query($link,$sql);

  if(mysqli_num_rows($var1) > 0)
  	{}else
  		{ 
  			echo "%0#";   //No Finger ID in Databse
  			die();
  		}
           

  $sql1="SELECT * FROM `bus_stops` WHERE id ='$stop_id'";
           $result1=mysqli_query($link,$sql1);
        if(mysqli_num_rows($result1) > 0)
	{
           while($row1=mysqli_fetch_assoc($result1))
           {
             $stop=$row1['name'];
           }

	}else
		{

			echo "%0#";  //no such stop
  				die();

		}


      $sql="SELECT * FROM customer WHERE f_id='$f_id'";
           $result=mysqli_query($link,$sql);
           
           while($row=mysqli_fetch_assoc($result))
           {
             $c_id=$row['c_id'];
             $balance = $row['balance'];
             $contact = $row['contact'];
           }


  $select_path="SELECT * FROM `booking` WHERE `customer_id` = '$c_id' AND `status` = '1'";

  $var=mysqli_query($link,$select_path);

  if(mysqli_num_rows($var) > 0)
  {
    while($row=mysqli_fetch_array($var))
      {
        $id=$row["id"];
        $start_point = $row["start_point"];

           $sql2="SELECT * FROM `bus_stops` WHERE name ='$start_point'";
           $result2=mysqli_query($link,$sql2);
           
           while($row2=mysqli_fetch_assoc($result2))
           {
             $start_id=$row2['name'];
           }

      }


      $cost_query = "SELECT * FROM `ticket_amount` WHERE start = '$start_id' AND end = '$stop'";
      $result1=mysqli_query($link,$cost_query);

      if(mysqli_num_rows($result1) > 0)
  		{ 

  			if($start_id == $stop)
  			{
  				echo "%0#";  //start end point is same
  				die();
  			}

  			while($row1=mysqli_fetch_array($result1))
      		{
  				  $cost = $row1["cost"];

			      $update = "UPDATE `booking` SET `end_time`='$time',`end_point`='$stop',`cost`='$cost',`status`='2' WHERE id = '$id'";
			      mysqli_query($link,$update);

			      echo "%1#";  //end point updated

			      $balance = $balance - $cost;

			      $msg = "Your Journey From ".$start_id." to ".$stop." is ended at Cost Rs. ".$cost;

			      sms($contact, $msg);

			      $update = "UPDATE customer set balance = '$balance' where f_id = '$f_id'";
			      mysqli_query($link,$update);




   			}
  		}else
  		 {
  		 	echo "%0#";  //No Cost in Databse
  		 	die();
  		 }





  }else
    {

     if($balance < 50)
     {
     	echo "%0#";  //Low Balance
     }

      $query_add = "INSERT INTO `booking`( `start_time`,`start_point`, `customer_id`, `status`) VALUES ('$time','$stop','$c_id','1')";
     
      mysqli_query($link,$query_add);

      echo "%1#";  //start point updated

    }

  
?>