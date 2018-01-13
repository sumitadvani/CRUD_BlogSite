<?php
	include_once('../database_files/db_setup.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('../User/head.php'); ?>
	<title>Admin Panel | Log In</title>
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
					<a href="#">Admin</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<h1>Admin Login</h1>
		<hr>
		<form action="admin_LoginCheck.php" method="POST" role="form">
			<div class="form-group">
				<label>e-mail</label>
				<input type="email" class="form-control input-lg" name="email" required>
				<br>
				<label>Password</label>
				<input type="password" class="form-control input-lg" name="password" required>
			</div>		
			<button type="submit" class="btn btn-primary">Log In</button>
			<a href="admin_SignUp.php"><button type="button" class="btn btn-primary">Sign Up</button></a>
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

		if(isset($_SESSION['new_admin']))
		{
			echo "<br> <div class='container'>
				<div class='row'>
					<div class='col-12' style='color:green; font-size:20px; text-align: center;'>".$_SESSION['new_admin']."
					</div>
				</div>
			</div>"; 

			session_destroy();
		}
	?>
</body>
</html>