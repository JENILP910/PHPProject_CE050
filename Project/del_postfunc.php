
<?php
	include('includes/database.php');

	$get_id =$_GET['id'];

	// sending query
	mysqli_query($link, "DELETE FROM post WHERE post_id = " . $get_id) or die("Error1:" . mysqli_error());
	mysqli_query($link, "DELETE FROM comments WHERE post_id = " . $get_id) or die("Error2:" . mysqli_error());

	// echo $get_id;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Delete Post</title>
	</head>
	<body style="background-color: black">
		<script type="text/javascript">
			window.alert("Post deleted successfully");
			window.history.back();
		</script>
	</body>
</html>
	