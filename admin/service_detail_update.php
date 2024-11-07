<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['svid'])) {
		$serviceid=$_REQUEST['svid'];
		$selectservice="SELECT * FROM Service where serviceid='$serviceid'";
		$runselectservice=mysqli_query($connection,$selectservice);
		if ($runselectservice) {
			$data=mysqli_fetch_array($runselectservice);
			$serviceid=$data['serviceid'];
      $packageid=$data['packageid'];
			$hotelid=$data['hotelid'];
			$restaurantid=$data['restaurantid'];
		}
	}

	if (isset($_POST['btnservicedetailupdate'])) {
    $serviceid=$_POST['txtserviceid'];
		$packageid=$_POST['cbpackage'];
		$restaurantid=$_POST['cbrestaurant'];
		$hotelid=$_POST['cbhotel'];
		$updateservicedetail="UPDATE Service set packageid='$packageid',restaurantid='$restaurantid',hotelid='$hotelid' where serviceid='$serviceid'";
		$runupdateservicedetail=mysqli_query($connection,$updateservicedetail);
		if ($runupdateservicedetail) {
			echo "<script>window.alert('Service Detail Update Successfully')</script>";
			echo "<script>window.location='service_detail.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run update service detail query failed!')</script>";
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
              
              <center><h2 class="h4 text-black mb-3">Update To Service Detail!</h2></center>

              <input type="hidden" name="txtserviceid" value="<?php echo $serviceid ?>">

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black" for="stafftype">Choose Package</label>
                  <div class="row ml-1">
                    <?php 
                      $selectpackage="SELECT * FROM Package";
                      $runselectpackage=mysqli_query($connection,$selectpackage);
                      $countofpackage=mysqli_num_rows($runselectpackage);
                      if ($countofpackage>0) {
                        echo "<select class='col-8' name='cbpackage' required>";
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
                  <label class="text-black" for="stafftype">Choose Restaurant</label>
                  <div class="row ml-1">
                    <?php 
                      $selectrestaurant="SELECT * FROM Restaurant";
                      $runselectrestaurant=mysqli_query($connection,$selectrestaurant);
                      $countofrestaurant=mysqli_num_rows($runselectrestaurant);
                      if ($countofrestaurant>0) {
                        echo "<select class='col-12' name='cbrestaurant' required>";
                        for ($i=0; $i < $countofrestaurant; $i++) { 
                          $data=mysqli_fetch_array($runselectrestaurant);
                          $restaurantid=$data['restaurantid'];
                          $restaurantname=$data['restaurantname'];
                          $restaurantaddress=$data['address'];
                          echo "<option value='$restaurantid'>$restaurantname ($restaurantaddress)</option>";
                        }
                        echo "</select>";
                      }
                     ?>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black" for="stafftype">Choose Hotel</label>
                  <div class="row ml-1">
                    <?php 
                      $selecthotel="SELECT * FROM Hotel";
                      $runselecthotel=mysqli_query($connection,$selecthotel);
                      $countofhotel=mysqli_num_rows($runselecthotel);
                      if ($countofhotel>0) {
                        echo "<select class='col-12' name='cbhotel' required>";
                        for ($i=0; $i < $countofhotel; $i++) { 
                          $data=mysqli_fetch_array($runselecthotel);
                          $hotelid=$data['hotelid'];
                          $hotelname=$data['hotelname'];
                          $hoteladdress=$data['address'];
                          echo "<option value='$hotelid'>$hotelname ($hoteladdress)</option>";
                        }
                        echo "</select>";
                      }
                     ?>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="Update" class="button button-contactForm boxed-btn" name="btnservicedetailupdate">
                </div>
                <div class="col-md-1 col-3">
                	
                </div>
                <div class="col-md-4 col-3">
                	<a href="service_detail.php">
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