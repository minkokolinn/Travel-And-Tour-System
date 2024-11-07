<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['hid'])) {
		$hotelid=$_REQUEST['hid'];
    $selecthotel="SELECT * FROM Hotel where hotelid='$hotelid'";
    $runselecthotel=mysqli_query($connection,$selecthotel);
    if ($runselecthotel) {
      $data=mysqli_fetch_array($runselecthotel);
      $hotelid=$data['hotelid'];
      $hotelname=$data['hotelname'];
      $hoteladdress=$data['address'];
      $hoteldescription=$data['description'];
    } 
	}

	if (isset($_POST['btnhotelupdate'])) {
		$hid=$_POST['txthotelid'];
		$hname=$_POST['txthotelname'];
		$haddress=$_POST['txthoteladdress'];
    $hdescription=$_POST['txthoteldescription'];
		$updatehotel="UPDATE Hotel set hotelname='$hname',address='$haddress',description='$hdescription' where hotelid='$hid'";
		$runupdatehotel=mysqli_query($connection,$updatehotel);
		if ($runupdatehotel) {
			echo "<script>window.alert('Hotel Update Successfully')</script>";
			echo "<script>window.location='hotel.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run update hotel query failed!')</script>";
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

            <form action="" class="p-5 bg-white" method="post" action="package_type_update.php">
              
              <center><h2 class="h4 text-black mb-3">Update To Hotel!</h2></center>

              <input type="hidden" name="txthotelid" value="<?php echo $hotelid ?>">
              
              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Hotel Name</label>
                  <input type="text" class="form-control" name="txthotelname" value="<?php echo $hotelname ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Address</label><br>
                  <textarea name="txthoteladdress" class="col-12" rows="2"><?php echo $hoteladdress; ?></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Description</label><br>
                  <textarea name="txthoteldescription" class="col-12" rows="5"><?php echo $hoteldescription; ?></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="Update" class="button button-contactForm boxed-btn" name="btnhotelupdate">
                </div>
                <div class="col-md-1 col-3">
                	
                </div>
                <div class="col-md-4 col-3">
                	<a href="hotel.php">
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