<?php 
	session_start();
	include('connect.php');
	session_destroy();
	echo "<script>window.alert('Customer Logout Successfully!!')</script>";
	echo "<script>window.location='index.php'</script>";
 ?>