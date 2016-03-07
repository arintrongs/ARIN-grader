<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ARIN Grader - Just a Grader..</title>
     <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="box">

<?php
include "connect.php";
$username = $_POST['username'];
$password = $_POST['password'];
	if($username !="" and $password != "")
	{
		$check = "SELECT * FROM members";
		$cQuery = mysql_query($check) or die("Error check query [".$check."]");
		$c=0;
		while($cResult = mysql_fetch_array($cQuery))
			{
				if($cResult['username']==$username)
				{
					$c=1;
				}
			}
		if($c==0)
			{
				$query = "INSERT INTO `members`(`username`,`password`) VALUES ('$username','$password')";
				mysql_query($query) or die("Error [".$query."]");
				mkdir("uploads/$username",0777,true);
				mysql_query("INSERT INTO `u_result` (`username`) VALUES ('$username') ");
				mysql_query("INSERT INTO `u_score` (`username`) VALUES ('$username') ");
				?>
				<center><h1>Register Successful!</h1>
				<h3><a href="index.html">Go Back</a></h3>
			</center>
				<?php	
			}
		else
		{
		?><center><h1><?echo "Error! Username already in use!";?></h1>
		<h3><a href="register.html">Go back</a></h3></center>
		<?php
		}
	}
	else
	{
		?><center><h1><?echo "Error! Clean field!";?></h1>
		<h3><a href="register.html">Go back</a></h3></center>
		<?php
	}?>
</div>
</div>
</div>
</body>
</html>
