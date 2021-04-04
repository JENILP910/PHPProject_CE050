

<!DOCTYPE html>
<html>
	<head>
		<title>Social Networking Site</title>
		<link rel="stylesheet" type="text/css" href="css/home1.css">
		<link rel="stylesheet" type="text/css" href="css/border.css">
		<script type="text/javascript">
			document.documentElement.style.setProperty('--my-variable-name', window.innerWidth);
		</script>
	</head>
<body>
	<?php include ('session.php'); ?>

	<div id="header">
		<div class="head-view">
			<ul>
				<li>
					<a href="home1.php" title="Home"><b>Social Networking Site</b></a>
				</li>
				<li id="marli">
					<a href="home1.php" title="Home" class="head_right">
						<label class="active">Home</label>
					</a>
				</li>
				<li>
					<a href="profile.php" title="Profile" class="head_right">
					<label>Profile</label>
					</a>
				</li>
				<li>
					<a href="photos.php" title="Settings" class="head_right">
					<label>Photos</label>
					</a>
				</li>
				<li>
					<a href="logout.php" title="Log out" class="head_right">
					<button class="btn-sign-in" value="Log out">Log out</button>
					</a>
				</li>
			</ul>
		</div>
	</div>

	<div id="left-nav">
		<div class="clip1">
			<a href="updatephoto.php" title="Change Profile Picture">
				<img src="<?php echo $row['profile_pic'] ?>">
			</a>
		</div>
		<div class="user-details">
			<h2><?php echo $username ?>&nbsp;</h2>
			<h2><?php echo $row['email'] ?></h2>
		</div>
	</div>

	<div id="right-nav">
		<h1 style="">New Post</h1>
		<form method="post" action="post.php" enctype="multipart/form-data" id="postform">
			<input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;" required>

			<img id="output"/>

			<label for="file" style="cursor: pointer; margin-left:320px; border:3px solid #73cfff;">Upload Image</label>
			<input type="button" id="reset" value="Reset" onclick="resetimg()" />

			<textarea placeholder="What's on your mind?" id="txta" name="content" class="post-text" required></textarea>
			<button class="btn-share" name="Submit" onclick="clear()">Share</button>
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
				document.getElementById("txta").value = "";
			};
		</script>

	</div>
	<br><br>

	<div id="left-nav">
		<h2><u>Discription:</u></h2>
		<table>
			<tr class="discrip">
				<td>
					<b><?php echo $row['discription']; ?></b>
				</td>
			</tr>
		</table>

		<label style="color: #fff; font-size: 14px">
			<input TYPE="checkbox" ID="discbox" ONCLICK="ShowCheckboxDiv('discbox', 'discform')">Change Description</input><br>
		</label>
		<div ID="discform" style="display:none;">
			<form action="updatedisc.php" method="post" class="discrip">
				<input type="text" name="disc" style="width: 95%;font-size: 16px" placeholder="Type Your Discription" spellcheck="true" unchecked/><br>
				<input type="submit" value="Submit" name="submit" style="margin-left: 79%">

			</form>
		</div>
	</div>
