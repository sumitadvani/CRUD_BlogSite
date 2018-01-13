<?php
	include_once('../database_files/db_setup.php');
	session_destroy();
	header('location:main.php');
?>