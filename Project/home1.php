<?php
	function time_stamp($session_time){
		$time_difference = time() - strtotime($session_time); ; 
		$seconds = $time_difference;
		$minutes = round($time_difference / 60 );
		$hours = round($time_difference / 3600 ); 
		$days = round($time_difference / 86400 ); 
		$weeks = round($time_difference / 604800 ); 
		$months = round($time_difference / 2419200 ); 
		$years = round($time_difference / 29030400 ); 

		if($seconds <= 60)
			echo"$seconds seconds ago"; 
		else if($minutes <=60)
		   	if($minutes==1)
		    	echo"one minute ago"; 
		   	else
			   echo"$minutes minutes ago"; 
		else if($hours <=24)
		   	if($hours==1)
			   echo"one hour ago";
		  	else
		  		echo"$hours hours ago";
		else if($days <=7)
		  	if($days==1)
			   echo"one day ago";
			else
			echo"$days days ago";
		else if($weeks <=4)
		 	if($weeks==1)
		   		echo"one week ago";
		  	else
				echo"$weeks weeks ago";
		else if($months <=12)
		   	if($months==1)
		   		echo"one month ago";
		  	else
		  		echo"$months months ago";
		else
			if($years==1)
		   		echo"one year ago";
		  	else
		  		echo"$years years ago";
	}
?>

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
			// function clear(){
			// 	if(document.has)
			// }
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

	while($row=mysqli_fetch_array($query)){
		$posted_by = $row['firstname']." ".$row['lastname'];
		$location = $row['post_image'];
		$profile_picture = $row['profile_pic'];
		$content=$row['content'];
		$post_id = $row['post_id'];
		$time=$row['created'];
		echo "	<script type=\"text/javascript\">
					del();
				</script>";
					
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
			<strong><?php echo $time = time_stamp($time); ?></strong>
			</div>
			<br/>
			<div class="post-content">
				<div class="deletepc">
				<a href="delete_post.php<?php echo '?id='.$post_id; ?>" title="Delete your post">
					<button class="btn-delete" id="delpost">X</button>
					<!-- <?php echo "<script type=\"text/javascript\">
									del();
								</script>";
					?> -->
					<script type="text/javascript">
						function del(){
							var id1 = <?php echo $_SESSION['id']; ?>;
							var id2 = <?php echo $row['user_id']; ?>;
							if(id1 != id2)
								document.getElementById('delpost').style.display = "none";
						}
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
							<b class="time-comment"><?php echo $time = time_stamp($time); ?></b>
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
				<input type="text" name="content_comment" placeholder="Write a comment..." class="comment-text">
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
	</script>
</body>

</html>