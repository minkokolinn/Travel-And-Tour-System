<?php 
    session_start();
    include('connect.php');
    include('menu_main_customer.php');

    //collect customer who now sign in
    if(isset($_SESSION['cid'])){
        $cid=$_SESSION['cid'];
    }else{
        echo "<script>window.alert('Please Login Customer Account Firstly!.');</script>";
        echo "<script>window.location='index.php';</script>";
    }

    //select all packages
    $selectpackages="select * from Package";
    $runselectpackages=mysqli_query($connection,$selectpackages);
    $choosenpackagetype="";
    if (isset($_POST['btnsearchpackage'])) {
        $choosenpackagetype=$_POST['packagetypeoption'];
    }

    if (isset($_REQUEST['ptidchoosenbymenu'])) {
        $choosenpackagetype=$_REQUEST['ptidchoosenbymenu'];
    }

 ?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travelo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Packages</h3><br>
                        <p>" When we think of tour package, we think mainly on three things namely attraction of the destination, accessibility to the destination and facilities/services available at the destination. However, the fact that tourists’ choice to spend their holidays away from home is likely to have a significant bearing on the level of satisfaction they drive from it. "</p>
                        <br>
                        <a href="#packages_section" class="boxed-btn3">Explore Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

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
                            <div class="search_btn" id="packages_section">
                                <button class="boxed-btn4 " type="submit" >Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- where_togo_area_end  -->

    <form method="post" action="#packages_section">
    <div class="popular_places_area">
        <div class="container">
            <div class="row">
                <!-- <form method="post"> -->
                <div class="col-lg-4">
                    <div class="filter_result_wrap">
                        <h3>Filter Result</h3>
                        <div class="filter_bordered">
                            <div class="filter_inner">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single_select">
                                              <?php 
                                                    $selectpackagetype="select * from PackageType";
                                                    $runselectpackagetype=mysqli_query($connection,$selectpackagetype);
                                                    $numofpackagetype=mysqli_num_rows($runselectpackagetype);
                                                    if ($numofpackagetype>0) {
                                                     for ($i=0; $i <$numofpackagetype ; $i++) { 
                                                        $dataofpackagetype=mysqli_fetch_array($runselectpackagetype);
                                                        $packagetypename=$dataofpackagetype['packagetype'];
                                                        $packagetypeid=$dataofpackagetype['packagetypeid'];
                                                        echo "<input type='radio' name='packagetypeoption' value='$packagetypeid'> $packagetypename";
                                                        echo "<br><br>";
                                                     }   
                                                    }
                                                ?>
                                              
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="reset_btn">
                                <input type="submit" name="btnsearchpackage" class="boxed-btn4" value="Search">
                                <a href="customer_package.php" class="boxed-btn4">
                                Show All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-8">
                    <div class="row">
                        <?php 
                        if ($choosenpackagetype=="") {
                         $selectpackage="Select * from Package p,PackageType pt where p.packagetypeid=pt.packagetypeid";
                                $runselectpackage=mysqli_query($connection,$selectpackage);
                                $countofpackage=mysqli_num_rows($runselectpackage);
                                if ($countofpackage>0) {
                                for ($i=0; $i <$countofpackage ; $i++) { 
                                     $data=mysqli_fetch_array($runselectpackage);
                                     $packageid=$data['packageid'];
                                     $packagename=$data['packagename'];
                                     $packageplaces=$data['places'];
                                     $packagedepartureplace=$data['departure_place'];
                                     $packagearrivalplace=$data['arrival_place'];
                                     $packageestimatedduration=$data['estimated_duration'];
                                     $packageprice=$data['price'];
                                     $packageshortdescription=$data['short_description'];
                                     $packagedetaildescription=$data['detail_description'];
                                     $packageimg1=$data['package_img1'];
                                     $packagetypeid=$data['packagetypeid'];
                                     $packagetype=$data['packagetype'];
                                          
                                    //generate ui
                                     echo "<a href='customer_package_detail.php?pidchoosenbyc=$packageid'>";
                                     echo "<div class='col-lg-6 col-md-6'>";
                                     echo "<div class='single_place'>";
                                     echo "<div class='thumb'>";
                                     echo "<img src='admin/$packageimg1' alt=''>";
                                     echo "<a href='#' class='prise'>MMK $packageprice</a>";
                                     echo "</div>";
                                     echo "<div class='place_info'>";
                                     echo "<a href='#'><h3>$packagename</h3></a>";
                                     echo "<p>$packagedepartureplace -> $packagearrivalplace  <br> $packageshortdescription</p>";
                                     echo "<div class='rating_days d-flex justify-content-between'>";
                                     echo "<span class='d-flex justify-content-center align-items-center'>";
                                     echo "<i class='fa fa-star'></i> 
                                             ";
                                    echo "<a href='#'>($packagetype)</a>";
                                    echo "</span>";
                                    echo "<div class='days'>";
                                    echo "<i class='fa fa-clock-o'></i>";
                                    echo "<a href='#'>$packageestimatedduration</a>";
                                    echo "</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div></a>";
                                }
                                }   
                        }else{
                            $selectpackage="Select * from Package p,PackageType pt where p.packagetypeid=pt.packagetypeid and p.packagetypeid=$choosenpackagetype";
                                $runselectpackage=mysqli_query($connection,$selectpackage);
                                $countofpackage=mysqli_num_rows($runselectpackage);
                                if ($countofpackage>0) {
                                for ($i=0; $i <$countofpackage ; $i++) { 
                                     $data=mysqli_fetch_array($runselectpackage);
                                     $packageid=$data['packageid'];
                                     $packagename=$data['packagename'];
                                     $packageplaces=$data['places'];
                                     $packagedepartureplace=$data['departure_place'];
                                     $packagearrivalplace=$data['arrival_place'];
                                     $packageestimatedduration=$data['estimated_duration'];
                                     $packageprice=$data['price'];
                                     $packageshortdescription=$data['short_description'];
                                     $packagedetaildescription=$data['detail_description'];
                                     $packageimg1=$data['package_img1'];
                                     $packagetypeid=$data['packagetypeid'];
                                     $packagetype=$data['packagetype'];
                                          
                                    //generate ui
                                     echo "<a href='customer_package_detail.php?pidchoosenbyc=$packageid'>";
                                     echo "<div class='col-lg-6 col-md-6'>";
                                     echo "<div class='single_place'>";
                                     echo "<div class='thumb'>";
                                     echo "<img src='admin/$packageimg1' alt=''>";
                                     echo "<a href='#' class='prise'>MMK $packageprice</a>";
                                     echo "</div>";
                                     echo "<div class='place_info'>";
                                     echo "<a href='#'><h3>$packagename</h3></a>";
                                     echo "<p>$packagedepartureplace -> $packagearrivalplace  <br> $packageshortdescription</p>";
                                     echo "<div class='rating_days d-flex justify-content-between'>";
                                     echo "<span class='d-flex justify-content-center align-items-center'>";
                                     echo "<i class='fa fa-star'></i> 
                                             ";
                                    echo "<a href='#'>($packagetype)</a>";
                                    echo "</span>";
                                    echo "<div class='days'>";
                                    echo "<i class='fa fa-clock-o'></i>";
                                    echo "<a href='#'>$packageestimatedduration</a>";
                                    echo "</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div></a>";
                                }
                                }else{
                                    echo "
                                    <div class=col-4></div>
                                    Searching Fail! No Package Found!";
                                }
                        }
                                
                        ?>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="more_place_btn text-center">
                                <a class="boxed-btn4" href="#">More Places</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

        <!-- newletter_area_start  -->
        <div class="newletter_area overlay">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-10">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="newsletter_text">
                                    <h4>For Your Customized Trip!</h4>
                                    <p>Where You Want To Go? We Have big partners! Join with our customized Plan. Check and buy customized ticket!</p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mail_form">
                                    <div class="row no-gutters">
                                        <div class="col-lg-9 col-md-8">
                                            <!-- <div class="newsletter_field">
                                                <input type="email" placeholder="Your mail" >
                                            </div> -->
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="newsletter_btn">
                                                <a href="customer_view_ticket.php">
                                                <button class="boxed-btn4 " type="submit" >To Buy Customized Ticket</button>
                                                </a>
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
    <div class="recent_trip_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Popular Promotion Types</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_trip">
                        <div class="thumb">
                            <img src="img/trip/promotion1.jpg" alt="">
                        </div>
                        <div class="info">
                            <div class="date">
                                <span>Between October 1 and October 31</span>
                            </div>
                            <a href="#">
                                <h3>Thidingyut Promotion</h3>
                                <h6>Discount 30% of Total Amount</h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_trip">
                        <div class="thumb">
                            <img src="img/trip/promotion2.jpg" alt="">
                        </div>
                        <div class="info">
                            <div class="date">
                                <span>More than Five (6) Characters of Booking</span>
                            </div>
                            <a href="#">
                                <h3>Group Promotion</h3>
                                <h6>Discount 20% of Total Amount</h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_trip">
                        <div class="thumb">
                            <img src="img/trip/promotion3.jpg" alt="">
                        </div>
                        <div class="info">
                            <div class="date">
                                <span>Between December 29 and January 3</span>
                            </div>
                            <a href="#">
                                <h3>New Year Promotion</h3>
                                <h6>Discount 40% of Total Amount</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
    <script src="js/jquery-ui.min.js"> </script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/range.js"></script>
        <!-- <script src="js/gijgo.min.js"></script> -->
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
    </script>
    
</body>

</html>

<?php 
    include('footer.php');
 ?>