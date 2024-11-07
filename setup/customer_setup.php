<?php 
	include('../connect.php');
	$dropcustomer="Drop table Customer";
	$rundropcustomer=mysqli_query($connection,$dropcustomer);
	if ($rundropcustomer) {
		echo "<p>Customer Table is dropped successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$createcustomer="CREATE table Customer
		(
			customerid int Auto_Increment not null primary key,
			customername varchar(50),
			phone varchar(30),
			email varchar(50),
			password varchar(50),
			dob date,
			nrc varchar(100),
			gender varchar(20),
			address varchar(255),
			profile_img text
		)" ;
	$runcreatecustomer=mysqli_query($connection,$createcustomer);
	if ($runcreatecustomer) {
		echo "<p>Customer Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertcustomer="INSERT into Customer values(1,'koko','09254325731','koko@gmail.com','koko123','2002/03/28','12/KaMaTa(N)123456','Male','Yangon','customer_profile/man1.jpg')";
	$runinsertcustomer=mysqli_query($connection,$insertcustomer);
	if ($runinsertcustomer) {
		echo "<p>A new customer is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>