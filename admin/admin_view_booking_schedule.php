<?php 
    include('../connect.php');
    include('menu_main_admin.php');

    // $selectpackages="select * from Package";
    // $runselectpackages=mysqli_query($connection,$selectpackages);
    $searchdeparturedate="";
    $searchpackagename="";
    
    if (isset($_POST['btnsearchbookingschedule'])) {
      $searchdeparturedate=$_POST['txtsearchdeparturedate'];
      $searchpackagename=$_POST['cbsearchpackagename'];
    }
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travelo</title>
    <link rel="stylesheet" type="text/css" href="mycss/cssforstaffreg.css">
    <link rel="stylesheet" type="text/css" href="../css/for_responsive_table.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>
<body>
    <!-- header section -->
     <div class="bradcam_area bradcam_bg_4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Booking List For Schedule Booking</h3>
                        <!-- <p>Add new package Type</p> -->
                    </div>
                </div>
            </div>
        </div>
        <div id="show_all_booking"></div>
    </div>
    <!-- slider_area_end -->
    <!-- ================ contact section end ================= -->
    <br><br>
  
  <form method="post" action="#show_all_booking">
    <div id="responsive_tbl" style="width: 97%; margin-left: 1.5%"> 
      <br>

      <div style="overflow-x:auto;">
        <table>
          <tr>
            <th>Booking Schedule ID</th>
            <th>Customer Name</th>
            <th>Package Name</th>
            <th>Departure Date</th>
            <th>Departure Time</th>
            <th>Arrival Date</th>
            <th>Character</th>
            <th>Promotion</th>
            <th>Payment type</th>
            <th>Unit Price</th>
            <th>Total Price</th>
            <th>Tax</th>
            <th>Amount To be paid</th>
            <th>Paid</th>
            <th>Actions</th>
          </tr>
          <?php 
              $selectbookingschedule="Select * from BookingSchedule bs,Customer c,Package p,Schedule s,Promotion pmt where bs.customerid=c.customerid and s.packageid=p.packageid and bs.scheduleid=s.scheduleid and bs.promotionid=pmt.promotionid";
                $runselectbookingschedule=mysqli_query($connection,$selectbookingschedule);
                $countofbookingschedule=mysqli_num_rows($runselectbookingschedule);
                if ($countofbookingschedule>0) {
                  for ($i=0; $i <$countofbookingschedule ; $i++) { 
                    $data=mysqli_fetch_array($runselectbookingschedule);
                    $avbs_bookingscheduleid=$data['bookingscheduleid'];
                    $avbs_customername=$data['customername'];
                    $avbs_packagename=$data['packagename'];
                    $avbs_departuredate=$data['departuredate'];
                    $avbs_departuretime=$data['departuretime'];
                    $avbs_arrivaldate=$data['arrivaldate'];
                    $avbs_charactertogo=$data['charactertogo'];
                    $avbs_promotionname=$data['promotionname'];
                    $avbs_paymenttype=$data['paymenttype'];
                    $avbs_unitprice=$data['unitprice'];
                    $avbs_totalprice=$data['totalprice'];
                    $avbs_tax=$data['tax'];
                    $avbs_amounttobepaid=$data['amounttobepaid'];
                    if ($data['paid']=="1") {
                      $avbs_paid="paid";
                    }else{
                      $avbs_paid="not paid";
                    }
                    echo "<tr>
                      <td>$avbs_bookingscheduleid</td>
                      <td>$avbs_customername</td>
                      <td>$avbs_packagename</td>
                      <td>$avbs_departuredate</td>
                      <td>$avbs_departuretime</td>
                      <td>$avbs_arrivaldate</td>
                      <td>$avbs_charactertogo</td>
                      <td>$avbs_promotionname</td>
                      <td>$avbs_paymenttype</td>
                      <td>$avbs_unitprice</td>
                      <td>$avbs_totalprice</td>
                      <td>$avbs_tax</td>
                      <td>$avbs_amounttobepaid</td>
                      <td>$avbs_paid</td>
                      <td>
                        <a href='admin_delete_booking_schedule.php?avbsbookingscheduleid=$avbs_bookingscheduleid'>Delete</a> 
                      </td>
                    </tr>
                    ";
                  }
                }
            ?>
        </table>
      </div>
    </div>
  </form>
    <br><br>
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