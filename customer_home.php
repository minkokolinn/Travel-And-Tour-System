<?php 
    session_start();
    include('connect.php');
    include('menu_main_customer.php');

    
    if(isset($_SESSION['cid'])){
        $cid=$_SESSION['cid'];
    }else{
        echo "<script>window.alert('Please Login Customer Account Firstly!.');</script>";
        echo "<script>window.location='index.php';</script>";
    }

    //recent trip
    $selectschedule_recent="select * from Schedule s,Package p where s.packageid=p.packageid";
    $runselectschedule_recent=mysqli_query($connection,$selectschedule_recent);
    $countofschedule=mysqli_num_rows($runselectschedule_recent);
    // function compareDates($date1, $date2){
    //   return strtotime($date1) - strtotime($date2);
    // }
    // for ($i=0; $i <$countofschedule ; $i++) { 
    //     $data=mysqli_fetch_array($runselectschedule_recent);
    //     $departuredate=$data['departuredate'];
    //     $oo=0;
    //     if (oo==0) {
    //         $dateArr = array($departuredate);
    //         oo=oo+1;
    //     }
    //     array_push($dateArr, $departuredate)
    // }
    
    // usort($dateArr, "compareDates");
    // print_r($dateArr);

 ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="mycss/customerhomecss.css">
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
    </head>
    <body>
                <!-- <h1>Customer ID is <?php echo $cid ?></h1> -->
        <div class="slider_area">
            <div class="slider_active owl-carousel">
                <div class="single_slider  d-flex align-items-center sliderbg1 overlay">
                        <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-md-12">
                                <div class="slider_text text-center">
                                    <h4>Cultural and Heritage Tour</h4>
                                    <p>
                                        Discover the stunning Shwedagon Pagoda, the artisan hub in Inle Lake, with lotus weaving, cigar rolling and silver-smithing…Myanmar never cease to amaze with its rich culture & heritage!
                                    </p>
                                    <a href="#" class="boxed-btn3">Explore Now</a>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
                <div class="single_slider  d-flex align-items-center sliderbg2 overlay">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-md-12">
                                <div class="slider_text text-center">
                                    <h4>Pilgrimage Tours</h4>
                                    <p>Myanmar Pilgrimage tours have been carefully crafted in the wake of this comprehensive research, providing pilgrims (All religions) culture and adventure combine tour!</p>
                                    <a href="#" class="boxed-btn3">Explore Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single_slider  d-flex align-items-center sliderbg3 overlay">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-md-12">
                                <div class="slider_text text-center">
                                    <h4>Historical Tour</h4>
                                    <p>Still largely untouched, Myanmar intrigues with diverse adventures and eco-lodge expeditions to capture the adventurous spirit in you!</p>
                                    <a href="#" class="boxed-btn3">Explore Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single_slider  d-flex align-items-center sliderbg4 overlay">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-md-12">
                                <div class="slider_text text-center">
                                    <h4>Adventure Tour</h4>
                                    <p>Discover the stunning Shwedagon Pagoda, the artisan hub in Inle Lake, with lotus weaving, cigar rolling and silver-smithing…Myanmar never cease to amaze with its rich culture & heritage!</p>
                                    <a href="#" class="boxed-btn3">Explore Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- slider_area_end -->

        <!-- where_togo_area_start  -->
        <div class="where_togo_area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="form_area">
                            <h3>Where you want to go?</h3>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="search_wrap">
                            <form class="search_form" action="#">
                                <div class="input_field">
                                    <input type="text" placeholder="Where to go?">
                                </div>
                                <div class="input_field">
                                    <input id="datepicker" placeholder="Date">
                                </div>
                                <div class="input_field">
                                    <select>
                                        <option data-display="Travel type">Travel type</option>
                                        <option value="1">Some option</option>
                                        <option value="2">Another option</option>
                                    </select>
                                </div>
                                <div class="search_btn">
                                    <button class="boxed-btn4 " type="submit" >Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- where_togo_area_end  -->
        
        <!-- popular_destination_area_start  -->
        <div class="popular_destination_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_title text-center mb_70">
                            <h3>Popular Destination</h3>
                                <p>Myanmar is a country rich in history, culture, custom and tradition. It also has a number of tourist attractions, with many more unknown and yet undiscovered tourist attractions. Many of Myanmar’s popular tourist attractions are famous all over the world. The most common are <strong>bagan</strong>, <strong>kyaikhtiyo Pagoda - the Golden Rock</strong>, <strong>Mandalay</strong>, <strong>Inle Lake(Inlay)</strong>.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single_destination">
                            <div class="thumb">
                                <img src="img/destination/1.jpg" alt="">
                            </div>
                            <div class="content">
                                <p class="d-flex align-items-center">Mandalay <a href="travel_destination.html">  07 Places</a> </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_destination">
                            <div class="thumb">
                                <img src="img/destination/2.jpeg" alt="" height="255">
                            </div>
                            <div class="content">
                                <p class="d-flex align-items-center">Mon State <a href="travel_destination.html">  03 Places</a> </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_destination">
                            <div class="thumb">
                                <img src="img/destination/3.jpg" alt="">
                            </div>
                            <div class="content">
                                <p class="d-flex align-items-center">Shan State <a href="travel_destination.html">  10 Places</a> </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_destination">
                            <div class="thumb">
                                <img src="img/destination/4.jpg" alt="">
                            </div>
                            <div class="content">
                                <p class="d-flex align-items-center">Bagan <a href="travel_destination.html">  02 Places</a> </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_destination">
                            <div class="thumb">
                                <img src="img/destination/5.jpg" alt="">
                            </div>
                            <div class="content">
                                <p class="d-flex align-items-center">Kayin <a href="travel_destination.html">  02 Places</a> </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_destination">
                            <div class="thumb">
                                <img src="img/destination/6.jpg" alt="">
                            </div>
                            <div class="content">
                                <p class="d-flex align-items-center">Upper Myanamar <a href="travel_destination.html">  05 Places</a> </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- popular_destination_area_end  -->

        <!-- newletter_area_start  -->
        <div class="newletter_area overlay">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-10">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="newsletter_text">
                                    <h4>Subscribe Our Newsletter</h4>
                                    <p>Subscribe newsletter to get offers and about
                                        new places to discover.</p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="mail_form">
                                    <div class="row no-gutters">
                                        <div class="col-lg-9 col-md-8">
                                            <div class="newsletter_field">
                                                <input type="email" placeholder="Your mail" >
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4">
                                            <div class="newsletter_btn">
                                                <button class="boxed-btn4 " type="submit" >Subscribe</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- newletter_area_end  -->
