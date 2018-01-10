<?php 
	include_once('../database_files/db_setup.php');
	if(!isset($_SESSION['email']) or !isset($_SESSION['password']))
		header('location: main.php');
	if(isset($_POST['id']) and $_POST['id'] != '')
	{	
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
		
		if(check_validation_of_string($_POST['catagory']) == 0)
			$catagory = mysql_real_escape_string($_POST['catagory']);
		else
			$_SESSION['error'][] = "Sorry! Limited Special Charactes allowed in Catagory.";
		if($_FILES['image']['error'] == 0)
		{
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
							$_SESSION['error'][] = "Unable to upload image";
					}
				}
			}
		}
		else
			$image = $_SESSION['old_image'];
	}
	else
		header('location: admin_dashboard.php');

	if(!isset($_SESSION['error']))
		update_entry_in_blogs_table($image,$title,$short_desc,$full_desc,$keyword,$catagory,$_POST['id']);
	else
		header("location: admin_EditPost.php?id=".$_POST['id']);
?>