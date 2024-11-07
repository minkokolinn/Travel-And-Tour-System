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
    <style type="text/css">
      .headerimg{
        background-image: url(../img/banner/bradcam5_restaurant.jpg);
      }
    </style>
</head>
<body>
    <!-- header section -->
     <div class="bradcam_area headerimg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Schedule With Travel Guide</h3>
                        <!-- <p>Add new package Type</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <!-- ================ contact section end ================= -->
    <br><br>
  
    <div id="responsive_tbl" style="width: 70%; margin-left: 15%;"> 
      <div class="container">
      <div class="row">
        <div class="col-md-12 text-right">
            <a href="travel_guide_manage_insert.php">
              <button type="button" class="btn btn-info">MANAGE FOR TRAVEL GUIDE</button>
            </a>
        </div>
      </div>
      </div>
      <br>

      <div style="overflow-x:auto;">
        <table>
          <tr>
            <th>TravelGuide Detail ID</th>
            <th>Schedule ID</th>
            <th>Departure</th>
            <th>Arrival</th>
            <th>Package Name</th>
            <th>TravelGuide ID</th>
            <th>TravelGuide Name</th>
            <th>Actions</th>
          </tr>
          <?php 
                $selecttravelguidedetail="Select tgd.tgdid,s.scheduleid,s.departuredate,s.arrivaldate,p.packagename,tg.travelguideid,tg.travelguidename from TravelGuideDetail tgd,TravelGuide tg,Schedule s,Package p where tgd.scheduleid=s.scheduleid and tgd.travelguideid=tg.travelguideid and p.packageid=s.packageid";
                $runselecttravelguidedetail=mysqli_query($connection,$selecttravelguidedetail);
                $countoftravelguidedetail=mysqli_num_rows($runselecttravelguidedetail);
                if ($countoftravelguidedetail>0) {
                  for ($i=0; $i <$countoftravelguidedetail ; $i++) { 
                    $data=mysqli_fetch_array($runselecttravelguidedetail);
                    $travelguidedetailid=$data['tgdid'];
                    $scheduleid=$data['scheduleid'];
                    $scheduledeparturedate=$data['departuredate'];
                    $schedulearrivaldate=$data['arrivaldate'];
                    $packagename=$data['packagename'];
                    $travelguideid=$data['travelguideid'];
                    $travelguidename=$data['travelguidename'];
                    echo "<tr>
                      <td>$travelguidedetailid</td>
                      <td>$scheduleid</td>
                      <td>$scheduledeparturedate</td>
                      <td>$schedulearrivaldate</td>
                      <td>$packagename</td>
                      <td>$travelguideid</td>
                      <td>$travelguidename</td>
                      <td>
                      <a href='travel_guide_manage_update.php?tgdid=$travelguidedetailid'>Update</a> 
                      | 
                      <a href='travel_guide_manage_delete.php?tgdid=$travelguidedetailid'>Delete</a> 
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