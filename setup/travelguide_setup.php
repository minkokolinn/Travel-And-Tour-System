<?php 
	include('../connect.php');
	$droptravelguide="Drop table TravelGuide";
	$rundroptravelguide=mysqli_query($connection,$droptravelguide);
	if ($rundroptravelguide) {
		echo "<p>Travel Guide Table is dropped successfully!</p>";
	}

	$createtravelguide="CREATE table TravelGuide
		(
			travelguideid int Auto_Increment not null primary key,
			travelguidename varchar(50),
			email varchar(50),
			phone varchar(20),
			nrc varchar(50),
			address varchar(100)
		)" ;
	$runcreatetravelguide=mysqli_query($connection,$createtravelguide);
	if ($runcreatetravelguide) {
		echo "<p>Hotel Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$inserttravelguide="INSERT into TravelGuide values(1,'Steven','steven@gmail.com','09765434456','12/LaMaTa(T)938374','South Dagon Township, Yangon')";
	$runinserttravelguide=mysqli_query($connection,$inserttravelguide);
	if ($runinserttravelguide) {
		echo "<p>A new travel guide is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>