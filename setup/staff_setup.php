<?php 
	include('../connect.php');
	$dropstaff="Drop table Staff";
	$rundropstaff=mysqli_query($connection,$dropstaff);
	if ($rundropstaff) {
		echo "<p>Staff Table is dropped successfully!</p>";
	}

	$createstaff="CREATE table Staff
		(
			staffid int Auto_Increment not null primary key,
			staffname varchar(50),
			phone varchar(30),
			email varchar(50),
			password varchar(50),
			stafftype varchar(20),
			gender varchar(20),
			address varchar(255)
		)" ;
	$runcreatestaff=mysqli_query($connection,$createstaff);
	if ($runcreatestaff) {
		echo "<p>Staff Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertstaff="INSERT into Staff values(1,'mgmg','09254325731','mgmg@gmail.com','mgmg123','Admin Staff','Male','UK')";
	$runinsertstaff=mysqli_query($connection,$insertstaff);
	if ($runinsertstaff) {
		echo "<p>A new staff is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>