<?php 
	include('../connect.php');
	$dropbookingticket="Drop table BookingTicket";
	$rundropbookingticket=mysqli_query($connection,$dropbookingticket);
	if ($rundropbookingticket) {
		echo "<p>BookingTicket Table is dropped successfully!</p>";
	}

	$createbookingticket="CREATE table BookingTicket
		(
			bookingticketid varchar(50) not null primary key,
			customerid int,
			ticketid int,
			amount int,
			unitprice int,
			paymenttype varchar(20),
			totalprice int,
			foreign key(customerid) references Customer(customerid),
			foreign key(ticketid) references Ticket(ticketid)
		)" ;
	$runcreatebookingticket=mysqli_query($connection,$createbookingticket);
	if ($runcreatebookingticket) {
		echo "<p>Booking Ticket Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

 ?>