<!-- /////////////////////////////////////////////////////////////////////////////// -->
<?php
	include("includes/database.php");
	$query=mysqli_query($link, "SELECT * from post LEFT JOIN user on user.user_id=post.user_id order by post_id DESC") or die(mysqli_error());
	// $rk = mysqli_num_rows($query);
	// echo $rk;
	$k = -1;
	while($row=mysqli_fetch_array($query)){
		$posted_by = $row['firstname']." ".$row['lastname'];
		$location = $row['post_image'];
		$profile_picture = $row['profile_pic'];
		$content=$row['content'];
		$post_id = $row['post_id'];
		$time=$row['created'];
		$k ++;
		// echo $k;
		// echo $location;
?>
		<div id="padal" ></div>
		<div id="right-nav1">
			<div class="c-subscribe-box u-align-center" style="margin: 0px 0px -87px -3px;">
			    <div class="rainbow">
			    	<span></span>
			    	<span></span>
			    </div>
			    <div class="c-subscribe-box__wrapper">
			    </div>
			</div>
			<div class="profile-pics">
			<img src="<?php echo $profile_picture ?>">
			<b><?php echo $posted_by ?></b>
			<strong id="elaspe<?php echo $k; ?>"></strong>
			<script type="text/javascript">
				setTimeout(elasped, 0, "elaspe");
				setInterval(elasped, 1000, "elaspe");
				function elasped(elemid){
					var timex = "<?php echo $time; ?>";
					var date1 = new Date(timex);
					var date2 = new Date();
					var time_difference = date2 - date1; 

					var seconds = Math.round(time_difference/1000);
					var minutes = Math.round(seconds / 60 );
					var hours = Math.round(seconds / 3600 ); 
					var days = Math.round(seconds / 86400 ); 
					var weeks = Math.round(seconds / 604800 ); 
					var months = Math.round(seconds / 2419200 ); 
					var years = Math.round(seconds / 29030400 ); 
					var datax = hours;
					if(seconds <= 60)
						datax = seconds + " seconds ago"; 
					else if(minutes <=60)
					   	if(minutes==1)
					    	datax = "a minute ago"; 
					   	else
						   datax = minutes + " minutes ago"; 
					else if(hours <=24)
					   	if(hours==1)
						   datax = "an hour ago";
					  	else
					  		datax = hours + " hours ago";
					else if(days <=7)
					  	if(days==1)
						   datax = "a day ago";
						else
						datax = days + " days ago";
					else if(weeks <=4)
					 	if(weeks==1)
					   		datax = "a week ago";
					  	else
							datax = weeks + " weeks ago";
					else if(months <=12)
					   	if(months==1)
					   		datax = "a month ago";
					  	else
					  		datax = months + " months ago";
					else
						if(years==1)
					   		datax = "a year ago";
					  	else
					  		datax = years + " years ago";
					document.getElementById(elemid + "<?php echo $k; ?>").innerHTML = datax;
				}
			</script>
			</div>
			<br/>
			<div class="post-content">
				<div class="deletepc">
				<a href="delete_post.php<?php echo '?id='.$post_id; ?>" title="Delete your post">
					<button class="btn-delete" id="delpost<?php echo $k; ?>">X</button>
					<script type="text/javascript">
							var id1 = <?php echo $_SESSION['id']; ?>;
							var id2 = <?php echo $row['user_id']; ?>;
							if(id1 != id2)
								document.getElementById('delpost<?php echo $k; ?>').style.display = "none";
					</script>
				</a>
				</div>
				<center>
					<img src="<?php echo $location ?>">
				</center>
				<p><?php echo $row['content']; ?></p>
			</div>

<?php
			include("includes/database.php");
			$comment=mysqli_query($link, "SELECT * from comments where post_id='" . $post_id . "' order by post_id DESC") or die(mysqli_error());
			while($row=mysqli_fetch_array($comment)){
				$comment_id=$row['comment_id'];
				$content_comment=$row['content_comment'];
				$time=$row['created'];
				$post_id=$row['post_id'];
				$user=$_SESSION['id'];
			
	?>			
				<div class="comment-display"<?php echo $comment_id ?>>
					<div class="deletepc">
						<a href="delete_comment.php<?php echo '?id='.$comment_id; ?>" title="Delete your comment">
							<button class="btn-delete">X</button>
						</a>
					</div>
					<div class="user-comment-name">
						<img src="<?php echo $row['image'];?>">
							&nbsp;&nbsp;&nbsp;
							<?php echo $row['name']; ?>
							<b class="time-comment" id="commid<?php echo $k; ?>"></b>
							<script type="text/javascript">
								setTimeout(elasped, 0, "commid");
								setInterval(elasped, 1000, "commid");
							</script>
					</div>
					<div class="comment">
						<?php echo $row['content_comment']; ?>
					</div>
				</div>
				<br/>
<?php
			}
?>
			<form  method="POST" action="comment.php">			
				<div class="comment-area">
<?php
					$image=mysqli_query($link, "select * from user where user_id='$id'")or die(mysql_error());
						while($row=mysqli_fetch_array($image)){
?>
							<img src="<?php echo $profile_picture; ?>" width="50" height="50">
<?php
						}
?>
					<input type="text" name="content_comment" placeholder="Write a comment" class="comment-text" title="Comment here">
					<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
					<input type="hidden" name="user_id" value="<?php echo $firstname . ' ' . $lastname;  ?>">
					<input type="hidden" name="image" value="<?php echo $profile_picture; ?>">
					<input type="submit" name="post_comment" value="Comment" class="btn-comment">
				
				</div>
			</form>
		</div>
		<br/>
<?php
	}
?>
	<!-- </div> -->

	<script type="text/javascript">
		function ShowCheckboxDiv (IdBaseName, blockx) {
		    if (document.getElementById(IdBaseName).checked)
		        document.getElementById(blockx).style.display = "block";
		    else
		        document.getElementById(blockx).style.display = "none";
		    
	    return false;
		}
		<?php echo $k; ?>header("Refresh:0");
		var j = setTimeout(elasped,0);
		j = setInterval(elasped,60000);
		function elasped(){
			++i;
			document.getElementById('elapsedt<?php echo $k; ?>').innerHTML = "<?php echo $time = time_stamp($time); ?>";
			document.getElementById('abcd').innerHTML = "done" + i;
		}
	</script>
	<!-- <?php
		echo $rk."<br>";
	?> -->
</body>

</html>

