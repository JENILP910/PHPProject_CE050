	
<?php
	include('includes/database.php');

	$get_id =$_GET['id'];
	
	// sending query
	mysqli_query($link, "DELETE FROM comments WHERE comment_id = " . $get_id) or die(mysqli_error());
	// echo $get_id;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Delete Post</title>
	</head>
	<body style="background-color: black">
		<script type="text/javascript">
			window.alert("Comment deleted successfully");
			window.history.back();
		</script>
	</body>
</html>