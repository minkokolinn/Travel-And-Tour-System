<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['pid'])) {
		$packageid=$_REQUEST['pid'];
		$selectpackage="SELECT * FROM Package where packageid='$packageid'";
		$runselectpackage=mysqli_query($connection,$selectpackage);
		if ($runselectpackage) {
			$data=mysqli_fetch_array($runselectpackage);
			$packageid=$data['packageid'];
      $packagename=$data['packagename'];
      $packageplaces=$data['places'];
      $packagedepartureplace=$data['departure_place'];
      $packagearrivalplace=$data['arrival_place'];
      $packageestimateduration=$data['estimated_duration'];
      $packageprice=$data['price'];
      $packageshortdescription=$data['short_description'];
      $packagedetaildescription=$data['detail_description'];
      $packageimg1=$data['package_img1'];
      $packageimg2=$data['package_img2'];
      $packageimg3=$data['package_img3'];
      $packagetypeid=$data['packagetypeid'];
		}
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
  <link rel="stylesheet" type="text/css" href="../css/for_responsive_detail.css">
 </head>
 <body>
  <div class="bradcam_area bradcam_bg_4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Package Detail</h3>
                        <!-- <p>Add new package Type</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div id="responsive_tbl" style="width: 50%; margin-left: 25%;">
      <div style="overflow-x:auto;">
        <table>
          <tr>
            <center><th class="h4" colspan="2">Detail Information</th></center>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td><label class="h6">Package ID</label><br><?php echo $packageid; ?></td>
          </tr>
          <tr>
            <td><label class="h6">Package Name</label><br><?php echo $packagename; ?></td>
          </tr>
          <tr>
            <td><label class="h6">Places</label><br><?php echo $packageplaces; ?></td>
          </tr>
          <tr>
            <td><label class="h6">Departure Place</label><br><?php echo $packagedepartureplace; ?></td>
          </tr>
          <tr>
            <td><label class="h6">Arrival Place</label><br><?php echo $packagearrivalplace; ?></td>
          </tr>
          <tr>
            <td><label class="h6">Estimated Duration</label><br><?php echo $packageestimateduration; ?></td>
          </tr>
          <tr>
            <td><label class="h6">Price</label><br><?php echo $packageprice; ?></td>
          </tr>
          <tr>
            <td><label class="h6">Short Description</label><br><?php echo $packageshortdescription; ?></td>
          </tr>
          <tr>
            <td><label class="h6">Detail Description</label><br><?php echo $packagedetaildescription; ?></td>
          </tr>
          <tr>
            <td><label class="h6">Image 1</label><br><img src="<?php echo $packageimg1 ?>" width="60%" height="auto"></td>
          </tr>
          <tr>
            <td><label class="h6">Image 2</label><br><img src="<?php echo $packageimg2 ?>" width="60%" height="auto"></td>
          </tr>
          <tr>
            <td><label class="h6">Image 3</label><br><img src="<?php echo $packageimg3 ?>" width="60%" height="auto"></td>
          </tr>
          <tr>
            <td><label class="h6">Package Type ID</label><br><?php echo $packagetypeid; ?></td>
          </tr>
        </table>
      </div>
      <br>
      <div class="container">
      <div class="row">
        <div class="col-md-12 text-right">
            <a href="package.php">
              <button type="button" class="btn btn-info">Back</button>
            </a>
        </div>
      </div>
      </div>
    </div>
    <br><br>

 </body>
 </html>

 <?php 
 	include('footer.php');
  ?>