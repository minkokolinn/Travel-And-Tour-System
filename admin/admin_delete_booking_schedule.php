<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['avbsbookingscheduleid'])) {
		$bookingscheduleid=$_REQUEST['avbsbookingscheduleid'];
		$deletebookingschedule="DELETE FROM BookingSchedule where bookingscheduleid='$bookingscheduleid'";
		$rundeletebookingschedule=mysqli_query($connection,$deletebookingschedule);
		if ($rundeletebookingschedule) {
			echo "<script>window.alert('BookingSchedule Deleted Successfully')</script>";
			echo "<script>window.location='admin_view_booking_schedule.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run delete booking schedule query failed!')</script>";
		}
	}
?>