<!-- 
        <div class="popular_places_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_title text-center mb_70">
                            <h3>Popular Places</h3>
                            <p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit hella wolf moon beard words.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="img/place/1.png" alt="">
                                <a href="#" class="prise">$500</a>
                            </div>
                            <div class="place_info">
                                <a href="destination_details.html"><h3>California</h3></a>
                                <p>United State of America</p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i>
                                         <a href="#">(20 Review)</a>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#">5 Days</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="img/place/2.png" alt="">
                                <a href="#" class="prise">$500</a>
                            </div>
                            <div class="place_info">
                                <a href="destination_details.html"><h3>Korola Megna</h3></a>
                                <p>United State of America</p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i>
                                         <a href="#">(20 Review)</a>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#">5 Days</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="img/place/3.png" alt="">
                                <a href="#" class="prise">$500</a>
                            </div>
                            <div class="place_info">
                                <a href="destination_details.html"><h3>London</h3></a>
                                <p>United State of America</p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i>
                                         <a href="#">(20 Review)</a>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#">5 Days</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="img/place/4.png" alt="">
                                <a href="#" class="prise">$500</a>
                            </div>
                            <div class="place_info">
                                <a href="destination_details.html"><h3>Miami Beach</h3></a>
                                <p>United State of America</p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i>
                                         <a href="#">(20 Review)</a>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#">5 Days</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="img/place/5.png" alt="">
                                <a href="#" class="prise">$500</a>
                            </div>
                            <div class="place_info">
                                <a href="destination_details.html"><h3>California</h3></a>
                                <p>United State of America</p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i>
                                         <a href="#">(20 Review)</a>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#">5 Days</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="img/place/6.png" alt="">
                                <a href="#" class="prise">$500</a>
                            </div>
                            <div class="place_info">
                                <a href="destination_details.html"><h3>Saintmartine Iceland</h3></a>
                                <p>United State of America</p>
                                <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i> 
                                         <i class="fa fa-star"></i>
                                         <a href="#">(20 Review)</a>
                                    </span>
                                    <div class="days">
                                        <i class="fa fa-clock-o"></i>
                                        <a href="#">5 Days</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="more_place_btn text-center">
                            <a class="boxed-btn4" href="#">More Places</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <br><br><br><br>
        <div class="video_area video_bg overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="video_wrap text-center">
                            <h3>Enjoy Video</h3>
                            <div class="video_icon">
                                <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=f59dDEk57i0">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="travel_variation_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single_travel text-center">
                            <div class="icon">
                                <img src="img/svg_icon/1.svg" alt="">
                            </div>
                            <h3>Comfortable Journey</h3>
                            <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_travel text-center">
                            <div class="icon">
                                <img src="img/svg_icon/2.svg" alt="">
                            </div>
                            <h3>Luxuries Hotel</h3>
                            <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_travel text-center">
                            <div class="icon">
                                <img src="img/svg_icon/3.svg" alt="">
                            </div>
                            <h3>Travel Guide</h3>
                            <p>A wonderful serenity has taken to the possession of my entire soul.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- testimonial_area  -->
        <div class="testimonial_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="testmonial_active owl-carousel">
                            <div class="single_carousel">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="single_testmonial text-center">
                                            <div class="author_thumb">
                                                <img src="img/testmonial/person_2.jpg" alt="">
                                            </div>
                                            <p>"Thank you so much for being proactive (awesome memory, by the way). Maybe it seems like no big deal to you but this is amazing customer service and is greatly appreciated."</p>
                                            <div class="testmonial_author">
                                                <h3>- John Harry</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_carousel">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="single_testmonial text-center">
                                            <div class="author_thumb">
                                                <img src="img/testmonial/author.png" alt="">
                                            </div>
                                            <p>"I just realized that we have been back from Italy for 6 weeks now.  I cannot believe we have been back that long.  I am embarrassed that I took this long to get in touch with you."</p>
                                            <div class="testmonial_author">
                                                <h3>-  Starla M</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single_carousel">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="single_testmonial text-center">
                                            <div class="author_thumb">
                                                <img src="img/testmonial/person_3.jpg" alt="">
                                            </div>
                                            <p>"Just wanted to say many, many thanks for helping me set up an amazing Costa Rican adventure! My nephew and I had a blast! All of the accommodations were perfect as were the activities that we did (canopy, coffee tour, hikes, fishing, and massages!)"</p>
                                            <div class="testmonial_author">
                                                <h3>- Jerry Mouse</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /testimonial_area  -->

