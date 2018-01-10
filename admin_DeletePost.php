<?php 
	include_once('../database_files/db_setup.php');
	if(!isset($_SESSION['email']) or !isset($_SESSION['password']))
		header('location:main.php');
	if(!isset($_GET['id']) or $_GET['id'] == '')
		header('location: admin_dashboard.php');
	$id = $_GET['id'];
	delete_post($id,'blogs');
?>