<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['hid'])) {
		$hotelid=$_REQUEST['hid'];
		$deletehotel="DELETE FROM Hotel where hotelid='$hotelid'";
		$rundeletehotel=mysqli_query($connection,$deletehotel);
		if ($rundeletehotel) {
			echo "<script>window.alert('Hotel Deleted Successfully')</script>";
			echo "<script>window.location='hotel.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run delete hotel query failed!')</script>";
		}
	}
?>