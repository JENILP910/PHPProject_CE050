<!DOCTYPE html>
<html>
	<head>
		<title>Social Networking Site</title>
		<link rel="stylesheet" type="text/css" href="css/profile.css">
	</head>

	<body>
<?php
		include ('session.php');
		include("includes/database.php");
?>
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
							<label class="active">Profile</label>
						</a>
					</li>
					<li>
						<a href="photos.php" title="Settings">
							<label>Photos</label>
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
						<a href="updatephoto.php" title="Change Profile Picture">
							<img src="<?php echo $row['profile_pic'] ?>" title="Your Profile Picture">
							&nbsp;
							<button>Change Profile Pic</button>
						</a>
					</div>

					<div class="user-details">
						<!-- <h3><?php echo $firstname ?>&nbsp;<?php echo $lastname ?></h3> -->
						<h2><?php echo $username ?></h2>
						<h2><?php echo $row['email'] ?></h2>
					</div>
			</div>
			
			
			
			<div id="right-nav">
				<h1><u style="text-decoration-color: lightblue; color: orange">Personal Info</u></h1>
				<hr />
				<br />
<?php
				include('includes/database.php');

				$result=mysqli_query($link, "SELECT * FROM user where user_id='$id' ")or die("Error:".mysqli_error());
				
				while($test = mysqli_fetch_array($result)){
					$id = $test['user_id'];
?>
					<div class='info-user'>
						<div>
							<label>Firstname</label>
							&nbsp;&nbsp;&nbsp;
							<b> <?php echo $test['firstname'] ?> </b>
						</div>
						<hr/>		
						<br/>	
						<div>
							<label>Lastname</label>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<b> <?php echo $test['lastname'] ?> </b>
						</div>
						<hr />
						<br />
						<div>
							<label>Username</label>
							&nbsp;&nbsp;&nbsp;
							<b>
								<?php echo $test['username'] ?>
							</b>
						</div>
						<hr/>
						<br/>	
						<div>
							<label>Birthday</label>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<b>
								<?php echo $test['birthday'] ?>
							</b>
						</div>
						<hr/>
						<br/>
						<div>
							<label>Gender</label>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<b> <?php echo $test['gender'] ?> </b>
						</div>
						<hr/>
						<br/> 
						<div>
							<label>Number</label>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<b> <?php echo $test['number'] ?> </b>
						</div>
						<hr/>
						<br/>
					</div>
					<br/>	
					<div class='edit-info'>
						<!-- <?php echo $id ?> -->
						<a href = "edit_profile.php<?php echo '?user_id='.$id; ?>" title="Edit Your Profile">
							<button>Edit Profile</button>
						</a>
					</div>
					<br/>
					<br/>
<?php
				}
?>
				
			</div>
		</div>
	</body>
</html>