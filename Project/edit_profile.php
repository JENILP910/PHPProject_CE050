<?php
	require('includes/database.php');
	$id =$_REQUEST['user_id'];

	$result = mysqli_query($link, "SELECT * FROM user WHERE user_id  = " . $id) or die("Error:".mysqli_error());
	if (!$result){
		die("Error: Data not found..");
	}
	else{
		$test = mysqli_fetch_array($result);
		$firstname=$test['firstname'];
		$lastname=$test['lastname'];
		$username=$test['username'];
		$birthday=$test['birthday'];
		$gender=$test['gender'];
		$number=$test['number'];

		if(isset($_POST['save'])){
			$first_save=$_POST['firstname'];
			$last_save=$_POST['lastname'];
			$username_save=$_POST['username'];
			$birthday_save=$_POST['birthday'];
			$gender_save=$_POST['gender'];
			$number_save=$_POST['number'];

			mysqli_query($link, "UPDATE user SET firstname ='" . $first_save . "', lastname ='" . $last_save . "', username ='" . $username_save . "', birthday ='" . $birthday_save . "' , gender ='" . $gender_save . "', number ='". $number_save . "' WHERE user_id = ". $id)
						or die(mysqli_error()); 
			// echo "Saved!";
			echo "<script> window.alert(\"Profile updated successfully!\");
					history.go(-2);</script>";
			
			// header("Location: profile.php");
		}
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Social Networking Site</title>
		<link rel="stylesheet" type="text/css" href="css/edit_profile.css">
	</head>

	<body onload="selectfun()">
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
				<form method="post">
					<fieldset>
						<legend><h1>Edit Info</h1></legend>
						<table cellpadding="5" cellspacing="5">
							<tr>
								<td><label>First name</label></td>
								<td><label>Last name</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="firstname" value="<?php echo $firstname; ?>" placeholder="Enter your firstname" class="form-1" title="Enter your firstname" required />
								</td>
								<td>
									<input type="text" name="lastname" value="<?php echo $lastname; ?>" placeholder="Enter your lastname" class="form-1" title="Enter your lastname" required />
								</td>
							</tr>
							<tr>
								<td><label>User name</label></td>
							</tr>
							<tr>
								<td>
									<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter your username" class="form-1" title="Enter your username" required />
								</td>
							</tr>
						</table>
					</fieldset>
					<br/>
					<fieldset>
						<legend><h1>Personal Info</h1></legend>
						<table cellpadding="5" cellspacing="5">
							<tr>
								<td><label>Birthday</label></td>
								<td>
									<input type="Date" name="birthday" value='<?php echo $birthday; ?>' class="form-1" title="Enter your birthday" placeholder="dd-mm-yyyy" min='01-Jan-1997' max='31-Dec-2030' required />
								</td>
							</tr>
							<tr>
								<td><label>Gender</label></td>
								<td>

									<select name="gender" class="form-1" id="iselect" title="Select gender" required>
										<option>Select gender</option>
										<option>Male</option>
										<option>Female</option>
									</select>
									<!-- <div id="aa"></div> document.getElementById('aa').innerHTML='abcd';-->
									<?php echo "
										<script type=\"text/javascript\">
											function selectfun(){
											var sel = '" . $gender . "';
											if(sel === 'Male'){
												document.getElementById('iselect').selectedIndex = '1';
											}
											else
												document.getElementById('iselect').selectedIndex = '2';
											}
										</script>
									"?>
								</td>
							</tr>
							<tr>
								<td><label>Mobile number</label></td>
								<td>
									<input type="text" name="number" value="<?php echo $number; ?>" placeholder="1234567890" maxlength="13" class="form-1" title="Enter your mobile number" required />
								</td>
							</tr>
						</table>
					</fieldset>
					<br/>
					<button type="submit" name="save" class="">Save</button>
				</form>
			</div>
		</div>
	</body>

</html>