<?php
	include_once('../database_files/db_setup.php');	
	$val = $_GET['id'];
	$data = get_data_by_key('id',$val,'blogs');
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('head.php'); ?>
	<title>BlogOfSumit | Read Post</title>
</head>
<body>
	<h1 align="center"><?php echo$data[0]['title']; ?></h1>
	<hr>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
			<a href="<?php echo $data[0]['image']; ?>"><img src="<?php echo $data[0]['image']; ?>" class="img" width="40%" height="40%"></a>
		</div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" style="padding: 1%; margin-left: 10%; font-size: 20px; font-family: georgia">
			<?php echo $data[0]['short_desc'] ?>
			<br>
			<?php echo $data[0]['full_desc'] ?>
			<br>
			Author : <address><?php echo $data[0]['author'] ?></address>
		</div>
	</div>
	<br>
	<?php 
		if(isset($_SESSION['error']))
			echo "<br><div class='container'>
				<div class='row'>
					<div class='col-12' style='color:red; font-size:20px; text-align: center;'>".$_SESSION['error']."
					</div>
				</div>
			</div>";

			session_destroy();
	?>
</body>
</html>