<?php
include('header.php');

?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Theatre Assistance
      </h1>
      <ol class="breadcrumb">
        <li><a href="view_movie.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-body">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Movies</h3>
            </div>
            <!-- /.box-header -->
			
   <?php

   $select = mysqli_query($con, "SELECT * FROM tbl_movie");
   
   ?>
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                 <th>movie name</th>
				  <th>cast</th>
				  <th>Release Date</th>
                </tr>
                 <?php while($row = mysqli_fetch_assoc($select)){ ?>
                <tr>
			<td><?php echo $row['movie_name']; ?></td>
          <td><?php echo $row['cast']; ?></td>
		  <td><?php echo $row['release_date']; ?></td>
                

                  </tr>
				  
                   <?php } ?>
              </table>
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
  <?php
include('footer.php');
?>