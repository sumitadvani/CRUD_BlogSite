<?php
	$data = get_all_data_from_any_table('blogs');
?>
<div class="row alert-danger">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1 align="center">Blog of Sumit Advani</h1>
		<hr>	
	</div>
</div>
<br>
<div class="container">
	<h2>Blog Updates</h2>
	<br>
	<?php
		for($i = 0; $i < count($data); $i++)
		{
			if($data[$i]['status'] != 0)
			{
	?>
	<div class="row">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<a href="open.php?id=<?php echo $data[$i]['id']; ?>"><img src="<?php echo $data[$i]['image']; ?>" class="img img-thumbnail" width="80%"></a>
		</div>
		<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<a href="open.php?id=<?php echo $data[$i]['id']; ?>"><?php echo $data[$i]['title'] ?></a>
			<br>
			<?php echo $data[$i]['short_desc'] ?>
			<br>
			Author : <address><?php echo $data[$i]['author'] ?></address>
		</div>
	</div>
	<hr>
	<?php
			}
		}
	?>
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
</div>