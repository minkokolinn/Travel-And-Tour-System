<?php 
	include('../connect.php');
	include('menu_main_admin.php');

	if (isset($_REQUEST['tid'])) {
		$ticketid=$_REQUEST['tid'];
		$selectticket="SELECT * FROM Ticket where ticketid='$ticketid'";
		$runselectticket=mysqli_query($connection,$selectticket);
		if ($runselectticket) {
			$data=mysqli_fetch_array($runselectticket);
			$ticketto=$data['to_place'];
			$ticketfrom=$data['from_place'];
			$tickettripdate=$data['tripdate'];
      $tickettriptime=$data['triptime'];
      $ticketcompanyname=$data['companyname'];
      $ticketprice=$data['price'];
      $ticketquantity=$data['quantity'];
      $ticketdescription=$data['description'];
		}
	}

	if (isset($_POST['btnticketupdate'])) {
    $tid=$_POST['txtticketid'];
		$tto=$_POST['txtticketto'];
		$tfrom=$_POST['txtticketfrom'];
		$ttripdate=$_POST['txttickettripdate'];
    $ttriptime=$_POST['txttickettriptime'];
    $tcompanyname=$_POST['txtticketcompanyname'];
    $tprice=$_POST['txtticketprice'];
    $tquantity=$_POST['txtticketquantity'];
    $tdescription=$_POST['txtticketdescription'];

		$updateticket="UPDATE Ticket set to_place='$tto',from_place='$tfrom',tripdate='$ttripdate',triptime='$ttriptime',companyname='$tcompanyname',price='$tprice',quantity='$tquantity',description='$tdescription' where ticketid='$tid'";
		$runupdateticket=mysqli_query($connection,$updateticket);
		if ($runupdateticket) {
			echo "<script>window.alert('Ticket Update Successfully')</script>";
			echo "<script>window.location='ticket.php'</script>";
		}else{
			echo mysqli_error($connection);
          echo "<script>window.alert('Run update ticket query failed!')</script>";
		}
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<section class="site-section bg-light bg-image">
    	<br><br>
      <div class="container">
        <div class="row">
        	<div class="col-md-3">
        		
        	</div>
          <div class="col-md-6 mb-0" data-aos="fade-up" data-aos-once="false">

            <form action="" class="p-5 bg-white" method="post" action="package_type_update.php">
              
              <center><h2 class="h4 text-black mb-3">Update To Ticket Information!</h2></center>

              <input type="hidden" name="txtticketid" value="<?php echo $ticketid ?>">
              
              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">To</label>
                  <input type="text" class="form-control" name="txtticketto" value="<?php echo $ticketto ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">From</label>
                  <input type="text" class="form-control" name="txtticketfrom" value="<?php echo $ticketfrom ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Trip Date</label>
                  <input type="date" class="form-control" name="txttickettripdate" value="<?php echo $tickettripdate ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Trip Time</label>
                  <input type="text" class="form-control" name="txttickettriptime" value="<?php echo $tickettriptime ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Company Name</label>
                  <input type="text" class="form-control" name="txtticketcompanyname" value="<?php echo $ticketcompanyname ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Unit Price</label>
                  <input type="number" class="form-control" name="txtticketprice" value="<?php echo $ticketprice ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Quantity</label>
                  <input type="number" class="form-control" name="txtticketquantity" value="<?php echo $ticketquantity ?>" required>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12 mb-0 mb-md-0">
                  <label class="text-black">Description</label><br>
                  <textarea name="txtticketdescription" class="col-12" rows="5"><?php echo $ticketdescription; ?></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-4 col-3">
                  <input type="submit" value="Update" class="button button-contactForm boxed-btn" name="btnticketupdate">
                </div>
                <div class="col-md-1 col-3">
                	
                </div>
                <div class="col-md-4 col-3">
                	<a href="ticket.php">
              			<button type="button" class="button button-contactForm boxed-btn">Back</button>
            		</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <br><br>
    </section>
 </body>
 </html>

 <?php 
 	include('footer.php');
  ?>