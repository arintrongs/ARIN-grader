<?
include "connect.php";
$filename=$_POST["name"];
$time=$_POST["time"];
$mem=$_POST["memory"];
$testcase=$_POST["testcase"];
$str="SELECT * FROM problems ORDER BY id DESC LIMIT 1";
$query=mysql_query($str);
$result=mysql_fetch_array($query);
$pnum=$result["id"]+1;

	
		mkdir("problems/$pnum",0777,true);
		chmod("problems/$pnum", 0777);
		$tmpFilePath = $_FILES['pdf']['tmp_name'];
		if($tmpFilePath != "")
		{
			$newFilePath = "problems/".$pnum."/".$_FILES['pdf']['name'];
			move_uploaded_file($tmpFilePath, $newFilePath);
			chmod("problems/$pnum/$filename", 0777);
		}
		
		for($i=0; $i<=count($_FILES['input']['name']); $i++) {
		  //Get the temp file path
		  $tmpFilePath = $_FILES['input']['tmp_name'][$i];
			$fname = $_FILES['input']['name'][$i];
		  //Make sure we have a filepath
		  if ($tmpFilePath != ""){
		    //Setup our new file path
		    $newFilePath = "problems/".$pnum."/".$_FILES['input']['name'][$i];
		
		    //Upload the file into the temp dir
		  move_uploaded_file($tmpFilePath, $newFilePath);
		  chmod("problems/$pnum/$fname", 0777);
		}
	}
		for($i=0; $i<=count($_FILES['sol']['name']); $i++) {
		  //Get the temp file path
		  $tmpFilePath = $_FILES['sol']['tmp_name'][$i];
		$fname = $_FILES['sol']['name'][$i];
		  //Make sure we have a filepath
		  if ($tmpFilePath != ""){
		    //Setup our new file path
		    $newFilePath = "problems/".$pnum."/".$_FILES['sol']['name'][$i];
		
		    //Upload the file into the temp dir
		    move_uploaded_file($tmpFilePath, $newFilePath);
		     chmod("problems/$pnum/$fname", 0777);
		}
	}
	$mem=$mem*1024;
	mysql_query("INSERT INTO problems (`name`,`time`,`mem`,`testcase`) VALUES ('$filename','$time','$mem','$testcase')");
	mysql_query("ALTER TABLE u_result ADD `$pnum` VARCHAR(30)");
	mysql_query("ALTER TABLE u_score ADD `$pnum` int(11)");
	mysql_query("ALTER TABLE members ADD `$pnum` VARCHAR(30)");
	$message = "Upload Complete!!!";
	echo "<script type='text/javascript'>alert('$message');history.go(-1);</script>";
?>