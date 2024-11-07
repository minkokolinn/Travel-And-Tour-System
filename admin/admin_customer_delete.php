<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['cusid'])) {
		$customerid=$_REQUEST['cusid'];
		$deletecustomer="DELETE FROM Customer where customerid='$customerid'";
		$rundeletecustomer=mysqli_query($connection,$deletecustomer);
		if ($rundeletecustomer) {
			echo "<script>window.alert('Customer Account Deleted Successfully')</script>";
			echo "<script>window.location='staff_home.php'</script>";
		}else{
			// echo mysqli_error($connection);
          echo "<script>window.alert('Run delete custmer query failed! This customer has associated booking and feedback!')</script>";
          echo "<script>window.location='staff_home.php'</script>";
		}
	}
?>