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
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
  <link rel="stylesheet" type="text/css" href="../css/for_responsive_detail.css">
      <style type="text/css">
      .headerimg_hotel{
        background-image: url(../img/banner/banner_hotel.jpg);
      }
    </style>
 </head>
 <body>
  <div class="bradcam_area headerimg_hotel">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Hotel Detail</h3>
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
            <td><label class="h6">Hotel ID</label><br><?php echo $hotelid; ?></td>
          </tr>
          <tr>
            <!-- <td>Package Type Name</td> -->
            <td><label class="h6">Hotel Name</label><br><?php echo $hotelname; ?></td>
          </tr>
          <tr>
            <!-- <td>Description</td> -->
            <td><label class="h6">Address</label><br><?php echo $hoteladdress; ?></td>
          </tr>
          <tr>
            <!-- <td>Description</td> -->
            <td><label class="h6">Description</label><br>
              <textarea cols="50%" rows="10" readonly><?php echo $hoteldescription; ?></textarea></td>

          </tr>
        </table>

      </div>
      <br>
      <div class="container">
      <div class="row">
        <div class="col-md-12 text-right">
            <a href="hotel.php">
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