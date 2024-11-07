<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['rid'])) {
		$restaurantid=$_REQUEST['rid'];
		$deleterestaurant="DELETE FROM Restaurant where restaurantid='$restaurantid'";
		$rundeleterestaurant=mysqli_query($connection,$deleterestaurant);
		if ($rundeleterestaurant) {
			echo "<script>window.alert('Restaurant Deleted Successfully')</script>";
			echo "<script>window.location='restaurant.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run delete restaurant query failed!')</script>";
		}
	}
?>