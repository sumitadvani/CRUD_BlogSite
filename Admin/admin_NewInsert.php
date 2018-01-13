<?php
	include_once('../database_files/db_setup.php');
	if(!isset($_SESSION['email']) or !isset($_SESSION['password']))
		header('location: main.php');
	if(!isset($_POST['id']) or $_POST['id'] == '')
		header('location: admin_dasboard.php');
	if(check_validation_of_string($_POST['title']) == 0)
		$title = mysql_real_escape_string($_POST['title']);
	else
		$_SESSION['error'][] = "Sorry! Limited Special Charactes allowed in Title.";

	$short_desc = mysql_real_escape_string($_POST['short_desc']);
	$full_desc = mysql_real_escape_string($_POST['full_desc']);

	if(check_validation_of_string($_POST['keyword']) == 0)
		$keyword = mysql_real_escape_string($_POST['keyword']);
	else
		$_SESSION['error'][] = "Sorry! Limited Special Charactes allowed in Keywords.";

	$date = date('d-m-Y');
	$author = $_SESSION['username'];
	
	if(check_validation_of_string($_POST['catagory']) == 0)
		$catagory = mysql_real_escape_string($_POST['catagory']);
	else
		$_SESSION['error'][] = "Sorry! Limited Special Charactes allowed in Catagory.";

	$status = $_POST['status'];
	$format = array('jpg','jpeg','png','gif');
	$type = explode('/', $_FILES['image']['type']);
	foreach ($format as $key) 
	{
		if($key == $type[1])
		{
			if($_FILES['image']['name'])
			{
				$target = "../images/".$_FILES['image']['name'];
				if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
					$image = "../images/".$_FILES['image']['name'];
				else
					$_SESSION['error_image'] = "Unable to upload image";
			}
		}
	}

	if(!isset($_SESSION['error']) and !isset($_SESSION['error_image']))
		new_entry_in_blogs_table($title,$short_desc,$full_desc,$keyword,$date,$catagory,$status,$image,$author);
	else
		header('location: admin_NewPost.php');

?>