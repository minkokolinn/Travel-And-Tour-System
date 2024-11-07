<?php 
	include('../connect.php');
	$droppackagetype="Drop table PackageType";
	$rundroppackagetype=mysqli_query($connection,$droppackagetype);
	if ($rundroppackagetype) {
		echo "<p>Package Type Table is dropped successfully!</p>";
	}

	$createpackagetype="CREATE table PackageType
		(
			packagetypeid int Auto_Increment not null primary key,
			packagetype varchar(50),
			typedescription varchar(255)
		)" ;
	$runcreatepackagetype=mysqli_query($connection,$createpackagetype);
	if ($runcreatepackagetype) {
		echo "<p>Package Type Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertpackagetype="INSERT into PackageType values(1,'Cultural and Heritage Tour','Culture and heritage come in many forms, whether you’re enjoying the food, art, language, music, architecture, museums or ancient sites of your chosen destination, culture and heritage are at the very heart of your trip. UNESCO have recognized 1,073 sites world wide, giving you plenty of sites to tick off your culture and heritage bucket list. You can enjoy anything from the remains of ancient civilisations to world famous masterpieces of the most renowned artists, and everything in between.')";
	$runinsertpackagetype=mysqli_query($connection,$insertpackagetype);
	if ($runinsertpackagetype) {
		echo "<p>A new package type is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>