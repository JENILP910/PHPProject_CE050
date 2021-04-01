<?php 
	include ('session.php');
	include ('includes/database.php');
	
	if (isset($_POST['submit'])){
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$username=$_POST['username'];
		$birthday=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
		$gender=$_POST['gender'];
		$number=$_POST['number'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];

		if(!checkdate(date('m', strtotime($_POST['month'])), ((int)$_POST['day']), (int)$_POST['year']))
			echo "<script>alert('BirthDate Is Invalid!'); window.location='signup.php'</script>";
		
		$sql=mysqli_query($link, "select * from user WHERE email='$email'") or die (mysql_error());

		$row=mysqli_num_rows($sql);
		if ($row > 0)
		echo "<script>alert('E-mail already taken!'); window.location='signup.php'</script>";
		
		elseif($password != $password2)
			echo "<script>alert('Password do not match!'); window.location='signup.php'</script>";
		else{
			mysqli_query($link, 
				"INSERT INTO user (firstname, lastname, username, password, email, birthday, gender, number) VALUES ('$firstname', '$lastname', '$username', '$password', '$email', '$birthday', '$gender', '$number')") or die ("Error: ".mysql_error());

			echo "<script>alert('Account successfully created!'); window.location='signin.php'</script>";
		}		
	}
?>