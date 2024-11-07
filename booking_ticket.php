<?php 
    session_start();
	include('connect.php');
    include('autoid.php');
	include('menu_main_customer.php');

    //get signed in customer
    if(isset($_SESSION['cid'])){
        $customerid=$_SESSION['cid'];
    }else{
        echo "<script>window.alert('Please Login Customer Account Firstly!');</script>";
        echo "<script>window.location='index.php';</script>";
    }

	if (isset($_REQUEST['cvtid'])) {
		$selectedticketid=$_REQUEST['cvtid'];
	}else{
	  echo "<script>window.alert('Please choose your customized ticket for booking.');</script>";
      echo "<script>window.location='customer_view_ticket.php';</script>";
	}

    $unitprice="";
    $totalprice="";
    if (isset($_POST['btnnextbookingticket'])) {
        $bookingticketid=$_POST['txtbookingticketid'];
        $bookingticketamount=$_POST['txtbookingticketamountofticket'];

        $selectticketnext="select * from Ticket where ticketid=$selectedticketid";
                      $runselectticketnext=mysqli_query($connection,$selectticketnext);
                      $dataofticketnext=mysqli_fetch_array($runselectticketnext);
        
        if ($bookingticketamount>$dataofticketnext['quantity']) {
            echo "<script>window.alert('Not enough ticket amount!.');</script>";
        }else{
            $unitprice=$dataofticketnext['price'];
            $totalprice=$unitprice*$bookingticketamount;
            echo "<script>window.location='#form2_booking_schedule';</script>";

            $_SESSION['bookingticketid']=$bookingticketid;
            $_SESSION['bookingticketamount']=$bookingticketamount;
        }
    }

    if (isset($_POST['btndonebookingticket'])) {
        $f2bookingticketid=$_SESSION['bookingticketid'];
        $f2bookingticketamount=$_SESSION['bookingticketamount'];

        $bookingticketunitprice=$_POST['txtbookingticketunitprice'];
        $bookingtickettotalprice=$_POST['txtbookingtickettotalprice'];
        $bookingticketpaymenttype=$_POST['cbbookingticketpaymenttype'];


        if ($bookingticketpaymenttype!="0") {
          $insertbookingticket="insert into BookingTicket values('$f2bookingticketid',$customerid,'$selectedticketid','$f2bookingticketamount','$bookingticketunitprice','$bookingticketpaymenttype','$bookingtickettotalprice')";
          $runinsertbookingticket=mysqli_query($connection,$insertbookingticket);
          if ($runinsertbookingticket) {
              $selectticketdone="select * from Ticket where ticketid=$selectedticketid";
                        $runselectticketdone=mysqli_query($connection,$selectticketdone);
                        $dataofticketdone=mysqli_fetch_array($runselectticketdone);
              $numberofmaxticket=$dataofticketdone['quantity'];
              $newmaxticket=$numberofmaxticket-$f2bookingticketamount;

              $updateticket="update Ticket set quantity='$newmaxticket' where ticketid=$selectedticketid";
              $runupdateticket=mysqli_query($connection,$updateticket);
              if ($runupdateticket) {
                  # code...
              }else{
                  echo "<script>window.alert('Cannot change quantity of ticket');</script>";
              }

              echo "<script>window.alert('You have successfully booked to this ticket!');</script>";
              echo "<script>window.location='customer_view_ticket.php';</script>";
          }else{
              echo "<script>window.alert('Failed booking ticket query!');</script>";
              echo "<script>window.location='booking_ticket.php';</script>";
          }
        }else{
          echo "<script>window.alert('Please choose payment type');</script>";
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
        <!-- <?php 
            // echo "customerid : $customerid";
            // echo "<br>";
            // echo "ticketid : $selectedticketid";
         ?> -->
		<!-- header section -->
	     <div class="bradcam_area bradcam_bg_2">
	        <div class="container">
	            <div class="row">
	                <div class="col-xl-12">
	                    <div class="bradcam_text text-center">
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

<!-- ------------------------------------------------------------- -->

<section class="site-section bg-light bg-image">
        <br><br>
      <div class="container">
        <div class="row">
            <div class="col-md-3">
                
            </div>
          <div class="col-md-6 mb-0" data-aos="fade-up" data-aos-once="false">

            <form action="" class="p-5 bg-white" method="post" enctype="multipart/form-data">

              <center><h2 class="h4 text-black mb-3">Book Your Ticket!</h2></center>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Ticket Booking ID</label>
                  <input type="text" class="form-control" name="txtbookingticketid" value=
                    <?php 
                      echo AutoID('BookingTicket','bookingticketid','BT-',6);
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

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">To</label>
                  <input type="text" class="form-control" name="txtbookingschedulecustomerid" value=
                    '<?php 
                      // echo $customerid;
                      // echo "-";
                      $selectticket="select to_place from Ticket where ticketid=$selectedticketid";
                      $runselectticket=mysqli_query($connection,$selectticket);
                      $dataofticket=mysqli_fetch_array($runselectticket);
                      echo $dataofticket['to_place'];
                     ?>'
                   readonly required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Date and Time</label>
                  <input type="text" class="form-control" name="txtbookingschedulecustomerid" value=
                    '<?php 
                      // echo $customerid;
                      // echo "-";
                      $selectticket="select tripdate,triptime from Ticket where ticketid=$selectedticketid";
                      $runselectticket=mysqli_query($connection,$selectticket);
                      $dataofticket=mysqli_fetch_array($runselectticket);
                      echo $dataofticket['tripdate']." ( ".$dataofticket['triptime']." ) ";
                     ?>'
                   readonly required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Amount of Ticket</label>
                  <input type="number" class="form-control" name="txtbookingticketamountofticket" required>
                </div>
              </div>

              <div class="row form-group" id="form2_booking_schedule">
                <div class="col-md-4 col-3" >
                  <input type="submit" value="Next" class="button button-contactForm boxed-btn" name="btnnextbookingticket">
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
                  <label class="text-black">Unit Price</label>
                  <input type="text" class="form-control" name="txtbookingticketunitprice" value=
                    '<?php
                      if($unitprice==""){
                        
                      }else{
                        echo "$unitprice MMK";
                      }
                     ?>'
                   readonly required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Total Price</label>
                  <input type="text" class="form-control" name="txtbookingtickettotalprice" value=
                    '<?php
                      if($totalprice==""){
                        
                      }else{
                        echo "$totalprice MMK";
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
                      <select class='col-10' name='cbbookingticketpaymenttype' required>
                        <option value="0">Payment</option>
                        <option value="VISA">VISA</option>
                        <option value="Master Card">Master Card</option>
                        <option value="Paypal">Paypal</option>
                        <option value="Card">Credit/Debit Card</option>
                      </select>
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="DONE" class="button button-contactForm boxed-btn" name="btndonebookingticket">
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

<!-- --------------------------------------------------------------- -->

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