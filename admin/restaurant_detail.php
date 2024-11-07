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
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
  <link rel="stylesheet" type="text/css" href="../css/for_responsive_detail.css">
  <style type="text/css">
      .headerimg{
        background-image: url(../img/banner/bradcam5_restaurant.jpg);
      }
    </style>
 </head>
 <body>
  <div class="bradcam_area headerimg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Restaurant Detail</h3>
                        <!-- <p></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div id="responsive_tbl" style="width: 50%; margin-left: 25%;">
      <div style="overflow-x: auto;">
        <table>
          <tr>
            <center><th class="h4" colspan="2">Detail Information</th></center>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <!-- <td>Package Type ID</td> -->
            <td><label class="h6">Restaurant ID</label><br><?php echo $restaurantid; ?></td>
          </tr>
          <tr>
            <!-- <td>Package Type Name</td> -->
            <td><label class="h6">Restaurant Name</label><br><?php echo $restaurantname; ?></td>
          </tr>
          <tr>
            <!-- <td>Description</td> -->
            <td><label class="h6">Address</label><br><?php echo $restaurantaddress; ?></td>
          </tr>
          <tr>
            <!-- <td>Description</td> -->
            <td><label class="h6">Description</label><br>
              <textarea cols="50%" rows="10" readonly><?php echo $restaurantdescription; ?></textarea></td>

          </tr>
        </table>

      </div>
      <br>
      <div class="container">
      <div class="row">
        <div class="col-md-12 text-right">
            <a href="restaurant.php">
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