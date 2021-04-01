

<!DOCTYPE html>
<html>
	<head>
		<title>Social Networking</title>
	</head>
	<body onload="myFunction()" style="background-color: black">
<!-- style="background-image: url('./image/dark1.jpg'); background-attachment: fixed; background-size: 100% 100%;" -->
<?php
		$choice = "Delete Post";
		// echo $choice;
?>
		
		<p id="demo"></p>
		<script>
			var choice = "<?php echo $choice ?>";
			function myFunction() {
				var r = confirm("Are you sure want to delete this Post?");
				if (r == false) {
					window.history.back();
					return 0;
				}
				// var divt = document.getElementById("demo");
				var url = window.location.href;
				var url1 = url.replace("delete_post.php", "del_postfunc.php");
				// divt.innerHTML = url1;
				window.location.replace(url1);
			}
		</script>
	</body>
</html>