<?php session_start();

echo $_SESSION['reg_otp'];

?>


<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="">
<title></title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="css/colors/blue.css" id="theme"  rel="stylesheet">

<body>
<!-- Preloader -->
<div class="preloader">
  <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
  </svg>
</div>
<section id="wrapper" class="login-register" style="background-image:url(images/bus.gif) !important">
      <br>

  <div class="login-box">
    <div class="white-box">

      <form class="form-horizontal form-material" id="loginform" action="verify_register_otp.php" method="POST">
        <h3 class="box-title m-b-20">OTP</h3>



        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" type="tel"  pattern="[0-9]{4}" placeholder="OTP" name="OTP" required>
          </div>
        </div>

     

        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" name="login" type="submit">Submit</button>
          </div>
        </div>

        <div class="row">
          
        </div>
        
      </form>



    
    
  

        <div class="row">
          
        </div>
        
      </form>
    

    </div>
  </div>
</section>
<!-- jQuery -->
<script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
<!--Style Switcher -->
<script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
