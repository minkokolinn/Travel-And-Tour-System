<?php 
    include('connect.php');
    include('menu_main_customer.php');

    //get today date
    $tdy=date("Y-m-d");
    // $tdy1=date("m-d");
    
    $selectedtoplace="";
    if (isset($_POST['btnsearchticket'])) {
      $selectedtoplace=$_POST['cbsearchticket'];
    }
    // if (isset($_POST['btnsearchticketreset'])) {
    //   echo "<script>window.location='admin_view_booking_schedule.php'</script>";
    // }
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travelo</title>
    <link rel="stylesheet" type="text/css" href="mycss/cssforstaffreg.css">
    <link rel="stylesheet" type="text/css" href="css/for_responsive_table.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>
<body>
    <!-- header section -->
     <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Ticket List to Book</h3>
                        <!-- <p>Add new package Type</p> -->
                    </div>
                </div>

            </div>
        </div>
        <div id="itisaplace"></div>
    </div>

    <!-- slider_area_end -->
    <!-- ================ contact section end ================= -->
    <br><br>
    <form method="post" action="#itisaplace">
      <div class="container">
      <div class="row">
        
        <div class="col-1 text-right">
          <center>To :</center>
        </div>
        <div class="col-3 text-right ">
          <div class="row form-group">
            <select class="col-10" name='cbsearchticket'>
              <option value="">Choose a place to go</option>
              <?php 
                $selectticket="select DISTINCT * from Ticket";
                $runselectticket=mysqli_query($connection,$selectticket);
                $countofticket=mysqli_num_rows($runselectticket);
                if ($countofticket>0) {
                  for ($i=0; $i <$countofticket ; $i++) { 
                    $dataofticket=mysqli_fetch_array($runselectticket);
                    $ticket_to_place=$dataofticket['to_place'];
                    echo "<option value='$ticket_to_place'>$ticket_to_place</option>";
                  }
                }
               ?>
            </select>
          </div>
        </div>
        <div class="col-md-3 text-left">
          <div class="reset_btn">
            <input type="submit" name="btnsearchticket" class="btn btn-info" value="Search">
            <input type="submit" name="btnsearchticketreset" class="btn btn-info" value="Show All">
          </div>
        </div>
        
      </div>
      </div>
    </form>
  
    <div id="responsive_tbl" style="width: 90%; margin-left: 5%;"> 
      <div class="container">
      <div class="row">
        <div class="col-md-12 text-right">
            <a href="ticket_insert.php">
              <!-- <button type="button" class="btn btn-info">ADD NEW TICKET</button> -->
            </a>
        </div>
      </div>
      </div>
      <br>

      <div style="overflow-x:auto;">
        <table>
          <tr>
            <th>Ticket ID</th>
            <th>To</th>
            <th>From</th>
            <th>Trip Date</th>
            <th>Trip Time</th>
            <th>Company Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
          <?php 
              if ($selectedtoplace=="") {
                $selectticket="Select * from Ticket";
                $runselectticket=mysqli_query($connection,$selectticket);
                $countofticket=mysqli_num_rows($runselectticket);
                if ($countofticket>0) {
                  for ($i=0; $i <$countofticket ; $i++) { 
                    $data=mysqli_fetch_array($runselectticket);
                    $ticketid=$data['ticketid'];
                    $ticketto=$data['to_place'];
                    $ticketfrom=$data['from_place'];
                    $tickettripdate=$data['tripdate'];
                    $tickettriptime=$data['triptime'];
                    $ticketcompanyname=$data['companyname'];
                    $ticketprice=$data['price'];
                    $ticketquantity=$data['quantity'];
                    $ticketdescription=$data['description'];
                    
                    if ($tickettripdate>$tdy) {
                      echo "<tr>
                      <td>$ticketid</td>
                      <td>$ticketto</td>
                      <td>$ticketfrom</td>
                      <td>$tickettripdate</td>
                      <td>$tickettriptime</td>
                      <td>$ticketcompanyname</td>
                      <td>$ticketprice</td>
                      <td>$ticketquantity</td>
                      <td>$ticketdescription</td>
                      <td>
                      <a href='booking_ticket.php?cvtid=$ticketid'>Book</a> 
                      </td>
                      </tr>
                      ";
                    }
                  }
                }
              }else{
                $selectticket="Select * from Ticket where to_place='$selectedtoplace'";
                $runselectticket=mysqli_query($connection,$selectticket);
                $countofticket=mysqli_num_rows($runselectticket);
                if ($countofticket>0) {
                  for ($i=0; $i <$countofticket ; $i++) { 
                    $data=mysqli_fetch_array($runselectticket);
                    $ticketid=$data['ticketid'];
                    $ticketto=$data['to_place'];
                    $ticketfrom=$data['from_place'];
                    $tickettripdate=$data['tripdate'];
                    $tickettriptime=$data['triptime'];
                    $ticketcompanyname=$data['companyname'];
                    $ticketprice=$data['price'];
                    $ticketquantity=$data['quantity'];
                    $ticketdescription=$data['description'];
                    
                    if ($tickettripdate>$tdy) {
                      echo "<tr>
                      <td>$ticketid</td>
                      <td>$ticketto</td>
                      <td>$ticketfrom</td>
                      <td>$tickettripdate</td>
                      <td>$tickettriptime</td>
                      <td>$ticketcompanyname</td>
                      <td>$ticketprice</td>
                      <td>$ticketquantity</td>
                      <td>$ticketdescription</td>
                      <td>
                      <a href='booking_ticket.php?cvtid=$ticketid'>Book</a> 
                      </td>
                      </tr>
                      ";
                    }
                    
                  }
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