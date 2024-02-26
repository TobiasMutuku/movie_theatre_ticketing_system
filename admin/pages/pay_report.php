<?php
include('header.php');

?>
<link rel="stylesheet" href="../../validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="../../validation/dist/js/bootstrapValidator.js"></script>
  <!-- =============================================== -->
  <?php
    include('../../form.php');
    $frm=new formBuilder;      
  ?>    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
		Payments
      </h1>
      <ol class="breadcrumb">
        <li><a href="view_bookings.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Payments</li>
      </ol>
    </section>
	 <!-- Default box --> 
      <div class="box">
        <div class="box-body">
            
        

            <!-- /.box-header -->
					<?php
				$bk=mysqli_query($con,"select * from tbl_bookings where status='1'");
				if(mysqli_num_rows($bk))
				{
					 $totalAmount = 0; // Initialize total amount variable
					?>
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  
                  <th class="col-md-1">Movie </th>
                  <th class="col-md-1">Theatre</th>
                  <th class="col-md-1">Screen</th>
				  <th class="col-md-1">Show</th>
				  <th class="col-md-1">Seats</th>
				 <th class="col-md-1">Amount</th>
				  <th class="col-md-1">Booking date</th>
				   
				 
                </tr>

    <?php
						while($bkg=mysqli_fetch_array($bk))
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
							<tr>
							
								
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
									<?php echo $bkg['no_seats'];?>
								</td>
								<td>
									Kes. <?php echo $bkg['amount'];?>
								</td>
								<td>
								 <?php echo $bkg['date'];?>
								</td>
							<?php
                    $totalAmount += $bkg['amount']; // Add current booking amount to total amount
                }
	}
	?>
<?php
if(mysqli_num_rows($bk)) {
    // Your existing code here
    ?>
    <table class="table table-condensed">
        <!-- Your existing table code here -->
    </table><br>
    <!-- /.box-body -->
<div></div>
    Total Earnings: Kes. <?php echo $totalAmount; ?> <!-- display total amount -->
    <?php
}
?>
 </div>
            <!-- /.box-body -->
          </div>
            
            
        </div> 
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

			<?php include('footer.php');?>

