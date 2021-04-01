<!DOCTYPE html>
<html>
	<head>
		<title>Social Networking Sign Up</title>
		<link rel="stylesheet" type="text/css" href="css/signup.css">
	</head>
	<body>
		<div id="container" class="sign-in-form">
			<center>	
				<h1>Welcome to Social Networking Site</h1>
			</center>

			<h2>Sign Up Portal</h2>
			<b>All fields are required**</b>
			<br>

			<form method="post" action="signup_form.php" enctype="multipart/form-data">
				<fieldset class="sign-up-form-1">
					<legend>Profile Information</legend>
					<table cellpadding="5" cellspacing="5">
						<tr>
							<td><label>First name*</label></td>
							<td><label>Last name *</label></td>
						</tr>
						<tr>
							<td>
								<input type="text" name="firstname" placeholder="Enter your firstname" class="form-1" title="Enter your firstname" required />
							</td>
							<td>
								<input type="text" name="lastname" placeholder="Enter your lastname" class="form-1" title="Enter your lastname" required />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<label style="padding-left: 40%">User name*</label>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="padding-left: 27%">
								<input type="text" name="username" placeholder="Enter your username" class="form-1" title="Enter your username" required />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<label style="color: red; text-decoration: none;">Note: </label>
								 No one can have your username.
							</td>
						</tr>
					</table>
				</fieldset>
				
				<br>	
				
				<fieldset class="sign-up-form-1">
					<legend>Personal Information</legend>
					<table cellpadding="5" cellspacing="5">
						<tr>
							<td><label>Birthday</label></td>
							<td>
								<select name=day style="font-size:18px;" required>
							<?php
								$day=1;
								while($day<=31){
									echo "<option> $day
									</option>";
									$day++;
								  }
							?>
								</select>
								<select name=month style="font-size:18px;" required>
									<option>January</option>
									<option>Febuary</option>
									<option>March</option>
									<option>April</option>
									<option>May</option>
									<option>June</option>
									<option>July</option>
									<option>August</option>
									<option>September</option>
									<option>October</option>
									<option>November</option>
									<option>December</option>
								</select>
								<select name=year style="font-size:18px;" required>
							<?php
								$year=1990;
								while($year<= date("Y")){
									echo "<option> $year
									</option>";
									$year++;
								  }
							?>
								</select>
							</td>
						</tr>
						<tr>
							<td><label>Gender</label></td>
							<td>
								<label>Male</label>
								<input type="radio" name="gender" value="male" checked required />
								
								<label>Female</label>
								<input type="radio" name="gender" value="female" required />
							</td>
						</tr>
						<tr>
							<td><label>Mobile number*</label></td>
							<td>
								<input type="text" name="number" placeholder="+91" value="+91" maxlength="13" class="form-1" title="Enter your mobile number" required />
							</td>
						</tr>
					</table>
				</fieldset>
				
				<br/>
				
				<fieldset class="sign-up-form-1">
					<legend>Log In Information</legend>
					<table cellpadding="5" cellspacing="5">
						<tr>
							<td colspan="2">
								<label style="padding-left: 37%">Your email address*</label>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="padding-left: 27%">
								<input type="text" name="email" placeholder="Enter your email address" class="form-1" title="Enter your firstname" required />
							</td>
						</tr>
						<tr>
							<td><label>Password*</label></td>
							<td><label>Repeat password*</label></td>
						</tr>
						<tr>
							<td>
								<input type="password" name="password" placeholder="Enter your password" class="form-1" title="Enter your username" required />
							</td>
							<td>
								<input type="password" name="password2" placeholder="Enter password again" class="form-1" title="Enter your username" required />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<label style="color: red; text-decoration: none;">Note: </label>
								No-one Can See Your Password.
							</td>
						</tr>
					</table>
				</fieldset>
				<br/>
					<strong>
						<input type="checkbox" name="" checked required>
						Yes, I have read and I accept The
						<label style="color: #F0641D"> Social Networking Site </label>
						<a href="#">Terms of Use</a>
						and the 
						<a href="#">Privacy Policy</a>
					</strong>
				<br/>
				<br/>
					<input type="submit" name="submit" value="I Agree - Continue" class="btn-sign-up" title="Log in" />
			</form>
		</div>
		<br> <br>
	</body>
</html>