<?php 
 		include('../connect.php');
 		include('menu_main_admin.php');
    if (isset($_POST['btnaddpackage'])) {
      $packagename=$_POST['txtpackagename'];
      $packageplaces=$_POST['txtpackageplaces'];
      $packagedepature=$_POST['txtpackagedeparture'];
      $packagearrival=$_POST['txtpackagearrival'];
      $packageestimatedduration=$_POST['txtpackageduration'];
      $packageprice=$_POST['txtpackageprice'];
      $packageshortdesp=$_POST['txtpackageshortdesp'];
      $packagedetaildesp=$_POST['txtpackagedetaildesp'];
      $packagetypeid=$_POST['cbpackagetype'];
      //Image Upload
      $packageimg1=$_FILES['filepackageimg1']['name'];
      $folder1="image/";

      $filename1=$folder1.'_'.$packageimg1;
      $copied1=copy($_FILES['filepackageimg1']['tmp_name'], $filename1);
      if (!$copied1) {
        echo "<script>window.alert('Cannot Upload Image 1!')</script>";
        exit();
      }
      //
      //Image Upload
      $packageimg2=$_FILES['filepackageimg2']['name'];
      $folder2="image/";

      $filename2=$folder2.'_'.$packageimg2;
      $copied2=copy($_FILES['filepackageimg2']['tmp_name'], $filename2);
      if (!$copied2) {
        echo "<script>window.alert('Cannot Upload Image 2!')</script>";
        exit();
      }
      //
      //Image Upload
      $packageimg3=$_FILES['filepackageimg3']['name'];
      $folder3="image/";

      $filename3=$folder3.'_'.$packageimg3;
      $copied3=copy($_FILES['filepackageimg3']['tmp_name'], $filename3);
      if (!$copied3) {
        echo "<script>window.alert('Cannot Upload Image 3!')</script>";
        exit();
      }
      //


    // $selectpackagetype="SELECT * from PackageType where packagetype='$packagetype'";
    // $runselectpackagetype=mysqli_query($connection,$selectpackagetype);
    // $countofpackagetype=mysqli_num_rows($runselectpackagetype);
    // if ($countofpackagetype>0) {
    //   echo "<script>window.alert('Package Type Is Already Existed!')</script>";
    //   echo "<script>window.location='package_type.php'</script>";
    // }else{
        $insertpackage="INSERT into Package(packagename,places,departure_place,arrival_place,estimated_duration,price,short_description,detail_description,package_img1,package_img2,package_img3,packagetypeid) values
        ('$packagename','$packageplaces','$packagedepature','$packagearrival','$packageestimatedduration','$packageprice','$packageshortdesp','$packagedetaildesp','$filename1','$filename2','$filename3','$packagetypeid')";
        $runinsertpackage=mysqli_query($connection,$insertpackage);
        if ($runinsertpackage) {
          echo "<script>window.alert('A new package information is added! Insert Query Successful!')</script>";
          echo "<script>window.location='package.php'</script>";
        }else{
          echo mysqli_error($connection);
          echo "<script>window.alert('Run insert package query failed!')</script>";
        }
    // }
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
</head>
<body>
    <!-- header section -->
     <div class="bradcam_area bradcam_bg_4">
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

            <form action="" class="p-5 bg-white" method="post" enctype="multipart/form-data">
              
              <center><h2 class="h4 text-black mb-3">Add New Package!</h2></center>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Package Name</label>
                  <input type="text" class="form-control" name="txtpackagename" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Places</label>
                  <input type="text" class="form-control" name="txtpackageplaces" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Departure Place</label>
                  <input type="text" class="form-control" name="txtpackagedeparture" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Arrival Place</label>
                  <input type="text" class="form-control" name="txtpackagearrival" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Estimated Duration</label>
                  <input type="text" class="form-control" name="txtpackageduration" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Price</label>
                  <input type="text" class="form-control" name="txtpackageprice" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Short Description</label><br>
                  <textarea name="txtpackageshortdesp" class="col-12" rows="4"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Detail Description</label><br>
                  <textarea name="txtpackagedetaildesp" class="col-12" rows="4"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Image 1</label>
                  <input type="file" class="form-control" name="filepackageimg1" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Image 2</label>
                  <input type="file" class="form-control" name="filepackageimg2" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Image 3</label>
                  <input type="file" class="form-control" name="filepackageimg3" required>
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
                  <input type="submit" value="Insert" class="button button-contactForm boxed-btn" name="btnaddpackage">
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