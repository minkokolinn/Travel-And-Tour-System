<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['tgid'])) {
		$travelguideid=$_REQUEST['tgid'];
		$deletetravelguide="DELETE FROM TravelGuide where travelguideid='$travelguideid'";
		$rundeletetravelguide=mysqli_query($connection,$deletetravelguide);
		if ($rundeletetravelguide) {
			echo "<script>window.alert('Travel Guide Deleted Successfully')</script>";
			echo "<script>window.location='travel_guide.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run delete travel guide query failed!')</script>";
		}
	}
?>