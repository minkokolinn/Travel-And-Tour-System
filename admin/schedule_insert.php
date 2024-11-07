<?php 
    session_start();
 		include('../connect.php');
 		include('menu_main_admin.php');

    if(isset($_SESSION['sid'])){
        $sid=$_SESSION['sid'];
    }else{
        echo "<script>window.alert('Please Login Staff Account Firstly!.');</script>";
        echo "<script>window.location='index.php';</script>";
    }

    if (isset($_POST['btnscheduleadd'])) {
      $packageid=$_POST['cbschedulepackage'];
      $staffid=$_SESSION['sid'];
      $departuredate=$_POST['txtscheduledepaturedate'];
      $departuretime=$_POST['txtscheduledeparturetime'];
      $duration=$_POST['txtscheduleduration'];
      $arrivaldate=$_POST['txtschedulearrivaldate'];
      $maxcharacter=$_POST['txtschedulemaxcharacter'];

        $insertschedule="INSERT into Schedule(packageid,staffid,departuredate,departuretime,duration,arrivaldate,maxcharacter) values
        ('$packageid','$staffid','$departuredate','$departuretime','$duration','$arrivaldate','$maxcharacter')";
        $runinsertschedule=mysqli_query($connection,$insertschedule);
        if ($runinsertschedule) {
          echo "<script>window.alert('A new schedule information is added! Insert Query Successful!')</script>";
          echo "<script>window.location='schedule.php'</script>";
        }else{
          echo mysqli_error($connection);
          echo "<script>window.alert('Run insert schedule query failed!')</script>";
        }
    }
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travelo</title>
    <link rel="stylesheet" type="text/css" href="mycss/cssforstaffreg.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <style type="text/css">
      .headerimg{
        background-image: url(../img/banner/bradcam5_restaurant.jpg);
      }
    </style>
</head>
<body>
    <!-- header section -->
     <div class="bradcam_area headerimg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <!-- <h3>Package Type</h3> -->
                        <!-- <p>Add new package Type</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->


    <!-- --------------content area------------------- -->
    <!-- ================ contact section start ================= -->
    <section class="site-section bg-light bg-image">
    	<br><br>
      <div class="container">
        <div class="row">
        	<div class="col-md-3">
        		
        	</div>
          <div class="col-md-6 mb-0" data-aos="fade-up" data-aos-once="false">

            <form action="" class="p-5 bg-white" method="post">
              
              <center><h2 class="h4 text-black mb-3">Make A Schedule!</h2></center>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black" for="stafftype">Choose Package</label>
                  <div class="row ml-1">
                    <?php 
                      $selectpackage="SELECT * FROM Package";
                      $runselectpackage=mysqli_query($connection,$selectpackage);
                      $countofpackage=mysqli_num_rows($runselectpackage);
                      if ($countofpackage>0) {
                        echo "<select class='col-8' name='cbschedulepackage' required>";
                        for ($i=0; $i < $countofpackage; $i++) { 
                          $data=mysqli_fetch_array($runselectpackage);
                          $packageid=$data['packageid'];
                          $packagename=$data['packagename'];
                          echo "<option value='$packageid'>$packagename</option>";
                        }
                        echo "</select>";
                      }
                     ?>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Departure Date</label>
                  <input type="date" class="form-control" name="txtscheduledepaturedate" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Departure Time</label>
                  <input type="text" class="form-control" name="txtscheduledeparturetime" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Duration</label>
                  <input type="text" class="form-control" name="txtscheduleduration" required>
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Arrival Date</label>
                  <input type="date" class="form-control" name="txtschedulearrivaldate" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Max Character</label>
                  <input type="number" class="form-control" name="txtschedulemaxcharacter" required>
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="Insert" class="button button-contactForm boxed-btn" name="btnscheduleadd">
                </div>
                <div class="col-md-1 col-3">
                	
                </div>
                <div class="col-md-4 col-3">
                  <input type="reset" value="Cancel" class="button button-contactForm boxed-btn">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <br><br>
    </section>
    <!-- ================ contact section end ================= -->
    
    <!-- --------------------------------------------- -->


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