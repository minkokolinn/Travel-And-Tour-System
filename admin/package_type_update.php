<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['ptid'])) {
		$packagetypeid=$_REQUEST['ptid'];
		$selectpackagetype="SELECT * FROM PackageType where packagetypeid='$packagetypeid'";
		$runselectpackagetype=mysqli_query($connection,$selectpackagetype);
		if ($runselectpackagetype) {
			$data=mysqli_fetch_array($runselectpackagetype);
			$packagetypeid=$data['packagetypeid'];
			$packagetype=$data['packagetype'];
			$packagetypedescription=$data['typedescription'];
		}
	}

	if (isset($_POST['btnpackagetypeupdate'])) {
		$ptypeid=$_POST['txtpackagetypeid'];
		$ptname=$_POST['txtpackagetypename'];
		$ptdescription=$_POST['txtpackagetypedescription'];
		$updatepackagetype="UPDATE PackageType set packagetype='$ptname',typedescription='$ptdescription' where packagetypeid='$ptypeid'";
		$runupdatepackagetype=mysqli_query($connection,$updatepackagetype);
		if ($runupdatepackagetype) {
			echo "<script>window.alert('Package Type Update Successfully')</script>";
			echo "<script>window.location='package_type.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run update package type query failed!')</script>";
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
              
              <center><h2 class="h4 text-black mb-3">Update To Package Type!</h2></center>

              <input type="hidden" name="txtpackagetypeid" value="<?php echo $packagetypeid ?>">
              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Package Type</label>
                  <input type="text" class="form-control" name="txtpackagetypename" value="<?php echo $packagetype ?>">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Description</label><br>
                  <textarea name="txtpackagetypedescription" class="col-12" rows="4">
 						<?php echo $packagetypedescription; ?>
 					</textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="Update" class="button button-contactForm boxed-btn" name="btnpackagetypeupdate">
                </div>
                <div class="col-md-1 col-3">
                	
                </div>
                <div class="col-md-4 col-3">
                	<a href="package_type.php">
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