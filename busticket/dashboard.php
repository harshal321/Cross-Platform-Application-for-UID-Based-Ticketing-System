<?php
include('header.php');
require_once('connection.php');

$username = $_SESSION['username'];

    $query3 = "SELECT * FROM `all_user` WHERE username = '$username'";	 
	$result3=mysqli_query($link,$query3);	 
	while($row3=mysqli_fetch_assoc($result3))
		{	
			$user_type = $row3['user_type'];
		}

		if(($user_type == '3'))
							{	
								echo 	"<script>
										window.location.href='user_dashboard.php';
										</script>";
										die();
							}		

		
 ?>

<!DOCTYPE html>
<html lang="en">
 
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<title>IOT</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- morris CSS -->
<link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">

<!-- color CSS -->
<link href="css/colors/black.css" id="theme"  rel="stylesheet">

</head>

<body class="fix-sidebar">

  <div id="page-wrapper">
    <div class="container-fluid" >
      <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title">Dashboard</h4>
        </div>
      </div>


<?php


include "connection.php";


$sql = "SELECT * FROM `schedule_time` ORDER by time DESC ";
$result = mysqli_query($link, $sql);

$spped1 = array();
$spped2 = array();
$spped3 = array();
$spped4 = array();

if(mysqli_num_rows($result)>0){
  while ($row = mysqli_fetch_assoc($result)) {

    $test = (string)date('m-d-y  H:i:s',$row['time']);

    array_push($spped1, array("label" => $test, "y" => $row['speed1']));
    array_push($spped2, array("label" => $test, "y" => $row['speed2']));
    array_push($spped3, array("label" => $test, "y" => $row['speed3']));
    array_push($spped4, array("label" => $test, "y" => $row['speed4']));
   
  }
}else{
  echo "No data available in the system.";
}

?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {


//Humidity Chart
var chartHumidity = new CanvasJS.Chart("chartContainerHumidity", {
  animationEnabled: true,
  exportEnabled: true,
  zoomEnabled: true,
  theme: "light1", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "Speed Graph"
  },
  data: [{
    type: "line", //change type to bar, line, area, pie, etc
    //indexLabel: "{y}", //Shows y value on all Data Points
    indexLabelFontColor: "#5A5757",
    indexLabelPlacement: "outside",   
    dataPoints: <?php echo json_encode($spped1, JSON_NUMERIC_CHECK); ?>
  },
  {
    type: "line", //change type to bar, line, area, pie, etc
    //indexLabel: "{y}", //Shows y value on all Data Points
    indexLabelFontColor: "#5A5757",
    indexLabelPlacement: "outside",   
    dataPoints: <?php echo json_encode($spped2, JSON_NUMERIC_CHECK); ?>
  },
  {
    type: "line", //change type to bar, line, area, pie, etc
    //indexLabel: "{y}", //Shows y value on all Data Points
    indexLabelFontColor: "#5A5757",
    indexLabelPlacement: "outside",   
    dataPoints: <?php echo json_encode($spped3, JSON_NUMERIC_CHECK); ?>
  },
  {
    type: "line", //change type to bar, line, area, pie, etc
    //indexLabel: "{y}", //Shows y value on all Data Points
    indexLabelFontColor: "#5A5757",
    indexLabelPlacement: "outside",   
    dataPoints: <?php echo json_encode($spped4, JSON_NUMERIC_CHECK); ?>
  }
  ]
});
chartHumidity.render();

 
}
</script>
</head>
<body>

<div id="chartContainerHumidity" style="height: 500px; width: 100%;"></div><br/>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html> 


	  <!-- /.row -->
      <!-- .row -->
      <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

        </div>
      </div>
      <!-- /.row -->
	  </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--Counter js -->
<script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Morris JavaScript -->
<script src="plugins/bower_components/raphael/raphael-min.js"></script>
<script src="plugins/bower_components/morrisjs/morris.js"></script>
<script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
<script src="js/dashboard3.js"></script>
<!--Style Switcher -->
<script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>