<?php
include "connect.php";
//include "one_for_all.php";
$username = $_SESSION['username'];
$classStr = mysql_query("SELECT * FROM members WHERE username = '$username'");
$classFetch = mysql_fetch_array($classStr);
$class = $classFetch["class"];
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
	$fileName = $_FILES['userfile']['name'];
	$tmpName  = $_FILES['userfile']['tmp_name'];
	$fileType = $_FILES['userfile']['type'];
	$probs = $_POST['pnum'];
	$array_last=explode(".",$fileName);
	$c=count($array_last)-1; 
	$lastname=strtolower($array_last[$c]) ;
	if($lastname == "cpp" or $lastname == "c")
	{
	if(move_uploaded_file($_FILES['userfile']['tmp_name'], "uploads/".$username."/".$fileName))
	{
		chmod("uploads/".$username."/".$fileName, 0777);
		if(!get_magic_quotes_gpc())
		{
			$fileName = addslashes($fileName);
		}
	$query = "INSERT INTO uploads (name, own, pnum ,class) ".
	"VALUES ('$fileName', '$user', '$probs' , '$class')";
	//$query = "INSERT INTO queue (name, own, pnum) VALUES ('$fileName','$user','$probs')";
	mysql_query($query) or die('Error, query failed');
	header("location:user_page_c.php");
	mysql_close();
	
	
	}
}
	else
	{
		$message = "Wrong file type!!!";
		echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
	}

}
else
{
	header("location:user_page.php");
	exit();
}
?>