<?php 
	include('connect.php');

	if (isset($_REQUEST['fid'])) {
		$feedbackid=$_REQUEST['fid'];
		$deletefeedback="DELETE FROM Feedback where feedbackid='$feedbackid'";
		$rundeletefeedback=mysqli_query($connection,$deletefeedback);
		if ($rundeletefeedback) {
			echo "<script>window.alert('Feedback Deleted Successfully')</script>";
			echo "<script>window.location='customer_profile.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run delete feedback query failed!')</script>";
		}
	}
?>