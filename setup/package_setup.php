<?php 
	include('../connect.php');
	$droppackage="Drop table Package";
	$rundroppackage=mysqli_query($connection,$droppackage);
	if ($rundroppackage) {
		echo "<p>Package Table is dropped successfully!</p>";
	}

	$createpackage="CREATE table Package
		(
			packageid int Auto_Increment not null primary key,
			packagename varchar(50),
			places varchar(50),
			departure_place varchar(30),
			arrival_place varchar(30),
			estimated_duration varchar(50),
			price int,
			short_description varchar(100),
			detail_description varchar(255),
			package_img1 text,
			package_img2 text,
			package_img3 text,
			packagetypeid int,
			foreign key(packagetypeid) references PackageType(packagetypeid)
		)" ;
	$runcreatepackage=mysqli_query($connection,$createpackage);
	if ($runcreatepackage) {
		echo "<p>Package Table is created successfully!</p>";
	}else{
		echo mysqli_error($connection);
	}

	$insertpackage="INSERT into Package values(1,'Bagan Package','Bagan, Nyaung Oo, Poppa','Yangon','Bagan','1 week',500000,'A type of historical package. It can be a member of cultural and heritage.','Bagan, Myanmar is a plain covering about 16 square meters and its monuments seem to overwhelm its landscape. The 2000 monuments in the region have different sizes and shapes. The Temples and Pagodas were constructed between the 11th and 13th centuries. Find this Pin and more on World by Mapsofindia.','image/bagan.jpg','image/bd2.jpg','image/bd3.jpg',1)";
	$runinsertpackage=mysqli_query($connection,$insertpackage);
	if ($runinsertpackage) {
		echo "<p>A new package is inserted successfully to the database!</p>";
	}else{
		echo mysqli_error($connection);
	}
	
 ?>