<?php 
	include_once('../database_files/db_setup.php');
	if(!isset($_SESSION['email']) or !isset($_SESSION['password']))
		header('location: main.php');
	$value = $_GET['id'];
	$_SESSION['id'] = $value;
	$data = get_data_by_key('id',$value,'blogs');
	$_SESSION['old_image'] = $data[0]['image'];
	$email = $_SESSION['email'];
	$password = $_SESSION['password'];
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('../User/head.php'); ?>
	<title>
		Admin Panel | Edit Post
	</title>
</head>
<body>
	<div class="container">
		<h1>Edit Your Post</h1>
		<address style="float: right;">
			<b>Author: <?php echo $data[0]['author']; ?>	</b>
		</address>
		<br>
		<hr>
		<?php 
			if(isset($_SESSION['edit_post']))
			{
				echo "<br><font color='green'>".$_SESSION['edit_post']."</font>";
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
		?>
		<form method="POST" action="admin_EditUpdate.php" enctype="multipart/form-data" role="form">
			<div class="form-group">
				<input class="form-control" type="hidden" name="id" value="<?php echo $data[0]['id'] ?>">
				<label>Title</label>
				<input type="text" class="form-control input-lg" name="title" placeholder="Enter title of your post" value="<?php echo $data[0]['title'] ?>">
				<br>
				<label>Short Description</label>
				<input type="text" class="form-control input-lg" name="short_desc" placeholder="Enter brief description of your post" value="<?php echo $data[0]['short_desc'] ?>">
				<br>
				<label>Post Data</label>
				<textarea name="full_desc" id="editor1" class="form-control"><?php echo $data[0]['full_desc'] ?></textarea>
				<br>
				<label for="">Keywords</label>
				<input type="text" class="form-control input-lg" name="keyword" placeholder="Enter keywords for the post" value="<?php echo $data[0]['keyword'] ?>">
				<br>
				<label>Category</label>
				<input type="text" class="form-control input-lg" name="catagory" placeholder="Enter catagory of your post" value="<?php echo $data[0]['catagory'] ?>">
				<br>
				<a href="<?php echo $data[0]['image'] ?>"><img src="<?php echo $data[0]['image'] ?>" style="max-width: 180px; max-height: 180px;"></a>
				<br>
				<br>
				<label>Change Image</label>
				<input class="btn btn-info btn-lg" type="file" name="image">
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
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