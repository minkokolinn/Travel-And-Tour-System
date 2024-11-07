<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['avbtid'])) {
		$bookingticketid=$_REQUEST['avbtid'];
		$deletebookingticket="DELETE FROM BookingTicket where bookingticketid='$bookingticketid'";
		$rundeletebookingticket=mysqli_query($connection,$deletebookingticket);
		if ($rundeletebookingticket) {
			echo "<script>window.alert('BookingTicket Deleted Successfully')</script>";
			echo "<script>window.location='admin_view_booking_ticket.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run delete booking ticket query failed!')</script>";
		}
	}
?>