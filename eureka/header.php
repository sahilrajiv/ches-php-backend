<?
ob_start();
session_start();

$timezone = "Asia/Kolkata";
date_default_timezone_set($timezone);


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>
        <? echo $p_title; ?>
    </title>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-X90732JGMN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-X90732JGMN');
</script>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../includes/icon.ico">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->


    <!-- Header Area Start -->
    <header class="header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="conferNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="./index.php"><img src="./img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">

                                <? if(isset($_SESSION['id'])){ ?>
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <? }else{ ?>
                                <li><a href="index.php">Home</a></li>
                                <? } ?>

                                <li><a href="feed.php">Eureka 3.0 Feed</a></li>
<li><a href="leaderboard.php">3.0 Leaderboard</a></li>
                                <li><a href="eureka1.php">Eureka 1.0</a></li>
                                <li><a href="eureka2.php">Eureka 2.0</a></li>
                            </ul>

                            <? if(isset($_SESSION['id'])){ ?>
											<a href="logout.php" class="btn confer-btn mt-3 mt-lg-0 ml-3 ml-lg-5">Logout<i class="zmdi zmdi-long-arrow-right"></i></a>
									 <? }else{ ?>
                           <a href="login.php" class="btn confer-btn mt-3 mt-lg-0 ml-3 ml-lg-5">Login<i class="zmdi zmdi-long-arrow-right"></i></a>
									<? } ?>

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Header Area End -->