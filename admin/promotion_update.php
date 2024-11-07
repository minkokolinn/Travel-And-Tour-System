<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['prid'])) {
    $promotionid=$_REQUEST['prid'];
    $selectpromotion="SELECT * FROM Promotion where promotionid='$promotionid'";
    $runselectpromotion=mysqli_query($connection,$selectpromotion);
    if ($runselectpromotion) {
      $data=mysqli_fetch_array($runselectpromotion);
      $promotionid=$data['promotionid'];
      $promotionname=$data['promotionname'];
      $promotiondescription=$data['description'];
    } 
	}

	if (isset($_POST['btnpromotionupdate'])) {
		$prid=$_POST['txtpromotionid'];
		$prname=$_POST['txtpromotionname'];
		$prdescription=$_POST['txtpromotiondescription'];
		$updatepromotion="UPDATE Promotion set promotionname='$prname',description='$prdescription' where promotionid='$prid'";
		$runupdatepromotion=mysqli_query($connection,$updatepromotion);
		if ($runupdatepromotion) {
			echo "<script>window.alert('Promotion Update Successfully')</script>";
			echo "<script>window.location='promotion.php'</script>";
		}else{
			echo mysqli_error($connection);
      echo "<script>window.alert('Run update promotion query failed!')</script>";
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
              
              <center><h2 class="h4 text-black mb-3">Update To Promotion!</h2></center>

              <input type="hidden" name="txtpromotionid" value="<?php echo $promotionid ?>">

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Promotion Name</label>
                  <input type="text" class="form-control" name="txtpromotionname" value="<?php echo $promotionname ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Description</label><br>
                  <textarea name="txtpromotiondescription" class="col-12" rows="5"><?php echo $promotiondescription; ?></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="Update" class="button button-contactForm boxed-btn" name="btnpromotionupdate">
                </div>
                <div class="col-md-1 col-3">
                	
                </div>
                <div class="col-md-4 col-3">
                	<a href="promotion.php">
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