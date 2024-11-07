<?php 
    include('../connect.php');
    include('menu_main_admin.php');
    
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
                        <h3>Schedule List</h3>
                        <!-- <p>Add new package Type</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <!-- ================ contact section end ================= -->
    <br><br>
  
    <div id="responsive_tbl" style="width: 90%; margin-left: 5%;"> 
      <div class="container">
      <div class="row">
        <div class="col-md-12 text-right">
            <a href="schedule_insert.php">
              <button type="button" class="btn btn-info">ADD NEW SCHEDULE</button>
            </a>
        </div>
      </div>
      </div>
      <br>

      <div style="overflow-x:auto;">
        <table>
          <tr>
            <th>Schedule ID</th>
            <th>Package ID</th>
            <th>Package Name</th>
            <th>Staff ID</th>
            <th>Staff Name</th>
            <th>Departure Date</th>
            <th>Departure Time</th>
            <th>Duration</th>
            <th>Arrival Date</th>
            <th>Max Character</th>
            <th>Actions</th>
          </tr>
          <?php 
                $selectschedule="Select * from Schedule s,Package p,Staff sf where s.packageid=p.packageid and s.staffid=sf.staffid";
                $runselectschedule=mysqli_query($connection,$selectschedule);
                $countofschedule=mysqli_num_rows($runselectschedule);
                if ($countofschedule>0) {
                  for ($i=0; $i <$countofschedule ; $i++) { 
                    $data=mysqli_fetch_array($runselectschedule);
                    $scheduleid=$data['scheduleid'];
                    $schedulepackageid=$data['packageid'];
                    $schedulepackagename=$data['packagename'];
                    $schedulestaffid=$data['staffid'];
                    $schedulestaffname=$data['staffname'];
                    $scheduledeparturedate=$data['departuredate'];
                    $scheduledeparturetime=$data['departuretime'];
                    $scheduleduration=$data['duration'];
                    $schedulearrivaldate=$data['arrivaldate'];
                    $schedulemaxcharacter=$data['maxcharacter'];

                    echo "<tr>
                      <td>$scheduleid</td>
                      <td>$schedulepackageid</td>
                      <td>$schedulepackagename</td>
                      <td>$schedulestaffid</td>
                      <td>$schedulestaffname</td>
                      <td>$scheduledeparturedate</td>
                      <td>$scheduledeparturetime</td>
                      <td>$scheduleduration</td>
                      <td>$schedulearrivaldate</td>
                      <td>$schedulemaxcharacter</td>
                      <td>
                      <a href='schedule_update.php?sid=$scheduleid'>Update</a> 
                      |
                      <a href='schedule_delete.php?sid=$scheduleid'>Delete</a> 
                      </td>
                    </tr>
                    ";
                  }
                }
            ?>
        </table>
      </div>
    </div>
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