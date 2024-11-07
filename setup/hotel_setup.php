<?php 
	include('../connect.php');
	$drophotel="Drop table Hotel";
	$rundrophotel=mysqli_query($connection,$drophotel);
	if ($rundrophotel) {
		echo "<p>Hotel Table is dropped successfully!</p>";
	}

	$createhotel="CREATE table Hotel
		(
			hotelid int Auto_Increment not null primary key,
			hotelname varchar(50),
			address varchar(100),
			description varchar(255)
		)" ;
	$runcreatehotel=mysqli_query($connection,$createhotel);
	if ($runcreatehotel) {
		echo "<p>Hotel Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$inserthotel="INSERT into Hotel values(1,'Sedona Hotel','Kabaraye Phayar Road, Yangon','Sedona Hotel is a high end hotel in Yangon, Myanmar. The hotel consists of two buildings named Garden Wing and Inya Wing. The 29-story Inya Wing tower was the tallest building in Myanmar from May to December of 2016.')";
	$runinserthotel=mysqli_query($connection,$inserthotel);
	if ($runinserthotel) {
		echo "<p>A new hotel information is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>