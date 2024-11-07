<?php 
	session_start();
	include('../connect.php');
	session_destroy();
	echo "<script>window.alert('Admin Logout Successfully!!')</script>";
	echo "<script>window.location='index.php'</script>";
 ?>