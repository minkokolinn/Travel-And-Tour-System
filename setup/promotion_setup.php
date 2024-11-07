<?php 
	include('../connect.php');
	$droppromotion="Drop table Promotion";
	$rundroppromotion=mysqli_query($connection,$droppromotion);
	if ($rundroppromotion) {
		echo "<p>Promotion Table is dropped successfully!</p>";
	}

	$createpromotion="CREATE table Promotion
		(
			promotionid int Auto_Increment not null primary key,
			promotionname varchar(50),
			discountpercentage int,
			description varchar(255)
		)" ;
	$runcreatepromotion=mysqli_query($connection,$createpromotion);
	if ($runcreatepromotion) {
		echo "<p>Promotion Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertpromotion="INSERT into Promotion values(1,'Thidingyut Promotion',30,'Between October 1 and October 31! Discount 30% of total amount!'),
		(2,'Group Promotion',20,'More than Six 6 Characters of Booking! Discount 20% of total amount'),
		(3,'New Year Promotion',40,'Between December 29 and January 3! Discount 40% of total amount')";

	$runinsertpromotion=mysqli_query($connection,$insertpromotion);
	if ($runinsertpromotion) {
		echo "<p>Three new promotion type are inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>