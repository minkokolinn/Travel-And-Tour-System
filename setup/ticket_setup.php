<?php 
	include('../connect.php');
	$dropticket="Drop table Ticket";
	$rundropticket=mysqli_query($connection,$dropticket);
	if ($rundropticket) {
		echo "<p>Ticket Table is dropped successfully!</p>";
	}

	$createticket="CREATE table Ticket
		(
			ticketid int Auto_Increment not null primary key,
			to_place varchar(50),
			from_place varchar(50),
			tripdate date,
			triptime varchar(30),
			companyname varchar(50),
			price int,
			quantity int,
			description varchar(255)
		)" ;
	$runcreateticket=mysqli_query($connection,$createticket);
	if ($runcreateticket) {
		echo "<p>Ticket Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertticket="INSERT into Ticket values(1,'Bagan','Yangon','2020/7/20','9:00 PM','Mandalar Minn Highway Express Company',50000,20,'It is available before July 7')";
	$runinsertticket=mysqli_query($connection,$insertticket);
	if ($runinsertticket) {
		echo "<p>A new ticket is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>