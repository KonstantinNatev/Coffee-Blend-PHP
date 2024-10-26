<?php 
  session_start();
  define("APPURL", "http://localhost/coffee-blend/")
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Coffee - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo APPURL; ?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo APPURL?>css/animate.css">
    
    <link rel="stylesheet" href="<?php echo APPURL?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo APPURL?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo APPURL?>css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo APPURL?>css/aos.css">

    <link rel="stylesheet" href="<?php echo APPURL?>css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo APPURL?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo APPURL?>css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo APPURL?>css/flaticon.css">
    <link rel="stylesheet" href="<?php echo APPURL?>css/icomoon.css">
    <link rel="stylesheet" href="<?php echo APPURL?>css/style.css">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Coffee<small>Blend</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="menu.html" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	         
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
            <?php if(isset($_SESSION['username'])) : ?>
	          <li class="nav-item cart"><a href="cart.html" class="nav-link"><span class="icon icon-shopping_cart"></span></a>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['username']; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo APPURL?>/auth/logout.php">Logout</a>
              </div>
            </li>
            <?php else: ?>
              <li class="nav-item"><a href="<?php echo APPURL?>auth/login.php" class="nav-link">login</a></li>
              <li class="nav-item"><a href="<?php echo APPURL?>auth/register.php" class="nav-link">register</a></li>
            <?php endif; ?>
	        </ul>
	      </div>
		</div>
	  </nav>
    <!-- END nav -->