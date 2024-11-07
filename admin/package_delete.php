<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['pid'])) {
		$packageid=$_REQUEST['pid'];
		$deletepackage="DELETE FROM Package where packageid='$packageid'";
		$rundeletepackage=mysqli_query($connection,$deletepackage);
		if ($rundeletepackage) {
			echo "<script>window.alert('Package Deleted Successfully')</script>";
			echo "<script>window.location='package.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run delete package query failed!')</script>";
		}
	}
?>