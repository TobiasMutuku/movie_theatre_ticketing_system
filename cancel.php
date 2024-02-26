<?php
session_start();
include('config.php');
// Get the booking information from the database
$result = mysqli_query($con, "SELECT * FROM tbl_bookings WHERE book_id='".$_GET['id']."'");
$booking = mysqli_fetch_assoc($result);

// Update the booking status to "Cancelled"
mysqli_query($con, "UPDATE tbl_bookings SET status='Cancelled' WHERE book_id='".$_GET['id']."'");

// Set a success message in the session variable
$_SESSION['success'] = "Booking Cancelled Successfully";

// Redirect to the profile page
header('location:canceled.php');

?>