<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['tid'])) {
		$ticketid=$_REQUEST['tid'];
		$deleteticket="DELETE FROM Ticket where ticketid='$ticketid'";
		$rundeleteticket=mysqli_query($connection,$deleteticket);
		if ($rundeleteticket) {
			echo "<script>window.alert('Ticket Deleted Successfully')</script>";
			echo "<script>window.location='ticket.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run delete ticket query failed!')</script>";
		}
	}
?>