<?php 
	include('../connect.php');
	$dropschedule="Drop table Schedule";
	$rundropschedule=mysqli_query($connection,$dropschedule);
	if ($rundropschedule) {
		echo "<p>Schedule Table is dropped successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$createschedule="CREATE table Schedule
		(
			scheduleid int Auto_Increment not null primary key,
			packageid int,
			staffid int,
			departuredate date,
			departuretime varchar(50),
			duration varchar(50),
			arrivaldate date,
			maxcharacter int,
			foreign key(packageid) references Package(packageid),
			foreign key(staffid) references Staff(staffid)
		)" ;
	$runcreateschedule=mysqli_query($connection,$createschedule);
	if ($runcreateschedule) {
		echo "<p>Schedule Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertschedule="INSERT into Schedule values(1,1,1,'2020-10-02','9:00 PM','1 week','2020-10-09',20)";
	$runinsertschedule=mysqli_query($connection,$insertschedule);
	if ($runinsertschedule) {
		echo "<p>A new schedule is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>