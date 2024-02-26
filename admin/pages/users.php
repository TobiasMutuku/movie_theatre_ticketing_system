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
       Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="users.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>
	 <!-- Default box --> 
      <div class="box">
        <div class="box-body">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
			
   <?php

   $select = mysqli_query($con, "SELECT * FROM tbl_registration");
   
   ?>
     <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th class="col-md-2">Name</th>
                  <th class="col-md-2">Email</th>
                  <th class="col-md-2">Phone</th>
                  <th class="col-md-2">Age</th>
				  <th class="col-md-2">Gender</th>
                </tr>
				 <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['age']; ?></td>
			<td><?php echo $row['gender']; ?></td>
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