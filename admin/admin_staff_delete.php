<?php 
	include('../connect.php');

	if (isset($_REQUEST['stfid'])) {
		$staffid=$_REQUEST['stfid'];
		$deletestaff="DELETE FROM Staff where staffid='$staffid'";
		$rundeletestaff=mysqli_query($connection,$deletestaff);
		if ($rundeletestaff) {
			echo "<script>window.alert('Operational Staff Account Deleted Successfully')</script>";
			echo "<script>window.location='staff_home_forhr.php'</script>";
		}else{
			// echo mysqli_error($connection);
          echo "<script>window.alert('Run delete staff query failed! This staff has associated with other table!')</script>";
          echo "<script>window.location='staff_home_forhr.php'</script>";
		}
	}
?>