<!DOCTYPE html>
<html>
	<head>
		<title>Social Networking Site</title>
		<link rel="stylesheet" type="text/css" href="css/updateph.css">
	</head>

	<body>
<?php include ('session.php');?>

	<form method="post" enctype="multipart/form-data">
		<div id="iform">
			<img id="output"/>
			<br>
			<input type="file" name="image" accept="image/*" id="ifile" onchange="loadFile(event)" title="Select Profile picture" required>
			<div class="fdiv"></div>
			<br>
			<input type="submit" id="sbutton" value="save" name="image" placeholder="Submit"  style="margin-left: 65px;" onclick="done()" />
			<input type="button" id="sbutton" value="Reset" placeholder="Reset Form" onclick="resetimg()" style="margin-left: 16px;"/>
		</div>

		<script>
			var loadFile = function(event) {
				var image = document.getElementById('output');
				image.src = URL.createObjectURL(event.target.files[0]);
				image.width = "340";
				image.height = "220";
				image.style.display = "block";
			};
			function resetimg() {
				var image = document.getElementById('output');
				image.width = "0";
				image.height = "0";
				image.style.display = "none";
				document.createElement('ifile').value=" ";
			};
		</script>
<?php
		include ('includes/database.php');
		
		if (!isset($_FILES['image']['tmp_name'])) {
			echo ""; //Anonymous Error
		}
		else{
			$file=$_FILES['image']['tmp_name'];
			$image = $_FILES["image"] ["name"];
			$image_name= addslashes($_FILES['image']['name']);
			$size = $_FILES["image"] ["size"];
			$error = $_FILES["image"] ["error"];

			if ($error > 0){
				die("Error uploading file! Code". $error);
			}
			else{
				if($size > 10000000){ //conditions for the file
					die("Format is not allowed or file size is too big!");
				}
				else{
					move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" .$_FILES["image"]["name"]);
					$location="upload/" . $_FILES["image"]["name"];
					$user=$_SESSION['id'];
					// echo $user;
					// $update=mysqli_query($link, "UPDATE user SET profile_pic = '" . $location . "' WHERE user_id= ". $user);
					
					// $update1=mysqli_query($link, "UPDATE comments SET image = '" . $location . "' WHERE user_id= " . $user);
				
					echo "<script> window.alert(\"Profile picture updated successfully!\"); history.go(-2);</script>";
					// header('location:profile.php');
				}
			}
		}
?>
	
	</form>
</body>

</html>