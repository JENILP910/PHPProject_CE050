

<!DOCTYPE html>
<html>
	<head>
		<title>Social Networking</title>
	</head>
	<body onload="myFunction()" >
<!-- style="background-image: url('./image/dark1.jpg'); background-attachment: fixed; background-size: 100% 100%;" -->
<?php
		$choice = "Delete comment";
?>
		
		<p id="demo"></p>
		<script>
			var choice = "<?php echo $choice ?>";
			function myFunction() {
				var r = confirm("Are you sure want to delete this comment?");
				if (r == false) {
					window.history.back();
					return 0;
				}
				// var divt = document.getElementById("demo");
				var url = window.location.href;
				var url1 = url.replace("delete_comment.php", "del_func.php");
				// divt.innerHTML = url1;
				window.location.replace(url1);
			}
		</script>
	</body>
</html>