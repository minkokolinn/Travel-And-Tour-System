<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['tgdid'])) {
		$travelguidedetailid=$_REQUEST['tgdid'];
		$selecttravelguidedetail="SELECT * FROM TravelGuideDetail where tgdid='$travelguidedetailid'";
		$runselecttravelguidedetail=mysqli_query($connection,$selecttravelguidedetail);
		if ($runselecttravelguidedetail) {
			$data=mysqli_fetch_array($runselecttravelguidedetail);
			$travelguidedetailid2=$data['tgdid'];
			$travelguidedetailscheduleid=$data['scheduleid'];
			$travelguidedetailtravelguideid=$data['travelguideid'];
		}
	}

	if (isset($_POST['btntravelguidedetailupdate'])) {
		$tgdid=$_POST['txttravelguidedetailid'];
		$tgdschedulid=$_POST['cbtgdschedule'];
		$tgdtravelguideid=$_POST['cbstgdtravelguide'];
		$updatetravelguidedetail="UPDATE TravelGuideDetail set scheduleid='$tgdschedulid',travelguideid='$tgdtravelguideid' where tgdid='$tgdid'";
		$runupdatetravelguidedetail=mysqli_query($connection,$updatetravelguidedetail);
		if ($runupdatetravelguidedetail) {
			echo "<script>window.alert('Travel Guide Detail Update Successfully')</script>";
			echo "<script>window.location='travel_guide_manage.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run update travel guide detail query failed!')</script>";
		}
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
      <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
 	<title></title>
      <link rel="stylesheet" type="text/css" href="mycss/cssforstaffreg.css">
 </head>
 <body>
 	<section class="site-section bg-light bg-image">
    	<br><br>
      <div class="container">
        <div class="row">
        	<div class="col-md-3">
        		
        	</div>
          <div class="col-md-6 mb-0" data-aos="fade-up" data-aos-once="false">

            <form action="" class="p-5 bg-white" method="post" action="">
              
              <center><h2 class="h4 text-black mb-3">Update To Travel Guide Detail!</h2></center>

              <input type="hidden" name="txttravelguidedetailid" value="<?php echo $travelguidedetailid2 ?>">

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black" for="stafftype">Choose Schedule</label>
                  <div class="row ml-1">
                    <?php 
                      $selectschedule="SELECT * FROM Schedule";
                      $runselectschedule=mysqli_query($connection,$selectschedule);
                      $countofschedule=mysqli_num_rows($runselectschedule);
                      if ($countofschedule>0) {
                        echo "<select class='col-4' name='cbtgdschedule' required>";
                        for ($i=0; $i < $countofschedule; $i++) { 
                          $data=mysqli_fetch_array($runselectschedule);
                          $scheduleid=$data['scheduleid'];
                          echo "<option value='$scheduleid'>$scheduleid</option>";
                        }
                        echo "</select>";
                      }
                     ?>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black" for="stafftype">Choose Travel Guide</label>
                  <div class="row ml-1">
                    <?php 
                      $selecttravelguide="SELECT * FROM TravelGuide";
                      $runselecttravelguide=mysqli_query($connection,$selecttravelguide);
                      $countoftravelguide=mysqli_num_rows($runselecttravelguide);
                      if ($countoftravelguide>0) {
                        echo "<select class='col-8' name='cbstgdtravelguide' required>";
                        for ($i=0; $i < $countoftravelguide; $i++) { 
                          $data=mysqli_fetch_array($runselecttravelguide);
                          $travelguideid=$data['travelguideid'];
                          $travelguidename=$data['travelguidename'];
                          echo "<option value='$travelguideid'>$travelguidename</option>";
                        }
                        echo "</select>";
                      }
                     ?>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="Update" class="button button-contactForm boxed-btn" name="btntravelguidedetailupdate">
                </div>
                <div class="col-md-1 col-3">
                	
                </div>
                <div class="col-md-4 col-3">
                	<a href="travel_guide_manage.php">
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