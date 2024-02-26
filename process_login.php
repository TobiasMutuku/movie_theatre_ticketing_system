<?php
include('config.php');
session_start();
$email = $_POST["Email"];
$password = $_POST["Password"];
$password = md5($password);
$qry=mysqli_query($con,"select * from tbl_login where username='$email' and password='$password'");
if(mysqli_num_rows($qry))
{
	$usr=mysqli_fetch_array($qry);
	if($usr['user_type']==2)
	{
		$_SESSION['user']=$usr['user_id'];
		if(isset($_SESSION['show']))
		{
			header('location:booking.php');
		}
		else
		{
			echo'<script>
alert("Logged in Successfully.");
window.location = "index.php";
</script>';
			
		}
	}
	else
	{
		$_SESSION['error']="Login Failed!";
		header("location:login.php");
	}
	
}
else
{
	$_SESSION['error']="Login Failed!";
	header("location:login.php");
	
}

?>
<script>
alert("Logged in Successfully.");
window.location = "index.php";
</script>