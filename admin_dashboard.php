<?php 
	include_once('../database_files/db_setup.php');
	if(!isset($_SESSION['email']) or !isset($_SESSION['password']))
		header('location: main.php');
	else
	{
		$email = $_SESSION['email'];
		$password = $_SESSION['password'];
	}
	$value = get_data_by_key('email',$email,'admin');
	$_SESSION['username'] = $value[0]['username'];
	$data = get_data_by_key('author',$value[0]['username'],'blogs');
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once('../User/head.php'); ?>
	<title>Admin Panel | Dashboard</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
			 	<h1>BLOG Dashboard</h1>
				<h4 style="text-align: right;">Welcome: <b><?php echo $_SESSION['email']; ?></b>
				<hr>
				<br> 	
				<?php
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
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<form method="post">
				<table class="table table-striped table-hover table-responsive" style="font-size: 16px;">
					<thead>
						<tr>
							<th width="30%">Index</th>
							<th width="30%">Title</th>
							<th width="40%">Options</th>
						</tr>
					</thead>
					<tbody>
						<?php
							for($i = 0; $i < count($data); $i++)
							{
								$index = $i+1;
								echo "<tr>";
									echo "<td>";
										echo $index;
									echo "</td>";
									echo "<td>";
										echo $data[$i]['title'];
									echo "</td>";
									echo "<td>";
										echo "<table>
												<tr>
													<td width='40%'>
														<a href='admin_EditPost.php?id=".$data[$i]['id']."'> <i class='fa fa-pencil'></i> Edit </a>
													</td>
													<td width='40%'>";
													if($data[$i]['status'] == 1)
													{
														echo "<a href='admin_StatusChange.php?id=".$data[$i]['id']."&opr=unlock'><i class='fa fa-unlock'></i> Un-Lock </a>";
													}
													else
													{
														echo "<a href='admin_StatusChange.php?id=".$data[$i]['id']."&opr=lock'><i class='fa fa-lock'></i> Lock </a>";
													}
													echo "</td>
													<td width='40%'>
														<a href='admin_DeletePost.php?id=".$data[$i]['id']."'> <i class='fa fa-trash'></i> Delete </a>
													</td>
												</tr>
											</table>";
									echo "</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table> 	
			</div>
		</div>
		
		<br>
		<h4><a href="admin_NewPost.php" style="font-family: times new roman; font-size: 20px;" name="newpost"><i class="fa fa-pencil-square-o"></i> Make A New Post</a></h4>
		</form>
		<br>
		<a href="admin_LogOut.php"><button type="button" class="btn btn-primary">Log Out</button></a>
	</div>
	<br>
	<?php
		if(isset($_SESSION['delete_post']))
		{
			echo "<br><div class='container'>
				<div class='row'>
					<div class='col-12' style='color:green; font-size:20px; text-align: center;'>".$_SESSION['delete_post']."
					</div>
				</div>
			</div>";
			session_destroy();
			session_start();
			ob_start();
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
		}
	?>
</body>
</html>