
<?php
session_start();
mysql_connect("localhost","arin","rattasat");
$sth = mysql_select_db("db_grader");
$user=$_SESSION['username'];

/*if(!$sthh)
{
	die ("Error".mysql_error());
}
/*else
{
	$q = "SELECT * FROM members";
	$ss = mysql_query($q);
	
	while($sss = mysql_fetch_array($ss))
	{
		echo $sss['username']." ".$sss['password']." ";
	}
}*/
?>

