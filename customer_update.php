<?php 
 		include('connect.php');
 		include('menu_main_customer.php');

    if ($_REQUEST['cusid']) {
      $customerid=$_REQUEST['cusid'];

      $selectcustomer="select * from customer where customerid=$customerid";
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
      echo "<script>window.alert('Unknonw customer error!')</script>";
      echo "<script>window.location='customer_profile.php'</script>";
    }

    if (isset($_POST['btncustomerupdate'])) {
      $customername=$_POST['txtcustomername'];
      $customerphone=$_POST['txtcustomerphone'];
      // $customeremail=$_POST['txtcustomeremail'];
      // $customerpass=$_POST['txtcustomerpass'];
      $customercpass=$_POST['txtcustomercpass'];
      $customerdob=$_POST['txtcustomerdob'];
      $customernrc=$_POST['txtcustomernrc'];
      $customergender=$_POST['rbcustomergender'];
      $customeraddress=$_POST['txtcustomeraddress'];

      $updatecustomer="UPDATE Customer set customername='$customername',phone='$customerphone',password='$customercpass',dob='$customerdob',nrc='$customernrc',gender='$customergender',address='$customeraddress' where customerid=$customerid";
      $runupdatecustomer=mysqli_query($connection,$updatecustomer);
      if ($runupdatecustomer) {
        echo "<script>window.alert('Customer Update Successfully')</script>";
        echo "<script>window.location='customer_profile.php'</script>";
      }else{
        echo mysqli_error($connection);
        echo "<script>window.alert('Run update customer query failed!')</script>";
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
    <!-- <link rel="stylesheet" href="css/aos.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="site-section bg-light bg-image">
    	<br><br>
      <div class="container">
        <div class="row">
        	<div class="col-md-3">
        		
        	</div>
          <div class="col-md-6 mb-0" data-aos="fade-up" data-aos-once="false">

            <form action="" class="p-5 bg-white" method="post" enctype="multipart/form-data">
              
              <center><h2 class="h4 text-black mb-3">CUSTOMER INFORMATION UPDATE FORM!</h2></center>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Name</label>
                  <input type="text" class="form-control" name="txtcustomername" value="<?php echo $name; ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Phone</label>
                  <input type="text" class="form-control" name="txtcustomerphone" value="<?php echo $phone; ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Email</label>
                  <input type="email" class="form-control" name="txtcustomeremail" value="<?php echo $email; ?>" readonly required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Old Password</label>
                  <input type="password" class="form-control" name="txtcustomerpass" value="<?php echo $password ?>" readonly required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">New Password</label>
                  <input type="password" class="form-control" name="txtcustomercpass" value="<?php echo $password ?>" required>
                  <label>Type new password, only if you need to change your password!</label>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Date Of Birth</label>
                  <input type="date" class="form-control" name="txtcustomerdob" value="<?php echo $dob; ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">NRC</label>
                  <input type="text" class="form-control" name="txtcustomernrc" value="<?php echo $nrc; ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black" for="genderbox">Gender</label><br>
                  <input type="radio" id="genderbox" name="rbcustomergender" value="Male" required>
                  Male
                  <input type="radio" id="genderbox" name="rbcustomergender" value="Female" required>
                  Female
                  <input type="radio" id="genderbox" name="rbcustomergender" value="Other" required>
                  Other
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Address</label><br>
                  <textarea name="txtcustomeraddress" class="col-12" rows="4"><?php echo "$address"; ?></textarea>
                </div>
              </div>

<!--               <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black" for="imagebox">Profile Image</label>
                  <input type="file" id="imagebox" class="form-control" name="txtcimg" value="" readonly required>
                </div>
              </div> -->

              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="Update" class="button button-contactForm boxed-btn" name="btncustomerupdate">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-12">
                  <a href="customer_profile.php"><p>Back to profile!</p></a>
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
    <script src="js/app.js"></script>

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