<?php 
  session_start();
  unset($_SESSION['sid']);

	include('../connect.php');
	include('menu_inlogin_admin.php');
	if (isset($_POST['btnstafflogin'])) {
		$staffemail=$_POST['txtstaffemail'];
		$staffpass=$_POST['txtstaffpass'];
		$selectstaff="SELECT * from Staff where email='$staffemail' and password='$staffpass'";
		$runselectstaff=mysqli_query($connection,$selectstaff);
		$countofstaff=mysqli_num_rows($runselectstaff);
		if ($countofstaff==1) {
      $ret=mysqli_fetch_array($runselectstaff);
      $_SESSION['sid']=$ret['staffid'];

			echo "<script>window.alert('Staff (Admin Accuont) Login Successful')</script>";
			echo "<script>window.location='staff_home.php'</script>";
		}else{
			echo "<script>window.alert('Staff Account Login Failed! Try Again!')</script>";
		}
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Staff Login</title>
</head>
<body>
	<div class="bradcam_area bradcam_bg_3">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center">
                        <h3>Admin Panel</h3><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="site-section bg-light bg-image">
    	<br><br>
      <div class="container">
        <div class="row">
        	<div class="col-md-3">
        		
        	</div>
          <div class="col-md-6 mb-0" data-aos="fade-up" data-aos-once="false">

            <form action="" class="p-5 bg-white" method="post">
              
              <center><h2 class="h4 text-black mb-3">STAFF LOGIN FORM!</h2></center>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Email</label>
                  <input type="email" class="form-control" name="txtstaffemail" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Password</label>
                  <input type="password" class="form-control" name="txtstaffpass" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="Login" class="button button-contactForm boxed-btn" name="btnstafflogin">
                </div>
                <div class="col-md-1 col-3">
                	
                </div>
                <div class="col-md-4 col-3">
                  <input type="reset" value="Cancel" class="button button-contactForm boxed-btn">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-12">
                  <a href="staff_register.php"><p>Create a new staff account!</p></a>
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