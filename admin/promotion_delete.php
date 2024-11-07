<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['prid'])) {
		$promotionid=$_REQUEST['prid'];
		$deletepromotion="DELETE FROM Promotion where promotionid='$promotionid'";
		$rundeletepromotion=mysqli_query($connection,$deletepromotion);
		if ($rundeletepromotion) {
			echo "<script>window.alert('Promotion Deleted Successfully')</script>";
			echo "<script>window.location='promotion.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run delete promotion query failed!')</script>";
		}
	}
?>