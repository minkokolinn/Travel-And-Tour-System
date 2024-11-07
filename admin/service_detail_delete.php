<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['svid'])) {
		$serviceid=$_REQUEST['svid'];
		$deleteservice="DELETE FROM Service where serviceid='$serviceid'";
		$rundeleteservice=mysqli_query($connection,$deleteservice);
		if ($rundeleteservice) {
			echo "<script>window.alert('Service Detail Deleted Successfully')</script>";
			echo "<script>window.location='service_detail.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run delete service detail query failed!')</script>";
		}
	}
?>