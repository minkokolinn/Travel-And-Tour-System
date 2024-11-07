<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['tgdid'])) {
		$travelguidedetailid=$_REQUEST['tgdid'];
		$deletetravelguidedetail="DELETE FROM TravelGuideDetail where tgdid='$travelguidedetailid'";
		$rundeletetravelguidedetail=mysqli_query($connection,$deletetravelguidedetail);
		if ($rundeletetravelguidedetail) {
			echo "<script>window.alert('Travel Guide Detail Deleted Successfully')</script>";
			echo "<script>window.location='travel_guide_manage.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run delete Travel Guide Detail query failed!')</script>";
		}
	}
?>