<!-- 
        <div class="recent_trip_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_title text-center mb_70">
                            <h3>Recent Trips</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single_trip">
                            <div class="thumb">
                                <img src="img/trip/1.png" alt="">
                            </div>
                            <div class="info">
                                <div class="date">
                                    <span>Oct 12, 2019</span>
                                </div>
                                <a href="#">
                                    <h3>Journeys Are Best Measured In
                                        New Friends</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_trip">
                            <div class="thumb">
                                <img src="img/trip/2.png" alt="">
                            </div>
                            <div class="info">
                                <div class="date">
                                    <span>Oct 12, 2019</span>
                                </div>
                                <a href="#">
                                    <h3>Journeys Are Best Measured In
                                        New Friends</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_trip">
                            <div class="thumb">
                                <img src="img/trip/3.png" alt="">
                            </div>
                            <div class="info">
                                <div class="date">
                                    <span>Oct 12, 2019</span>
                                </div>
                                <a href="#">
                                    <h3>Journeys Are Best Measured In
                                        New Friends</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->


      <!-- Modal -->
      <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="serch_form">
                <input type="text" placeholder="Search" >
                <button type="submit">search</button>
            </div>
          </div>
        </div>
      </div>
        <!-- link that opens popup -->
    <!--     
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>

        <script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script> -->
        <!-- JS here -->
        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/scrollIt.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/nice-select.min.js"></script>
        <script src="js/jquery.slicknav.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/gijgo.min.js"></script>
        <script src="js/slick.min.js"></script>
       

        
        <!--contact js-->
        <script src="js/contact.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/mail-script.js"></script>


        <script src="js/main.js"></script>
        <script>
            $('#datepicker').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                 rightIcon: '<span class="fa fa-caret-down"></span>'
             }
            });
        </script>
    </body>
    </html>



<?php 
    include('footer.php');
 ?>