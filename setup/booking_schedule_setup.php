<?php 
	include('../connect.php');
	$dropbookingschedule="Drop table BookingSchedule";
	$rundropbookingschedule=mysqli_query($connection,$dropbookingschedule);
	if ($rundropbookingschedule) {
		echo "<p>BookingSchedule Table is dropped successfully!</p>";
	}

	$createbookingschedule="CREATE table BookingSchedule
		(
			bookingscheduleid varchar(50) not null primary key,
			customerid int,
			scheduleid int,
			charactertogo int,
			promotionid int,
			paymenttype varchar(20),
			unitprice int,
			totalprice int,
			tax int,
			amounttobepaid int,
			paid boolean,
			foreign key(customerid) references Customer(customerid),
			foreign key(scheduleid) references Schedule(scheduleid),
			foreign key(promotionid) references Promotion(promotionid)
		)" ;
	$runcreatebookingschedule=mysqli_query($connection,$createbookingschedule);
	if ($runcreatebookingschedule) {
		echo "<p>Booking Schedule Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	// $insertbookingschedule="INSERT into BookingSchedule values('BS-000001','1','1',2,null,'visa',100000,200000,1000,201000,'true')";
	// $runinsertbookingschedule=mysqli_query($connection,$insertbookingschedule);
	// if ($runinsertbookingschedule) {
	// 	echo "<p>A new booking is inserted successfully to the database!</p>";
	// }else{
	// 	echo mysqli_error($connection);
	// }
 ?>