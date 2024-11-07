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
        <center><h1>Employee Management</h1></center>
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
            echo "<a href='staff_home.php'><button class='button button-contactForm boxed-btn'>Customer Management</button></a>";
          }else{

          }
         ?>
    </div>
    <center><h2>Employee List</h2></center>
    <div id="responsive_tbl" style="width: 90%; margin-left: 5%;"> 
      <br>
      <div style="overflow-x:auto;">
        <table border="1">
          <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Password</th>
            <th>Staff Type</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Actions</th>
          </tr>
          <?php 
                $selectstaff="select * from Staff";
                $runselectstaff=mysqli_query($connection,$selectstaff);
                $countofstaff=mysqli_num_rows($runselectstaff);
                if ($countofstaff>0) {
                    for ($i=0; $i <$countofstaff ; $i++) { 
                    $data=mysqli_fetch_array($runselectstaff);
                    $staffid=$data['staffid'];
                    $staffname=$data['staffname'];
                    $phone=$data['phone'];
                    $email=$data['email'];
                    $stafftype=$data['stafftype'];
                    if ($stafftype=="Admin Staff") {
                      $password="*********";
                    }else{
                      $password=$data['password'];
                    }
                    $gender=$data['gender'];
                    $address=$data['address'];

                    echo "<tr>
                      <td>$staffname</td>
                      <td>$phone</td>
                      <td>$email</td>
                      <td>$password</td>
                      <td>$stafftype</td>
                      <td>$gender</td>
                      <td>$address</td>
                    ";
                    if ($stafftype=="Admin Staff") {
                      echo "<td>
                       
                      </td>";
                    }else{
                      echo "<td>
                      <a href='admin_staff_delete.php?stfid=$staffid'>Delete</a> 
                      </td>";
                    }
                    echo "</tr>";
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