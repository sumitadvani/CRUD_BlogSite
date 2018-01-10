<?php
	include_once('../database_files/db_setup.php');
	if(!isset($_SESSION['email']) or !isset($_SESSION['password']))
		header('location: main.php');
	else
	{
		$email = $_SESSION['email'];
		$password = $_SESSION['password'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('../User/head.php'); ?>
	<title>
		Admin Panel | New Post
	</title>
</head>
<body>
	<div class="container">
		<h1>Make A New Post</h1>
		<hr>
		<?php 
			if(isset($_SESSION['new_post']))
			{
				echo "<br><font color='green'>".$_SESSION['new_post']."</font>";
				session_destroy();
				session_start();
				ob_start();
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;

			}
			if(isset($_SESSION['error']))
			{
				foreach ($_SESSION['error'] as $fail) 
				{
					echo "<br><font color='red'>".$fail."</font>";
				}
				session_destroy();
				session_start();
				ob_start();
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
			}
			if(isset($_SESSION['error_image']))
			{
				echo "<br><font color='red'>".$_SESSION['error_image']."</font>";
				session_destroy();
				session_start();
				ob_start();
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
			}
		?>
		<form action="admin_NewInsert.php" method="POST" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<input type="hidden" name="id" class="form-control" value="1">
				<label>Title</label>
				<input type="text" class="form-control input-lg" name="title" placeholder="Enter title of your post" required>
				<br>
				<label>Short Description</label>
				<input type="text" class="form-control input-lg" name="short_desc" placeholder="Enter brief description of your post" required>
				<br>
				<label>Post Data</label>
				<textarea name="full_desc" id="editor1" class="form-control"></textarea>
				<br>
				<label>Keywords</label>
				<input type="text" class="form-control input-lg" name="keyword" placeholder="Enter keywords for the post">
				<br>
				<label>Category</label>
				<input type="text" class="form-control input-lg" name="catagory" placeholder="Enter catagory of your post" required>
				<br>
				<label>Status</label>
				<input type="number" class="form-control input-lg" name="status" placeholder="Show post: status=1; Don't show post: status=0" required>
				<br>
				<label>Upload Image</label>
				<input class="btn btn-info" type="file" value="Choose File" name="image">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="reset" class="btn btn-primary">Reset </button>
		</form>
	</div>
	<script>
		CKEDITOR.replace( 'editor1', {
			uiColor: '#CCEAEE'
		} );
	</script>
</body>
</html>