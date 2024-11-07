<?php 
    include('connect.php');
    include('menu_main_customer.php');

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>interior</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" type="text/css" href="mycss/profilecss1.css">
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
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <style type="text/css">
        .profileimgcss{
            border-radius: 50%;
            border: 4px solid black;
            width: 30%;
            height: auto;
            margin-left: 35%;
            box-shadow: 0px 0px 10px #999;
        }
        #profilecard{
            box-shadow: 0px 0px 10px #999;
        }
        #textname{
            margin-top: 20px;
            font-size: 30px;
            text-transform: uppercase;
        }
        .textbold{
            color: black;
        }
    </style>
</head>

<body>

     <!-- bradcam_area  -->
     <div class="bradcam_area bradcam_bg_4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Testimonial</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->


    <div class="container mb-5 mt-5">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10" id="profilecard" style="background-color: white;">
          <div class="row">
            <div class="col-1">
              
            </div>
            <div class="col-6 mt-4">
              <h2>Testimonials</h2>
            </div>
          </div>
          <hr>
        <div class="row">
          <!-- <h2>My Feedback</h2> -->
          <?php 
            $selectmyfeedback="select * from Feedback f,Customer c where c.customerid=f.customerid";
            $runselectmyfeedback=mysqli_query($connection,$selectmyfeedback);
            $countofmyfeedback=mysqli_num_rows($runselectmyfeedback);
            if ($countofmyfeedback>0) {
              for ($i=0; $i <$countofmyfeedback ; $i++) { 
                $dataofmyfeedback=mysqli_fetch_array($runselectmyfeedback);
                $feedbackid=$dataofmyfeedback['feedbackid'];
                $feedback=$dataofmyfeedback['feedback'];
                $customername=$dataofmyfeedback['customername'];
                $customerprofile=$dataofmyfeedback['profile_img'];
                echo "<div class='col-md-6 mb-5' style='height: auto;'>";
                echo "<div class='row'>";
                echo "<div class='col-md-1'></div>";
                echo "<div class='col-md-2'>";
                echo "<img src='$customerprofile' class='feedback_img'>";
                echo "</div>";
                echo "<div class='col-md-8'>";
                echo "<h4><b style='color : black;'>$customername</b></h4><h5>$feedback</h5>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
              }
            }
           ?>
        </div>
        </div>
      </div>
    </div>


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
        <script>
            $('#datepicker').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                 rightIcon: '<span class="fa fa-caret-down"></span>'
             }
            });
            $('#datepicker2').datepicker({
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