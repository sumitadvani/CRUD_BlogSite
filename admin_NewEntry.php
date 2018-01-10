<?php 
	include_once('../database_files/db_setup.php');
	if(!isset($_POST['email']) or !isset($_POST['password']))
		header('location:admin_SignUp.php');
	$data = get_all_data_from_any_table('admin');
	$flag = 0;
	$username = mysql_real_escape_string($_POST['username']);
	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
	if($_POST['reference'] == 9447)
	{
		if($_POST['password'] == $_POST['c_password'])
		{
			for($i = 0; $i < count($data); $i++)
			{
				if($_POST['email'] == $data[$i]['email'])
					$_SESSION['error'] = "Email already exists";
				else
					$flag++;
			}
			if($flag == count($data))
				new_entry_in_admin_table($username,$email,md5($password));
		}
		else
			$_SESSION['error'] = "Passwords didn't match";
	}
	else
		$_SESSION['error'] = "Inavlid Reference Code";
	
	if(isset($_SESSION['error']))
		header('location: admin_SignUp.php');
?>