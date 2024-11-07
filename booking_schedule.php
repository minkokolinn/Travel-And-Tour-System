<?php 
    session_start();
 		include('connect.php');
 		include('menu_main_customer.php');
    include('autoid.php');

    //get today date
    $tdy=date("Y-m-d");
    $tdy1=date("m-d");

    //get signed in customer
    if(isset($_SESSION['cid'])){
        $customerid=$_SESSION['cid'];
    }else{
        echo "<script>window.alert('Please Login Customer Account Firstly!');</script>";
        echo "<script>window.location='index.php';</script>";
    }

    //get choosen package
    if (isset($_REQUEST['pidfromdetail'])) {
      $choosenpackageid=$_REQUEST['pidfromdetail'];
    }else{
      echo "<script>window.alert('Please Choose Package Firstly!.');</script>";
      echo "<script>window.location='customer_package.php';</script>";
    }


    
    $promotionname="";
    $unitprice=0;
    $totalprice=0;
    $taxrange=1/100;
    $tax=0;
    $discount=0;
    $amounttobepaid=0;
    $paid=false;
    $bookingschedulescheduleid=0;

    if (isset($_POST['btnnextbookingschedule'])) {
      $bookingscheduleid=$_POST['txtbookingscheduleid'];
      $_SESSION['f2bookingscheduleid']=$bookingscheduleid;
      $bookingschedulecustomerid=$_POST['txtbookingschedulecustomerid'];
      $_SESSION['f2bookingschedulecustomerid']=$customerid;
      $bookingschedulescheduleid=$_POST['cbbookingschedulescheduleid'];
      $_SESSION['f2bookingschedulescheduleid']=$bookingschedulescheduleid;
      $bookingschedulecharacter=$_POST['txtbookingschedulecharacter'];    
      $_SESSION['f2bookingschedulecharacter']=$bookingschedulecharacter;

      if ($bookingschedulescheduleid!=0) {
        //calculating for promotion
        $oct_start = "10-01";
         $oct_end = "10-31";
        $dec_start="12-29";
        $dec_end="01-03";
        if ($tdy1>$oct_start && $tdy1<$oct_end) {
            $promotionid=1;
        }else if($tdy1>$dec_start){
             $promotionid=3;
        }else if($bookingschedulecharacter>6){
             $promotionid=2;
        }else{
            $promotionid=4;
        }
        $promotiondiscountpercentage="";
        if ($promotionid!=4) {
              $selectpromotion="select * from Promotion where promotionid=$promotionid";
             $runselectpromotion=mysqli_query($connection,$selectpromotion);
             $dataofpromotion=mysqli_fetch_array($runselectpromotion);
            $promotionname=$dataofpromotion['promotionname'];
            $promotiondiscountpercentage=$dataofpromotion['discountpercentage'];
        }

        $_SESSION['f2promotionid']=$promotionid;

        echo "<script>window.location='#form2_booking_schedule';</script>";

        //for unit price
        $selectpackageandschedule="select * from Package p,Schedule s where p.packageid=s.packageid and s.scheduleid=$bookingschedulescheduleid";
        $runselectpackageandschedule=mysqli_query($connection,$selectpackageandschedule);
        $countofpackageandschedule=mysqli_num_rows($runselectpackageandschedule);
        if ($countofpackageandschedule==1) { 
          $dataofpackageandschedule=mysqli_fetch_array($runselectpackageandschedule);
          $unitprice=$dataofpackageandschedule['price'];
          $totalprice=$unitprice*$bookingschedulecharacter;
          $tax=$totalprice*$taxrange;
          $amounttobepaid=$totalprice+$tax;
          if ($promotiondiscountpercentage!="") {
            $discount=$amounttobepaid*($promotiondiscountpercentage/100);
            $amounttobepaid=$amounttobepaid-$discount;
          }
        }
      }else{
        echo "<script>window.alert('Please choose schedule to continue the process!.');</script>";
      }
    }

    //for form2
    if (isset($_POST['btndonebookingschedule'])) {

        $bookingschedulepaymenttype=$_POST['cbbookingschedulepaymenttype'];

        if ($bookingschedulepaymenttype=="0") {
          echo "<script>window.alert('Please choose payment type!');</script>"; 
        }else{
           if ($bookingschedulepaymenttype=="Cash") {
             $paid=false;
           }else{
             $paid=true;
           }
           $f2bookingscheduleid=$_SESSION['f2bookingscheduleid'];
           $f2bookingschedulecustomerid=$_SESSION['f2bookingschedulecustomerid'];
           $f2bookingschedulescheduleid=$_SESSION['f2bookingschedulescheduleid'];
           $f2bookingschedulecharacter=$_SESSION['f2bookingschedulecharacter'];
           $f2promotionid=$_SESSION['f2promotionid'];
           $f2unitprice=$_POST['txtbookingscheduleunitprice'];
           $f2totalprice=$_POST['txtbookingscheduletotalprice'];
           $f2tax=$_POST['txtbookingscheduletax'];
           $f2amounttobepaid=$_POST['txtbookingscheduleamounttobepaid'];

           $selectscheduleforupdate="select * from Schedule where scheduleid=$f2bookingschedulescheduleid";
           $runselectscheduleforupdate=mysqli_query($connection,$selectscheduleforupdate);
           $countofscheduleforupdate=mysqli_num_rows($runselectscheduleforupdate);
           if ($countofscheduleforupdate>0) {
             $dataofscheduleforupdate=mysqli_fetch_array($runselectscheduleforupdate);
             $maxcharacter=$dataofscheduleforupdate['maxcharacter'];           

             if ($f2bookingschedulecharacter<=$maxcharacter) {
              //insert into booking schedule
               $insertbookingschedule="INSERT into BookingSchedule values('$f2bookingscheduleid','$f2bookingschedulecustomerid','$f2bookingschedulescheduleid','$f2bookingschedulecharacter','$f2promotionid','$bookingschedulepaymenttype','$f2unitprice','$f2totalprice','$f2tax','$f2amounttobepaid','$paid')";
               $runinsertbookingschedule=mysqli_query($connection,$insertbookingschedule);
               if ($runinsertbookingschedule) {
                  $restcharacter=$maxcharacter-$f2bookingschedulecharacter;
                   $updateschedule="update Schedule set maxcharacter='$restcharacter' where scheduleid=$f2bookingschedulescheduleid";
                   $runupdateschedule=mysqli_query($connection,$updateschedule);
                   if ($runupdateschedule) {
                     echo "<script>window.alert('You booked the package schedule successfully!');</script>"; 
                    echo "<script>window.location='customer_package.php'</script>";
                   }else{
                    echo "<script>window.alert('Cannot update the new max characters!');</script>";
                   }
               }else{
                echo "<script>window.alert('Booking schedule fail!');</script>"; 
                echo mysqli_error($connection);
               }   
             }else{
              echo "<script>window.alert('Booking not available! Not enought characters');</script>";  
             }
           }
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

              <center><h2 class="h4 text-black mb-3">Book Your Package Schedule!</h2></center>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Booking ID</label>
                  <input type="text" class="form-control" name="txtbookingscheduleid" value=
                    <?php 
                      echo AutoID('BookingSchedule','bookingscheduleid','BS-',6);
                     ?>
                   readonly required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Customer</label>
                  <input type="text" class="form-control" name="txtbookingschedulecustomerid" value=
                    '<?php 
                      // echo $customerid;
                      // echo "-";
                      $selectcustomer="select customername from Customer where customerid=$customerid";
                      $runselectcustomer=mysqli_query($connection,$selectcustomer);
                      $dataofcustomer=mysqli_fetch_array($runselectcustomer);
                      echo $dataofcustomer['customername'];
                     ?>'
                   readonly required>
                </div>
              </div>

              <!-- no need to save in database -->
              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Package</label>
                  <input type="text" class="form-control" value=
                    '<?php 
                      // echo $customerid;
                      // echo "-";
                      $selectpackageintxt="select * from Package where packageid=$choosenpackageid";
                      $runselectpackage=mysqli_query($connection,$selectpackageintxt);
                      $dataofpackage=mysqli_fetch_array($runselectpackage);
                      echo $dataofpackage['packagename'];
                     ?>'
                   readonly required>
                </div>
              </div>
              <!-- ---------------------------------- -->

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black" for="stafftype">Choose Schedule</label>
                  <div class="row ml-1">
                    <?php 
                      $selectschedule="SELECT * FROM Schedule where packageid=$choosenpackageid";
                      $runselectschedule=mysqli_query($connection,$selectschedule);
                      $countofschedule=mysqli_num_rows($runselectschedule);
                      echo "<select class='col-10' name='cbbookingschedulescheduleid' required>";
                      echo "<option value='0'>Departure Date (Departure Time) > Arrival Date</option>";
                      if ($countofschedule>0) {
                        for ($i=0; $i < $countofschedule; $i++) { 
                          $data=mysqli_fetch_array($runselectschedule);
                          $scheduleid=$data['scheduleid'];
                          $scheduledeparturedate=$data['departuredate'];
                          $scheduledeparturetime=$data['departuretime'];
                          $schedulearrivaldate=$data['arrivaldate'];

                          //check for schedule after now
                          if ($scheduledeparturedate>$tdy) {
                            echo "<option value='$scheduleid'>$scheduledeparturedate ($scheduledeparturetime) > $schedulearrivaldate</option>";
                          }
                        }
                      }
                      echo "</select>";
                     ?>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Character</label>
                  <input type="number" class="form-control" name="txtbookingschedulecharacter" required>
                </div>
              </div>

              <div class="row form-group" id="form2_booking_schedule">
                <div class="col-md-4 col-3">
                  <input type="submit" value="Next" class="button button-contactForm boxed-btn" name="btnnextbookingschedule">
                </div>
                <!-- <div class="col-md-1 col-3">
                	
                </div>
                <div class="col-md-4 col-3">
                  <input type="reset" value="Cancel" class="button button-contactForm boxed-btn">
                </div> -->
              </div>
            </form>

            <hr>
            <!-- -------------------- -->

            <form action="" class="p-5 bg-white" method="post" >

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Promotion</label>
                  <input type="text" class="form-control" name="txtbookingschedulepromotion" value=
                    '<?php
                      if($promotionname==""){
                        echo "No Promotion is selected!";
                      }else{
                        echo "$promotionname";
                      }
                     ?>'
                   readonly required>
                </div>
              </div>

              <!-- no need to save in database -->
              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Choose Payment Type</label>
                  <div class="row ml-1">
                      <select class='col-10' name='cbbookingschedulepaymenttype' required>
                        <option value="0">Payment</option>
                        <option value="Cash">Cash</option>
                        <option value="VISA">VISA</option>
                        <option value="Master Card">Master Card</option>
                        <option value="Paypal">Paypal</option>
                        <option value="Card">Credit/Debit Card</option>
                      </select>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Unit Price</label>
                  <input type="text" class="form-control" value=
                    '<?php
                      if($unitprice==0){
                        
                      }else{
                        echo "$unitprice MMK";
                      }
                     ?>'
                   name='txtbookingscheduleunitprice' readonly required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Total Price</label>
                  <input type="text" class="form-control" value=
                    '<?php
                      if($totalprice==0){
                        
                      }else{
                        echo "$totalprice MMK (for $bookingschedulecharacter characters)";
                      }
                     ?>'
                   name='txtbookingscheduletotalprice' readonly required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Tax</label>
                  <input type="text" class="form-control" value=
                    '<?php
                      if($tax==0){
                        
                      }else{
                        echo "+$tax MMK";
                      }
                     ?>'
                   name='txtbookingscheduletax' readonly required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Promotion (Discount cash back)</label>
                  <input type="text" class="form-control" value=
                    '<?php
                      if($discount!=0){
                        echo "$discount MMK ($promotionname $promotiondiscountpercentage %)";
                      }
                     ?>'
                   readonly required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Amount to be paid</label>
                  <input type="text" class="form-control" value=
                    '<?php
                      if($amounttobepaid==0){
                        
                      }else{
                        echo "$amounttobepaid MMK";
                      }
                     ?>'
                   name='txtbookingscheduleamounttobepaid' readonly required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="DONE" class="button button-contactForm boxed-btn" name="btndonebookingschedule">
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