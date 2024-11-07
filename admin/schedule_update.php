<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['sid'])) {
		$scheduleid=$_REQUEST['sid'];
		$selectschedule="SELECT * FROM Schedule where scheduleid='$scheduleid'";
		$runselectschedule=mysqli_query($connection,$selectschedule);
		if ($runselectschedule) {
			$data=mysqli_fetch_array($runselectschedule);
			$scheduleid=$data['scheduleid'];
			$schedulepackageid=$data['packageid'];
			$schedulestaffid=$data['staffid'];
      $scheduledeparturedate=$data['departuredate'];
      $scheduledeparturetime=$data['departuretime'];
      $scheduleduration=$data['duration'];
      $schedulearrivaldate=$data['arrivaldate'];
      $schedulemaxcharacter=$data['maxcharacter'];
		}
	}

	if (isset($_POST['btnscheduleupdate'])) {
    $sid=$_POST['txtscheduleid'];
		$spackageid=$_POST['cbschedulepackage'];
    $sdeparturedate=$_POST['txtscheduledepaturedate'];
    $sdeparturetime=$_POST['txtscheduledeparturetime'];
    $sduration=$_POST['txtscheduleduration'];
    $sarrivaldate=$_POST['txtschedulearrivaldate'];
    $smaxcharacter=$_POST['txtschedulemaxcharacter'];
    
		$updateschedule="UPDATE Schedule set packageid='$spackageid',departuredate='$sdeparturedate',departuretime='$sdeparturetime',duration='$sduration',arrivaldate='$sarrivaldate',maxcharacter='$smaxcharacter' where scheduleid='$sid'";
		$runupdateschedule=mysqli_query($connection,$updateschedule);
		if ($runupdateschedule) {
			echo "<script>window.alert('Schedule Update Successfully')</script>";
			echo "<script>window.location='schedule.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run update schedule type query failed!')</script>";
		}
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<section class="site-section bg-light bg-image">
    	<br><br>
      <div class="container">
        <div class="row">
        	<div class="col-md-3">
        		
        	</div>
          <div class="col-md-6 mb-0" data-aos="fade-up" data-aos-once="false">

            <form action="" class="p-5 bg-white" method="post" action="package_type_update.php">
              
              <center><h2 class="h4 text-black mb-3">Update To Schedule!</h2></center>

              <input type="hidden" name="txtscheduleid" value="<?php echo $scheduleid ?>">
              
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
                  <input type="date" class="form-control" name="txtscheduledepaturedate" value="<?php echo $scheduledeparturedate ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Departure Time</label>
                  <input type="text" class="form-control" name="txtscheduledeparturetime" value="<?php echo $scheduledeparturetime ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Duration</label>
                  <input type="text" class="form-control" name="txtscheduleduration" value="<?php echo $scheduleduration ?>" required>
                </div>
              </div>


              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Arrival Date</label>
                  <input type="date" class="form-control" name="txtschedulearrivaldate" value="<?php echo $schedulearrivaldate ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Max Character</label>
                  <input type="number" class="form-control" name="txtschedulemaxcharacter" value="<?php echo $schedulemaxcharacter ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="Update" class="button button-contactForm boxed-btn" name="btnscheduleupdate">
                </div>
                <div class="col-md-1 col-3">
                	
                </div>
                <div class="col-md-4 col-3">
                	<a href="schedule.php">
              			<button type="button" class="button button-contactForm boxed-btn">Back</button>
            		</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <br><br>
    </section>

    
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