<?php
include('header.php');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the selected date from the form
  $booking_date = $_POST['booking_date'];
}
  // Check if any bookings were found
 $select=mysqli_query($con,"select * from tbl_bookings where date='$booking_date'");
 if(mysqli_num_rows($select)){
				
       echo"<h2>Report for $booking_date:</h2>";
 }
	   ?>
    <div class="box-body no-padding">
     <table class="table table-condensed">
    <tr><th>Ticket Number</th><th>User</th><th>Movie</th><th>Theatre</th><th>Screen</th><th>Show</th><th>Seats</th><th>Amount</th><th>Ticket date</th><th class="col-md-1">Print</th></tr>
     <?php while($row=mysqli_fetch_array($select))
						{
							$u=mysqli_query($con,"select * from tbl_registration where user_id='".$row['user_id']."'");
							$user=mysqli_fetch_array($u);
							$m=mysqli_query($con,"select * from tbl_movie where movie_id=(select movie_id from tbl_shows where s_id='".$row['show_id']."')");
							$mov=mysqli_fetch_array($m);
							$s=mysqli_query($con,"select * from tbl_screens where screen_id='".$row['screen_id']."'");
							$srn=mysqli_fetch_array($s);
							$tt=mysqli_query($con,"select * from tbl_theatre where id='".$row['t_id']."'");
							$thr=mysqli_fetch_array($tt);
							$st=mysqli_query($con,"select * from tbl_show_time where st_id=(select st_id from tbl_shows where s_id='".$row['show_id']."')");
							$stm=mysqli_fetch_array($st);
												?>
							<tr>
							
								<td>
									<?php echo $row['ticket_id'];?>
								</td>
								<td>
									<?php echo $user['name'];?>
								</td>
								<td>
									<?php echo $mov['movie_name'];?>
								</td>
								<td>
									<?php echo $thr['name'];?>
								</td>
								<td>
									<?php echo $srn['screen_name'];?>
								</td>
								<td>
									<?php echo $stm['name'];?>
								</td>
								<td>
									<?php echo $row['no_seats'];?>
								</td>
								<td>
									Kes. <?php echo $row['amount'];?>
								</td>
								<td>
									<?php echo $row['ticket_date'];?>
								</td>
												 <td>
               <a href="invoice_cancel.php?print=<?php echo $row['ticket_id']; ?>" class="btn"> <i class="fas fa-trash"></i> print </a>
            </td>
									<?php
						}
				
						?>
							
				
   </table>
  
   </div>
   </div>
		 <?php
include('footer.php');
?>	
 