<?php
	include("includes/database.php");
	
	session_start();
	if (!isset($_SESSION['id']))
		echo "<script>alert('Login First/Again To Access!'); window.location='signin.php'</script>";
		// header('location:index.php');

	$id = $_SESSION['id'];

	$query=mysqli_query ($link, "SELECT * FROM user WHERE user_id ='" . $id . "'") or die(mysql_error());
	$row=mysqli_fetch_array($query);

	if($row >0 ){
		$cover_picture=$row['cover_pic'];
		$profile_picture=$row['profile_pic'];
		
		$firstname=$row['firstname'];
		$lastname=$row['lastname'];
		$username=$row['username'];
	}
	else
		echo "Something Went Wrong!";
?>