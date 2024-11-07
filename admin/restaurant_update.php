<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['rid'])) {
    $restaurantid=$_REQUEST['rid'];
    $selectrestaurant="SELECT * FROM Restaurant where restaurantid='$restaurantid'";
    $runselectrestaurant=mysqli_query($connection,$selectrestaurant);
    if ($runselectrestaurant) {
      $data=mysqli_fetch_array($runselectrestaurant);
      $restaurantid=$data['restaurantid'];
      $restaurantname=$data['restaurantname'];
      $restaurantaddress=$data['address'];
      $restaurantdescription=$data['description'];
    } 
	}

	if (isset($_POST['btnrestaurantupdate'])) {
		$rid=$_POST['txtrestaurantid'];
		$rname=$_POST['txtrestaurantname'];
		$raddress=$_POST['txtrestaurantaddress'];
    $rdescription=$_POST['txtrestaurantdescription'];
		$updaterestaurant="UPDATE Restaurant set restaurantname='$rname',address='$raddress',description='$rdescription' where restaurantid='$rid'";
		$runupdaterestaurant=mysqli_query($connection,$updaterestaurant);
		if ($runupdaterestaurant) {
			echo "<script>window.alert('Restaurant Update Successfully')</script>";
			echo "<script>window.location='restaurant.php'</script>";
		}else{
			echo mysqli_error($connection);
      echo "<script>window.alert('Run update restaurant query failed!')</script>";
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

            <form action="" class="p-5 bg-white" method="post" action="">
              
              <center><h2 class="h4 text-black mb-3">Update To Restaurant!</h2></center>

              <input type="hidden" name="txtrestaurantid" value="<?php echo $restaurantid ?>">

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Restaurant Name</label>
                  <input type="text" class="form-control" name="txtrestaurantname" value="<?php echo $restaurantname ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Address</label><br>
                  <textarea name="txtrestaurantaddress" class="col-12" rows="2"><?php echo $restaurantaddress; ?></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Description</label><br>
                  <textarea name="txtrestaurantdescription" class="col-12" rows="5"><?php echo $restaurantdescription; ?></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="Update" class="button button-contactForm boxed-btn" name="btnrestaurantupdate">
                </div>
                <div class="col-md-1 col-3">
                	
                </div>
                <div class="col-md-4 col-3">
                	<a href="restaurant.php">
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