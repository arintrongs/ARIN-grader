<?php
	
	include "connect.php";
	$usernamee = $_POST['username'];
	$strSQL = "SELECT * FROM members WHERE username = '".mysql_real_escape_string($_POST['username'])."' 
	and password = '".mysql_real_escape_string($_POST['password'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	echo mysql_error();
	if(!$objResult and $action=="")
	{
		$message = "wrong username or password";
		echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
	}
	else
	{

			$_SESSION["user_id"] = $objResult["user_id"];
			$_SESSION["status"] = $objResult["status"];
			$_SESSION["username"] = $usernamee; 
			if($objResult["status"] == "admin")
			{
				header("location:admin_page.php");
				exit();
			}
			else
			{
				header("location:user_page.php");
				exit();
			}
	}

	mysql_close();
?>