<?php
	include_once('../database_files/db_setup.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('../User/head.php'); ?>
	<title>Admin Panel | Sign Up</title>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<a class="navbar-brand" href="../User/index.php">Blog Of Sumit Advani</a>
			<ul class="nav navbar-nav">
				<li>
					<a href="../User/index.php">Home</a>
				</li>
				<li class="active">
					<a href="main.php">Admin</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<h1>Admin Sign Up</h1>
		<hr>
		<form action="admin_NewEntry.php" method="POST" role="form">
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control input-lg" name="username" required>
				<br>
				<label>e-mail</label>
				<input type="email" class="form-control input-lg" name="email" required>
				<br>
				<label>Password</label>
				<input type="password" class="form-control input-lg" name="password" required>
				<br>
				<label>Confirm Password</label>
				<input type="password" class="form-control input-lg" name="c_password" required>
				<br>
				<label>Reference Code</label>
				<input type="number" class="form-control input-lg" name="reference" required>
			</div>		
			<button type="submit" class="btn btn-primary">Done</button>
		</form>
	</div>
	<br>
	<?php
		if(isset($_SESSION['error']))
		{
			echo "<br><div class='container'>
				<div class='row'>
					<div class='col-12' style='color:red; font-size:20px; text-align: center;'>".$_SESSION['error']."
					</div>
				</div>
			</div>";

			session_destroy();
		}
	?>
</body>
</html>