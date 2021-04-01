<!DOCTYPE html>
<html>
	<head onload="maxWindow()">
		<title>Social Networking Log in</title>
		<link rel="stylesheet" type="text/css" href="css/signin.css">
		
	</head>
	<body>
		<div id="container">
			<div class="sign-in-form">
				<h1>Welcome To Social Networking</h1>
				<h2>Log in</h2>
				<form method="post" action="signin_form.php" enctype="multipart/form-data">
					<table>
						<tr>
							<td><label>Email</label></td>
							<td><input type="email" name="email" placeholder="Email" class="form-1" title="Enter your email" required /></td>
						</tr>
						<tr>
							<td><label>Password</label></td>
							<td><input type="password" name="password" placeholder="Password" class="form-1" title="Enter your password" required /></td>
						</tr>
						<tr>
							<td colspan="2">
							<input type="submit" name="submit" value="Log in" class="btn-sign" title="Log in" />
							<input type="reset" name="cancel" value="Cancel" class="btn-sign" title="Cancel" />
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>
