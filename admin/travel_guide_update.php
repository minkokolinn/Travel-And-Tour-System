<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['tgid'])) {
		$travelguideid=$_REQUEST['tgid'];
		$selecttravelguide="SELECT * FROM TravelGuide where travelguideid='$travelguideid'";
		$runselecttravelguide=mysqli_query($connection,$selecttravelguide);
		if ($runselecttravelguide) {
			$data=mysqli_fetch_array($runselecttravelguide);
			$travelguideid=$data['travelguideid'];
      $travelguidename=$data['travelguidename'];
      $travelguideemail=$data['email'];
      $travelguidephone=$data['phone'];
      $travelguidenrc=$data['nrc'];
      $travelguideaddress=$data['address'];
		}
	}

	if (isset($_POST['btnupdatetravelguide'])) {
		$tgid=$_POST['txttravelguideid'];
		$tgname=$_POST['txttravelguidename'];
		$tgemail=$_POST['txttravelguideemail'];
    $tgphone=$_POST['txttravelguidephone'];
    $tgnrc=$_POST['txttravelguidenrc'];
    $tgaddress=$_POST['txttravelguideaddress'];
		$updatetravelguide="UPDATE TravelGuide set travelguidename='$tgname',email='$tgemail',phone='$tgphone',nrc='$tgnrc',address='$tgaddress' where travelguideid='$tgid'";
		$runupdatetravelguide=mysqli_query($connection,$updatetravelguide);
		if ($runupdatetravelguide) {
			echo "<script>window.alert('Travel Guide Update Successfully')</script>";
			echo "<script>window.location='travel_guide.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run update travel guide query failed!')</script>";
		}
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<section class="site-section bg-light bg-image">
      <br><br>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            
          </div>
          <div class="col-md-6 mb-0" data-aos="fade-up" data-aos-once="false">

            <form action="" class="p-5 bg-white" method="post">
              
              <center><h2 class="h4 text-black mb-3">Update To Travel Guide!</h2></center>

              <input type="hidden" name="txttravelguideid" value="<?php echo $travelguideid ?>">

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Travel Guide Name</label>
                  <input type="text" class="form-control" name="txttravelguidename" value="<?php echo $travelguidename ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Email</label>
                  <input type="email" class="form-control" name="txttravelguideemail" value="<?php echo $travelguideemail ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Phone</label>
                  <input type="text" class="form-control" name="txttravelguidephone" value="<?php echo $travelguidephone ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">NRC</label>
                  <input type="text" class="form-control" name="txttravelguidenrc" value="<?php echo $travelguidenrc ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Address</label>
                  <input type="text" class="form-control" name="txttravelguideaddress" value="<?php echo $travelguideaddress ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="Update" class="button button-contactForm boxed-btn" name="btnupdatetravelguide">
                </div>
                <div class="col-md-1 col-3">
                  
                </div>
                <div class="col-md-4 col-3">
                  <a href="travel_guide.php">
                    <button type="button" class="button button-contactForm boxed-btn">Back</button>
                </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <br><br>
    </section>
 </body>
 </html>

 <?php 
 	include('footer.php');
  ?>