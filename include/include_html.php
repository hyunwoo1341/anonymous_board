<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<title>익명질문사이트</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->

    <!--     Fonts and icons     -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link href="css/material-kit.css" rel="stylesheet"/>
      <link rel="stylesheet" href="css/style.css">
  </head>

  <!--   Core JS Files   -->
  <script defer src="js/jquery.min.js" type="text/javascript"></script>
  <script defer src="js/bootstrap.min.js" type="text/javascript"></script>
  <script defer src="js/material.min.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script defer src="js/nouislider.min.js" type="text/javascript"></script>

  <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
  <script defer src="js/bootstrap-datepicker.js" type="text/javascript"></script>

  <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
  <script defer src="js/material-kit.js" type="text/javascript"></script>
  <script
    src="https://code.jquery.com/jquery-1.12.4.js"
    integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
    crossorigin="anonymous"></script>
  <script type="text/javascript">
  	$().ready(function(){
  		// the body of this function is in assets/material-kit.js
  		materialKit.initSliders();
  					window_width = $(window).width();

  					if (window_width >= 992){
  							big_image = $('.wrapper > .header');

  			$(window).on('scroll', materialKitDemo.checkScrollForParallax);
  		}
  	});
  </script>
  </html>
