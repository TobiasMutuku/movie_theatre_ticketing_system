<?php
include('header.php');
if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   $sql="SELECT COUNT(*) as num_tbl_shows FROM tbl_shows WHERE movie_id=$id";
   $result=mysqli_query($con, $sql);
   $row=mysqli_fetch_assoc($result);
   $num_tbl_shows=$row['num_tbl_shows'];
   if($num_tbl_shows>0){
	   echo'<script>
alert("Cannot delete movie with shows added");
window.location = "deletemovie.php";
</script>';
   }else{
	   $sql="DELETE FROM tbl_movie WHERE movie_id=$id";
	   mysqli_query($con, $sql);
	    echo'<script>
alert("Movie deleted successfully");
window.location = "deletemovie.php";
</script>';
	   
   }
};

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
        <li><a href="deletemovie.php"><i class="fa fa-dashboard"></i> Home</a></li>
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
                
                 <th>action</th>
                </tr>
                 <?php while($row = mysqli_fetch_assoc($select)){ ?>
                <tr>
			<td><?php echo $row['movie_name']; ?></td>
             <td>
                <a href="deletemovie.php?delete=<?php echo $row['movie_id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
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