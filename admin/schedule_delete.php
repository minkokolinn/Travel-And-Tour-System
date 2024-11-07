<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['sid'])) {
		$scheduleid=$_REQUEST['sid'];
		$deleteschedule="DELETE FROM Schedule where scheduleid='$scheduleid'";
		$rundeleteschedule=mysqli_query($connection,$deleteschedule);
		if ($rundeleteschedule) {
			echo "<script>window.alert('Schedule Deleted Successfully')</script>";
			echo "<script>window.location='schedule.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run delete schedule query failed!')</script>";
		}
	}
?>