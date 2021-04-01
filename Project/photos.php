<!DOCTYPE html>
<html>
	<head>
		<title>Social Networking Site</title>
		<link rel="stylesheet" type="text/css" href="css/photos.css">
	</head>
	<body>
	<?php include ('session.php');?>

		<div id="header">
			<div class="head-view">
				<ul>
					<li>
						<a href="home1.php" title="Biobook">
							<b>Social Networking Site</b>
					</a>
					</li>
					<li id="marli">
						<a href="home1.php" title="Home">
							<label>Home</label>
						</a>
					</li>
					<li>
						<a href="profile.php" title="Profile">
							<label>Profile</label>
						</a>
					</li>
					<li>
						<a href="photos.php" title="Settings">
							<label class="active">Gallery</label>
						</a>
					</li>
					<li>
						<a href="logout.php" title="Log out">
							<button class="btn-sign-out" value="Log out">Log out</button>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div id="container">
				<div id="left-nav">
					<div class="clip1">
					<a href="updatephoto.php" title="Change Profile Picture"><img src="<?php echo $row['profile_pic'] ?>"></a>
					</div>
					
					<div class="user-details">
						<h2><?php echo $username ?></h2>
						<h2><?php echo $row['email'] ?></h2>
					</div>
				<!-- </div> -->
				
	<?php
				include("includes/database.php");
				$query=mysqli_query($link, "SELECT * from user where user_id= " .$id . " order by user_id DESC") or die(mysql_error());
				while($row=mysqli_fetch_array($query)){
					$id = $row['user_id'];
	?>
				<div id="left-nav" >
					<h2 id="lh2">Personal Info</h2>
					<table>
						<tr>
							<td><label>Username</label></td>
							<td width="20">:</td>
							<td>
								<b><?php echo $row['username']; ?></b>
							</td>
						</tr>
						<tr>
							<td><label>Birthday</label></td>
							<td width="20">:</td>
							<td><b><?php echo $row['birthday']; ?></b></td>
						</tr>
						<tr>
							<td><label>Gender</label></td>
							<td width="20">:</td>
							<td><b><?php echo $row['gender']; ?></b></td>
						</tr>
						<tr>
							<td><label>Contact</label></td>
							<td width="20">:</td>
							<td><b><?php echo $row['number']; ?></b></td>
						</tr>
						<tr>
							<td><label>Email</label></td>
							<td width="20">:</td>
							<td><b><?php echo $row['email']; ?></b></td>
						</tr>
					</table>
	<?php
			}
	?>
				</div>		
			</div>
			
			<div id="right-nav">
				<!-- <div> -->
					<h1 style="">New Post</h1>
					<form method="post" action="post.php" enctype="multipart/form-data" id="postform">
						<input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;" required>

						<img id="output"/>

						<label for="file" style="cursor: pointer; margin-left:320px; border:3px solid #73cfff;">Upload Image</label>
						<input type="button" id="reset" value="Reset" onclick="resetimg()" />

						<textarea placeholder="What's on your mind?" name="content" class="post-text" required></textarea>
						<button class="btn-share" name="Submit" value="Log out">Share</button>
					</form>
					<script>
						var loadFile = function(event) {
							var image = document.getElementById('output');
							image.src = URL.createObjectURL(event.target.files[0]);
							image.width = "300";
							image.height = "180";
							image.style.display = "block";
							document.getElementById('padal').style.display = "block";

						};
						function resetimg() {
							var image = document.getElementById('output');
							image.width = "0";
							image.height = "0";
							image.style.display = "none";
							document.getElementById('padal').style.display = "none";
							document.getElementById("file").value = "";
						};
					</script>
					<hr/>
				<!-- </div> -->
				<h1>Your Gallery</h1>
	<?php
				include("includes/database.php");
				$query=mysqli_query($link, "SELECT * from post where user_id= " . $id ) or die(mySQL_error());
				while($row=mysqli_fetch_array($query)){
					$id = $row['post_id'];
		?>

				<div class="photo-select">
					<center>
						<img src="<?php echo $row['post_image']; ?>" />
						<hr>
						<a href="delete_post.php<?php echo '?id='.$id; ?>">
							<button id="btn-delete-photos" name="Submit" value="Log out">Delete
							</button>
						</a>
					</center>
				</div>
	<?php
	}
	?>
			</div>
		</div>
		<div style="display: flex; position: all;width: 100%; height: 200px"></div>
	</body>

</html>