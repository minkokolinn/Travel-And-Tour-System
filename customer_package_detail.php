<?php 
      session_start();
    include('connect.php');
    include('menu_main_customer.php');

    if (isset($_REQUEST['pidchoosenbyc'])) {
      $packageidtoshow=$_REQUEST['pidchoosenbyc'];
    }else{
      echo "<script>window.alert('Please Select A Package!.');</script>";
        echo "<script>window.location='customer_package.php';</script>";
    }

    $selectpackage="Select * from Package p,PackageType pt where p.packagetypeid=pt.packagetypeid and p.packageid=$packageidtoshow";
      $runselectpackage=mysqli_query($connection,$selectpackage);
      $countofpackage=mysqli_num_rows($runselectpackage);
    if ($countofpackage==1) {
      
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
           $packageimg2=$data['package_img2'];
           $packageimg3=$data['package_img3'];
           $packagetypeid=$data['packagetypeid'];
           $packagetype=$data['packagetype'];
           $packagetypedesp=$data['typedescription'];
      
    }
 ?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>interior</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <!-- bradcam_area  -->
    <div class="bradcam_area" style="background-image: url(admin/<?php echo "$packageimg1"; ?>);">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="bradcam_text text-center">
                      <h3><?php echo "$packagename"; ?></h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--/ bradcam_area  -->

   <!--================Blog Area =================-->

   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="admin/<?php echo $packageimg2 ?>" alt="">
                  </div>
                  <div class="blog_details">
                     <h2><?php echo "$packagename"; ?>
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-location-arrow"></i> Departure : <?php echo "$packagedepartureplace"; ?></a></li>
                        <li><a href="#"><i class="fa fa-map-marker"></i> Arrival : <?php echo "$packagearrivalplace"; ?></a></li>
                        <li><a href="#"><i class="fa fa-calendar"></i> Duration : <?php echo "$packageestimatedduration"; ?></a></li>
                        <li><a href="#"><i class="fa fa-money"></i> Cost : <?php echo "$packageprice"; ?></a></li>
                     </ul>
                     <p class="excert">
                        <strong><?php echo "$packageshortdescription"; ?></strong>
                     </p>
                     <p>
                       <?php echo "$packagedetaildescription"; ?>
                     </p>
                     <div class="quote-wrapper">
                        <div class="quotes">
                            <strong><?php echo "$packagetype"; ?></strong><br><br>
                           <?php echo "$packagetypedesp"; ?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                    <div class="col-8"></div>
                     <a href="customer_package.php" class="fa fa-arrow-left">&nbsp;&nbsp;&nbsp;&nbsp;Back To Package List</a>
                  </div>
                  <div class="navigation-area">
                    <div class="section-top-border">
            <h3>Image Gallery</h3>
            <div class="row gallery-item">
              <div class="col-md-4">
                <a href="admin/<?php echo $packageimg1 ?>" class="img-pop-up">
                  <div class="single-gallery-image" style="background: url(admin/<?php echo $packageimg1 ?>);"></div>
                </a>
              </div>
              <div class="col-md-4">
                <a href="admin/<?php echo $packageimg2 ?>" class="img-pop-up">
                  <div class="single-gallery-image" style="background: url(admin/<?php echo $packageimg2 ?>);"></div>
                </a>
              </div>
              <div class="col-md-4">
                <a href="admin/<?php echo $packageimg3 ?>" class="img-pop-up">
                  <div class="single-gallery-image" style="background: url(admin/<?php echo $packageimg3 ?>);"></div>
                </a>
              </div>
          </div>
          </div>
                  </div>
               </div>
            </div>

            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">
                     <form action="">
                        <div class="form-group">
                           <div class="input-group mb-3">
                              <input type="text" style="color: black; font-weight: normal; font-size: 18px" class="form-control" value="MMK-<?php echo $packageprice;?> &nbsp;&nbsp;($<?php $dollar=$packageprice/1357;
                                  echo number_format($dollar, 2, '.', ''); ?>)" 
                                  readonly
                                 onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                           </div>
                        </div>
                        <a href="booking_schedule.php?pidfromdetail=<?php echo $packageid; ?>" class="btn_1 boxed-btn">
                         Book
                        </a>

                     </form>
                  </aside>
                  <aside class="single_sidebar_widget post_category_widget">
                     <h4 class="widget_title">Places</h4>
                     <ul class="list cat-list">
                      <?php 
                      $string = $packageplaces; 
                      $str_arr = explode (",", $string);  
                      for ($i=0; $i <sizeof($str_arr) ; $i++) { 
                        echo "
                          <li>
                           <a class='d-flex'>
                              <p class='d-flex'>$str_arr[$i]</p>
                           </a>
                        </li>
                        ";
                      }
                       ?>
                        
                     </ul>
                  </aside>
                  <aside class="single_sidebar_widget instagram_feeds">
                     <h4 class="widget_title">Image Preview</h4>
                     <ul class="instagram_row flex-wrap">
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="admin/<?php echo $packageimg1 ?>" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="admin/<?php echo $packageimg2 ?>" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="admin/<?php echo $packageimg3 ?>" alt="">
                           </a>
                        </li>
                     </ul>
                  </aside>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!--================ Blog Area end =================-->

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

   <!--contact js-->
   <script src="js/contact.js"></script>
   <script src="js/jquery.ajaxchimp.min.js"></script>
   <script src="js/jquery.form.js"></script>
   <script src="js/jquery.validate.min.js"></script>
   <script src="js/mail-script.js"></script>

   <script src="js/main.js"></script>

</body>

</html>
<?php 
  include('footer.php');
 ?>