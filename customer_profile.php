<?php 
	session_start();
    include('connect.php');
    include('menu_main_customer.php');

    if(isset($_SESSION['cid'])){
        $cid=$_SESSION['cid'];
        $selectcustomer="select * from Customer where customerid=$cid";
        $runselectcustomer=mysqli_query($connection,$selectcustomer);
        $countofcustomer=mysqli_num_rows($runselectcustomer);
        if ($countofcustomer==1) {
        	$dataofcustomer=mysqli_fetch_array($runselectcustomer);
        	$profileimg=$dataofcustomer['profile_img'];
        	$name=$dataofcustomer['customername'];
        	$phone=$dataofcustomer['phone'];
        	$email=$dataofcustomer['email'];
        	$password=$dataofcustomer['password'];
        	$dob=$dataofcustomer['dob'];
        	$nrc=$dataofcustomer['nrc'];
        	$gender=$dataofcustomer['gender'];
        	$address=$dataofcustomer['address'];
        }
    }else{
        echo "<script>window.alert('Please Login Customer Account Firstly!.');</script>";
        echo "<script>window.location='index.php';</script>";
    }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="mycss/profilecss.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
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

    <div class="container mb-5" style="margin-top: -300px;">
    	<div class="row">
    		<div class="col-md-1"></div>
    		<div class="col-md-10" id="profilecard" style="background-color: white;">
    		<div class="row">
    		<div class="col-md-6" style="height: 400px;">
    			<div class="row form-group mt-5">
                <div class="col-md-12 mb-3 mb-md-0">
                  <img src="<?php echo $profileimg; ?>" class="profileimgcss">
                </div>
	              </div>
	              <div class="row form-group">
               
              		</div>
              <center><h3 style="font-family: Arial Black;" class="text-black mb-5"><?php echo "$name" ?></h3></center>
              <div class="row form-group">
              	<div class="col-md-1 col-1"></div>
                <div class="col-md-4 col-4 mr-3">
                  <a href="customer_update.php?cusid=<?php echo $cid; ?>">
                  <input type="submit" value="UPDATE" class="button button-contactForm boxed-btn" name="btndonebookingschedule"></a>
                </div>
                <div class="col-md-4 col-4">
                  <a href="customer_home.php">
                  <input type="reset" value="BACK TO HOME" class="button button-contactForm boxed-btn"></a>
                </div>
              </div>
    		</div>
    		<div class="col-md-6" style="height: 400px;">
    			<div class="row form-group  mt-4">
                <div class="col-md-12 mb-0 mb-md-0">
                  <p class="text-black" for="phonebox">Name : <b class="textbold"><?php echo "$name"; ?><b></p>
                </div>
              </div>
    		<div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <p class="text-black" for="phonebox">Phone Number : <b class="textbold"><?php echo "$phone"; ?><b></p>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <p class="text-black" for="emailbox">Email : <b class="textbold"><?php echo "$email"; ?></b></p>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <p class="text-black" for="passwordbox">Password : <b class="textbold"><?php echo "$password"; ?></b></p>
                </div>
              </div>              

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <p class="text-black" for="dobbox">Date Of Birth : <b class="textbold"><?php echo "$dob"; ?></b></p>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <p class="text-black" for="genderbox">NRC : <b class="textbold"><?php echo "$nrc"; ?></b></p>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <p class="text-black" for="addressbox">Gender : <b class="textbold"><?php echo "$gender"; ?></b></p>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <p class="text-black" for="codebox">Address : <b class="textbold"><?php echo "$address"; ?></b></p>
                </div>
              </div>
    		</div>
    		</div>
    		</div>
    	</div>
    </div>

    <div class="container mb-5">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10" id="profilecard" style="background-color: white;">
          <div class="row">
            <div class="col-1">
              
            </div>
            <div class="col-6 mt-4">
              <h2>My Feedbacks</h2>
            </div>
          </div>
          <hr>
        <div class="row">
          <!-- <h2>My Feedback</h2> -->
          <?php 
            $selectmyfeedback="select * from Feedback where customerid=$cid";
            $runselectmyfeedback=mysqli_query($connection,$selectmyfeedback);
            $countofmyfeedback=mysqli_num_rows($runselectmyfeedback);
            if ($countofmyfeedback>0) {
              for ($i=0; $i <$countofmyfeedback ; $i++) { 
                $dataofmyfeedback=mysqli_fetch_array($runselectmyfeedback);
                $feedbackid=$dataofmyfeedback['feedbackid'];
                $feedback=$dataofmyfeedback['feedback'];
                echo "<div class='col-md-6 mb-5' style='height: auto;'>";
                echo "<div class='row'>";
                echo "<div class='col-md-1'></div>";
                echo "<div class='col-md-2'>";
                echo "<img src='$profileimg' class='feedback_img'>";
                echo "</div>";
                echo "<div class='col-md-8'>";
                echo "<h4><b style='color : black;'>$name</b></h4><h5>$feedback</h5><u><a href='customer_feedback_delete.php?fid=$feedbackid'>Remove</a></u>";
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