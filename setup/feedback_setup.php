<?php 
	include('../connect.php');
	$dropfeedback="Drop table Feedback";
	$rundropfeedback=mysqli_query($connection,$dropfeedback);
	if ($rundropfeedback) {
		echo "<p>Feedback Table is dropped successfully!</p>";
	}

	$createfeedback="CREATE table Feedback
		(
			feedbackid int Auto_Increment not null primary key,
			feedback varchar(255),
			customerid int,
			foreign key(customerid) references Customer(customerid)
		)" ;
	$runcreatefeedback=mysqli_query($connection,$createfeedback);
	if ($runcreatefeedback) {
		echo "<p>Feedback Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertfeedback="INSERT into Feedback values(1,'This website is so interactive. It gives us satisfaction!',1)";
	$runinsertfeedback=mysqli_query($connection,$insertfeedback);
	if ($runinsertfeedback) {
		echo "<p>A new feedback is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
 ?>