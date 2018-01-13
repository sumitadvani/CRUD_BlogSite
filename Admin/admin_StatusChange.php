<?php
	include_once('../database_files/db_setup.php');
	if(!isset($_SESSION['email']) or !isset($_SESSION['password']))
		header('location: main.php');
	if($_GET['opr'] == 'unlock')
		$status = 0;
	elseif($_GET['opr'] == 'lock')
		$status = 1;
	else
	{
		$_SESSION['error'][] = "Wrong Operation!";
		header('location: admin_dashboard.php');
	}
	$query = "UPDATE `blogs` SET `status` = '".$status."' WHERE `id`= '".$_GET['id']."'";
	if(mysql_query($query))
		header('location: admin_dashboard.php');
	else
	{
		$_SESSION['error'][] = "Unable to run query";
		header('location: admin_dashboard.php');
	}
?>