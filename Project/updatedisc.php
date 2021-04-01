
<?php
	include ('includes/database.php');
	session_start();
	if(isset($_POST['submit'])){
		$discript = $_POST['disc'];

		if($discript == "")
			$discript = "Having wonderful days.";
		// echo $discript;
		// echo $_SESSION['id'];
		$result = mysqli_query($link, "UPDATE user SET discription = '" . $discript . "' WHERE user_id = " . $_SESSION['id']) or die("Error : ". mysqli_error());

		echo "<script> alert('discription successfully Changed!'); window.location='home1.php'</script>";
	}
?>