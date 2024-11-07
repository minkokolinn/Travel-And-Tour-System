<?php 
	include('../connect.php');
	$droptravelguidedetail="Drop table TravelGuideDetail";
	$rundroptravelguidedetail=mysqli_query($connection,$droptravelguidedetail);
	if ($rundroptravelguidedetail) {
		echo "<p>Travel Guide Detail Table is dropped successfully!</p>";
	}

	$createtravelguidedetail="CREATE table TravelGuideDetail
		(
			tgdid int Auto_Increment not null primary key,
			scheduleid int,
			travelguideid int,
			foreign key(scheduleid) references Schedule(scheduleid),
			foreign key(travelguideid) references TravelGuide(travelguideid)
		)" ;
	$runcreatetravelguidedetail=mysqli_query($connection,$createtravelguidedetail);
	if ($runcreatetravelguidedetail) {
		echo "<p>Travel Guide Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$inserttravelguide="INSERT into TravelGuideDetail values(1,1,1)";
	$runinserttravelguide=mysqli_query($connection,$inserttravelguide);
	if ($runinserttravelguide) {
		echo "<p>A new travel guide detail is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>