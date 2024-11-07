<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Explore Myanmar</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <style type="text/css">

    </style>
</head>
<body>

    <!-- header-start -->
    <header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
                                    	<h4 style="font-family: Broadway;">Explore <br> Myanmar</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="customer_home.php">Home</a></li>
                                            <li><a href="#">Tour<i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                        <li><a href="customer_package.php">Package Tour</a></li>
                                                        <?php 
                                                            $selectpackagetype="Select * from PackageType";
                                                            $runselectpackagetype=mysqli_query($connection,$selectpackagetype);
                                                            $countofpackagetype=mysqli_num_rows($runselectpackagetype);
                                                            if ($countofpackagetype>0) {
                                                              for ($i=0; $i <$countofpackagetype ; $i++) { 
                                                                $data=mysqli_fetch_array($runselectpackagetype);
                                                                $packagetypeid=$data['packagetypeid'];
                                                                $packagetype=$data['packagetype'];
                                                                echo "<li><a href='customer_package.php?ptidchoosenbymenu=$packagetypeid'>$packagetype</a></li>";
                                                              }
                                                            }
                                                         ?>
                                                        <!-- <li><a href="customer_view_schedule.php">View Schedule</a></li>     -->
                                                </ul>
                                            </li>
                                            <li><a href="#">Ticket<i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="customer_view_ticket.php">Available Tickets</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="customer_service.php">Service</a></li>
                                            <li><a href="#">Contact<i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="contact.php">Contact Us</a></li>
                                                    <li><a href="customer_testimonial.php">Testimonial</a></li>
                                                </ul>
                                            </li>
                                            
                                            <li><a href="#">Other<i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="mybooking.php">My Bookings</a></li>
                                                    <li><a href="customer_profile.php">Profile</a></li>
                                                    <li><a href="feedback.php">Feedback</a></li>
                                                    <li><a href="customer_logout.php">Logout</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                    <div class="number">
                                        <p> <i class="fa fa-phone"></i> 10(256)-928 256</p>
                                    </div>
                                    <div class="social_links d-none d-xl-block">
                                        <ul>
                                            <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-google-plus"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="seach_icon">
                                <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->