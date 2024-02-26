<?php
include('../../config.php');
session_start();
$username = $_POST["Username"];
$password = $_POST["Password"];
$password = md5($password);
$qry=mysqli_query($con,"select * from tbl_login where username='$username' and password='$password'");
if(mysqli_num_rows($qry))
{
	$usr=mysqli_fetch_array($qry);
	if($usr['user_type']==0)
	{
		$_SESSION['admin']=$usr['user_id'];
		echo'<script>
alert("Welcome Admin.");
window.location = "index.php";
</script>';
	}
	else
	{
		$_SESSION['error']="Login Failed!";
		header("location:../index.php");
	}
}
else
{
	$_SESSION['error']="Login Failed!";
	header("location:../index.php");
}
?>