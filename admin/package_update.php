<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['pid'])) {
		$packageid=$_REQUEST['pid'];
		$selectpackage="SELECT * FROM Package where packageid='$packageid'";
		$runselectpackage=mysqli_query($connection,$selectpackage);
		if ($runselectpackage) {
			$data=mysqli_fetch_array($runselectpackage);
			$packageid=$data['packageid'];
			$packagename=$data['packagename'];
			$packageplaces=$data['places'];
      $packagedepartureplace=$data['departure_place'];
      $packagearrivalplace=$data['arrival_place'];
      $packageestimateduration=$data['estimated_duration'];
      $packageprice=$data['price'];
      $packageshortdescription=$data['short_description'];
      $packagedetaildescription=$data['detail_description'];
      $packagetypeid=$data['packagetypeid'];
		}
	}

	if (isset($_POST['btnpackageupdate'])) {
		$pid=$_POST['txtpackageid'];
		$pname=$_POST['txtpackagename'];
		$pplaces=$_POST['txtpackageplaces'];
    $pdeparture=$_POST['txtpackagedeparture'];
    $parrival=$_POST['txtpackagearrival'];
    $pduration=$_POST['txtpackageduration'];
    $pprice=$_POST['txtpackageprice'];
    $pshortdesp=$_POST['txtpackageshortdesp'];
    $pdetaildesp=$_POST['txtpackagedetaildesp'];
    $ppackagetypeid=$_POST['cbpackagetype'];

		$updatepackage="UPDATE Package set packagename='$pname',places='$pplaces',departure_place='$pdeparture',arrival_place='$parrival',estimated_duration='$pduration',price='pprice',short_description='$pshortdesp',detail_description='$pdetaildesp',packagetypeid='$ppackagetypeid' where packageid='$pid'";
		$runupdatepackage=mysqli_query($connection,$updatepackage);
		if ($runupdatepackage) {
			echo "<script>window.alert('Package Update Successfully')</script>";
			echo "<script>window.location='package.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run update package query failed!')</script>";
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

            <form action="" class="p-5 bg-white" method="post" action="">
              
              <center><h2 class="h4 text-black mb-3">Update To Package!</h2></center>

              <input type="hidden" name="txtpackageid" value="<?php echo $packageid ?>">
              
              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Package Name</label>
                  <input type="text" class="form-control" name="txtpackagename" value="<?php echo $packagename ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Places</label>
                  <input type="text" class="form-control" name="txtpackageplaces" value="<?php echo $packageplaces ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Departure Place</label>
                  <input type="text" class="form-control" name="txtpackagedeparture" value="<?php echo $packagedepartureplace ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Arrival Place</label>
                  <input type="text" class="form-control" name="txtpackagearrival" value="<?php echo $packagearrivalplace ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Estimated Duration</label>
                  <input type="text" class="form-control" name="txtpackageduration" value="<?php echo $packageestimateduration ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Price</label>
                  <input type="text" class="form-control" name="txtpackageprice" value="<?php echo $packageprice ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Short Description</label><br>
                  <textarea name="txtpackageshortdesp" class="col-12" rows="4"><?php echo $packageshortdescription; ?></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Detail Description</label><br>
                  <textarea name="txtpackagedetaildesp" class="col-12" rows="4"><?php echo $packagedetaildescription; ?></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black" for="stafftype">Package Type</label>
                  <div class="row ml-1">
                    <?php 
                      $selectpackagetype="SELECT * FROM PackageType";
                      $runselectpackagetype=mysqli_query($connection,$selectpackagetype);
                      $countofpackagetype=mysqli_num_rows($runselectpackagetype);
                      if ($countofpackagetype>0) {
                        echo "<select class='col-8' name='cbpackagetype' required>";
                        for ($i=0; $i < $countofpackagetype; $i++) { 
                          $data=mysqli_fetch_array($runselectpackagetype);
                          $packagetypeid=$data['packagetypeid'];
                          $packagetype=$data['packagetype'];
                          echo "<option value='$packagetypeid'>$packagetype</option>";
                        }
                        echo "</select>";
                      }
                     ?>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="Update" class="button button-contactForm boxed-btn" name="btnpackageupdate">
                </div>
                <div class="col-md-1 col-3">
                	
                </div>
                <div class="col-md-4 col-3">
                	<a href="package.php">
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