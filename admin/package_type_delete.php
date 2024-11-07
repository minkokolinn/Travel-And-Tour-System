<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['ptid'])) {
		$packagetypeid=$_REQUEST['ptid'];
		$deletepackagetype="DELETE FROM PackageType where packagetypeid='$packagetypeid'";
		$rundeletepackagetype=mysqli_query($connection,$deletepackagetype);
		if ($rundeletepackagetype) {
			echo "<script>window.alert('Package Type Deleted Successfully')</script>";
			echo "<script>window.location='package_type.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run delete package type query failed!')</script>";
		}
	}
?>