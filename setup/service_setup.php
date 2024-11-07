<?php 
	include('../connect.php');
	$dropservice="Drop table Service";
	$rundropservice=mysqli_query($connection,$dropservice);
	if ($rundropservice) {
		echo "<p>Service Table is dropped successfully!</p>";
	}

	$createservice="CREATE table Service
		(
			serviceid int Auto_Increment not null primary key,
			packageid int,
			restaurantid int,
			hotelid int,
			foreign key(packageid) references Package(packageid),
			foreign key(restaurantid) references Restaurant(restaurantid),
			foreign key(hotelid) references Hotel(hotelid)
		)" ;
	$runcreateservice=mysqli_query($connection,$createservice);
	if ($runcreateservice) {
		echo "<p>Service Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertservice="INSERT into Service values(1,1,1,1)";
	$runinsertservice=mysqli_query($connection,$insertservice);
	if ($runinsertservice) {
		echo "<p>A new service is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>