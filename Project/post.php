<?php
	include('includes/database.php');
	include('session.php');
							
	if (!isset($_FILES['image']['tmp_name'])) {
		echo "Something Went Wrong!";
	}
	else{
		$file=$_FILES['image']['tmp_name'];
		$image = $_FILES["image"] ["name"];
		$image_name= addslashes($_FILES['image']['name']);
		$size = $_FILES["image"] ["size"];
		$error = $_FILES["image"] ["error"];

		if($error > 0)
			die("Error uploading file! Error Code " . $error);
		else{
			if($size > 10485760)	//conditions for the file
				die("Format is not allowed or file size is too big! (max. size = 10mb)");
			else{
				move_uploaded_file($_FILES["image"]["tmp_name"],"upload/".$_FILES["image"]["name"]);

				$location="upload/" . $_FILES["image"]["name"];
				$user=$_SESSION['id'];
				$contents=$_POST['content'];
				$time=time();

				// echo $contents;
				date_default_timezone_set("Asia/Kolkata");
				$time = date_create();
				$time = date_format($time,"Y-m-d H:i:s");
				// echo  $time . "<br>";
				// echo gettype($time);
				$newpost = mysqli_query($link, 
					"INSERT INTO post (user_id, post_image, content, created) VALUES ('" . $id . "', '" . $location . "', '" . $contents . "', '". $time . "')") or die ("Error: " . mysqli_error());
					// "INSERT INTO post (post_id, user_id, post_image, content, created) VALUES (1 , '" . $id . "', '" . $location . "', '" . $contents . "', '" . $time . "')") or die ("Error: " . mysqli_error());
			}
			// header('location:home1.php');
			echo "<script> window.alert(\"Posted successfully!\");
					history.go(-1);</script>";
		}
	}
?>