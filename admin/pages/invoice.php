<?php
include('config.php');
$id = $_GET['print'];
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ONLINE MOVIE THEATRE TICKETING SYSTEM INVOICE</title>
        
        <link rel="stylesheet" type="text/css" href="css/invoice.css">
    </head>
    <body>

				 <?php

   $select = mysqli_query($con, "SELECT * FROM tbl_bookings where ticket_id='$id'");
   
   ?>
					
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="image/t-logo.png" style="width:100%; max-width:300px;">
                                </td>
                                <?php while($bkg = mysqli_fetch_assoc($select)){
                                      {
							$u=mysqli_query($con,"select * from tbl_registration where user_id='".$bkg['user_id']."'");
							$row=mysqli_fetch_array($u);
							$m=mysqli_query($con,"select * from tbl_movie where movie_id=(select movie_id from tbl_shows where s_id='".$bkg['show_id']."')");
							$mov=mysqli_fetch_array($m);
							$s=mysqli_query($con,"select * from tbl_screens where screen_id='".$bkg['screen_id']."'");
							$srn=mysqli_fetch_array($s);
							$tt=mysqli_query($con,"select * from tbl_theatre where id='".$bkg['t_id']."'");
							$thr=mysqli_fetch_array($tt);
							$st=mysqli_query($con,"select * from tbl_show_time where st_id=(select st_id from tbl_shows where s_id='".$bkg['show_id']."')");
							$stm=mysqli_fetch_array($st);
							?>

							

                                <td>
                                    Invoice #: <?php echo $bkg['book_id'];?><br>
                                    Created: <?php echo date("d-m-Y");?><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
				   <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                   Ticket number:<?php echo $bkg['ticket_id'];?>
                                </td>
								<td>
								
								
                                Booked by:<?php echo $row['name'];?><br>
                                    
                                </td>
								</tr>
                        </table>
                    </td>
                </tr>
				 
                <tr class="heading">
                    <td>
                        Booking Details
                    </td>
                    
                    <td>
                        #
                    </td>
                </tr>
                
                <tr class="item">
                    <td>
                        Booking ID
                    </td>
                    
                    <td>
                       <?php echo $bkg['book_id'];?>
                    </td>
                </tr>
				  <tr class="item">
                    <td>
                        User Phone Number
                    </td>
                    
                    <td>
                      <?php echo $row['phone'];?><br>
                    </td>
                </tr>

                 </tr>
				  <tr class="item">
                    <td>
                        Movie Name
                    </td>
                    
                    <td>
                        <?php echo $mov['movie_name'];?>
                    </td>
                </tr>
				 <tr class="item">
                    <td>
                        Theatre Name
                    </td>
                    
                    <td>
                        <?php echo $thr['name'];?>
                    </td>
                </tr>
				 <tr class="item">
                    <td>
                        Screen Name
                    </td>
                    
                    <td>
                        <?php echo $srn['screen_name'];?>
                    </td>
                </tr>
				 <tr class="item">
                    <td>
                        Show Time
                    </td>
                    
                    <td>
                        <?php echo $stm['name'];?>
                    </td>
                </tr>
				 <tr class="item">
                    <td>
                        Seats
                    </td>
                    
                    <td>
                        <?php echo $bkg['no_seats'];?>
                    </td>
                </tr>
				 <tr class="item">
                    <td>
                        Amount
                    </td>
                    
                    <td>
                        <?php echo $bkg['amount'];?>
                    </td>
                </tr>
				 <tr class="item">
                    <td>
                        Booking Date
                    </td>
                    
                    <td>
                        <?php echo $bkg['date'];?>
                    </td>
                </tr>
				 <tr class="item">
                    <td>
                        Ticket Date
                    </td>
                    
                    <td>
                        <?php echo $bkg['ticket_date'];?>
                    </td>
                </tr>
				
                 <?php }
								}				 ?>
								      
            </table>
        </div>
        <div class="print">
        <button onclick="myFunction()">Print this page</button>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
    </body>