<?php 
    session_start();
	include('../connect.php');
	include('menu_main_admin.php');

    if(isset($_SESSION['sid'])){
        $sid=$_SESSION['sid'];
    }else{
        echo "<script>window.alert('Please Login Staff Account Firstly!.');</script>";
        echo "<script>window.location='index.php';</script>";
    }
 ?>
<!DOCTYPE html>
<html  class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="css/mycss.css">
    <link rel="stylesheet" type="text/css" href="../css/for_responsive_table.css">
</head>
<body>
    <div class="staff_home_header">
        <center><h1>Customer Management</h1></center>
        <center><h2>(Admin Panel)</h2></center>
    </div>
	
     <br><br>
    <div style="width: 90%; margin-left: 5%;">
        <?php 
          $selectstaff="select * from Staff where staffid=$sid";
          $runselectstaff=mysqli_query($connection,$selectstaff);
          $countofstaff=mysqli_num_rows($runselectstaff);
          if ($countofstaff>0) {
            for ($i=0; $i <$countofstaff ; $i++) { 
              $dataofstaff=mysqli_fetch_array($runselectstaff);
              $stafftype=$dataofstaff['stafftype'];
            }
          }
          if ($stafftype=="Admin Staff") {
            echo "<a href='staff_home_forhr.php'><button class='button button-contactForm boxed-btn'>Staff Management</button></a>";
          }else{

          }
         ?>
    </div>
    <center><h2>Customer List</h2></center>
    <div id="responsive_tbl" style="width: 90%; margin-left: 5%;"> 
      <br>

      <div style="overflow-x:auto;">
        <table border="1">
          <tr>
            <th>Profile</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Password</th>
            <th>Date of birth</th>
            <th>NRC</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Actions</th>
          </tr>
          <?php 
                $selectcustomer="select * from Customer";
                $runselectcustomer=mysqli_query($connection,$selectcustomer);
                $countofcustomer=mysqli_num_rows($runselectcustomer);
                if ($countofcustomer>0) {
                    for ($i=0; $i <$countofcustomer ; $i++) { 
                    $dataofcustomer=mysqli_fetch_array($runselectcustomer);
                    $profileimg=$dataofcustomer['profile_img'];
                    $customerid=$dataofcustomer['customerid'];
                    $name=$dataofcustomer['customername'];
                    $phone=$dataofcustomer['phone'];
                    $email=$dataofcustomer['email'];
                    $password=$dataofcustomer['password'];
                    $dob=$dataofcustomer['dob'];
                    $nrc=$dataofcustomer['nrc'];
                    $gender=$dataofcustomer['gender'];
                    $address=$dataofcustomer['address'];
                    echo "<tr>
                      <td><img src='../$profileimg' width='50px' height='auto' style='border-radius:10px; border:2px solid black;'></td>
                      <td>$name</td>
                      <td>$phone</td>
                      <td>$email</td>
                      <td>$password</td>
                      <td>$dob</td>
                      <td>$nrc</td>
                      <td>$gender</td>
                      <td>$address</td>
                      <td>
                      <a href='admin_customer_delete.php?cusid=$customerid'>Delete</a> 
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