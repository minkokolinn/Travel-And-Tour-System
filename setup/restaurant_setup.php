<?php 
	include('../connect.php');
	$droprestaurant="Drop table Restaurant";
	$rundroprestaurant=mysqli_query($connection,$droprestaurant);
	if ($rundroprestaurant) {
		echo "<p>Restaurant Table is dropped successfully!</p>";
	}

	$createrestaurant="CREATE table Restaurant
		(
			restaurantid int Auto_Increment not null primary key,
			restaurantname varchar(50),
			address varchar(255),
			description varchar(255)
		)" ;
	$runcreaterestaurant=mysqli_query($connection,$createrestaurant);
	if ($runcreaterestaurant) {
		echo "<p>Restaurant table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertrestaurant="INSERT into Restaurant values(1,'Shwe Myat Mhan','BeLin City, Mon State','This restaurant is myanmar traditional restuarant! The common foods in this restaurant are myanmar traditional chicken curry and white rice! They are packed in the leaf! You will feel nature!')";
	$runinsertrestaurant=mysqli_query($connection,$insertrestaurant);
	if ($runinsertrestaurant) {
		echo "<p>A new restaurant info is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>