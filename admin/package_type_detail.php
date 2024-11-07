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
                        <h3>Package Type Detail</h3>
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
            <!-- <td>Package Type ID</td> -->
            <td><label class="h6">Package Type ID</label><br><?php echo $packagetypeid; ?></td>
          </tr>
          <tr>
            <!-- <td>Package Type Name</td> -->
            <td><label class="h6">Package Type</label><br><?php echo $packagetype; ?></td>
          </tr>
          <tr>
            <!-- <td>Description</td> -->
            <td><label class="h6">Package Type Description</label><br><?php echo $packagetypedescription; ?></td>
          </tr>
        </table>
      </div>
      <br>
      <div class="container">
      <div class="row">
        <div class="col-md-12 text-right">
            <a href="package_type.php">
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