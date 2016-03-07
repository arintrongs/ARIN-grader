
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ARIN Grader - Just a grader..</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
        //echo "<script type='text/javascript'>alert('You are not logged in!');</script>";
        header("location:index.html");
        exit();
    }
    $user=$_SESSION['username'];
   
    mysql_connect('localhost',"arin","rattasat");
    mysql_select_db("db_grader");    
    $class_itSTR = mysql_query("SELECT * FROM members WHERE username = '$user' ");
    $class_itFETCH = mysql_fetch_array($class_itSTR);
    $class_it = $class_itFETCH["class"];

    ?>
    <div class="brand">ARIN Grader</div>
    <div class="address-bar">Just a grader.. </div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Arin's Grader</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="admin_page.php">Home</a>
                    </li>
                    
                    <li>
                        <a href="admin_page_c.php">Result</a>
                    </li>
                    <li>
                        <a href="task.php">Task</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    
                    <h1 class="brand-name">Welcome <? echo $user;?>!</h1>
                    <hr class="tagline-divider">
                    <h2> Just an admin.. </h2>
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Your Results</strong>
                    </h2>
                    <hr>
                    <div class="table-responsive">
                        
    <table class="table">
        <tr>
            <th class="col-md-1"> <div align="center">ID </div></th>
            <th class="col-md-4"> <div align="center">Problems </div></th>
            <th class="col-md-1"> <div align="center">Code </div></th>
            <th class="col-md-4"> <div align="center">Result</div></th>
            <th class="col-md-2"> <div align="center">Time</div></th>
        </tr>
        <?php
       
        
            $strSQL ="SELECT * FROM uploads WHERE class='$class_it' ORDER BY id DESC LIMIT 25";
        

        $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
        while($objResult = mysql_fetch_array($objQuery))
        {   
            
            $strSQLL=mysql_query("SELECT * FROM problems WHERE id = ".$objResult["pnum"]);
            $objResult2 = mysql_fetch_array($strSQLL);
            ?>
            <tr>
                <td class="col-md-1"><div align="center" ><?php echo $objResult["id"];?></div></td>
                <td class="col-md-4"><div align="center" ><? $m = $objResult2["mem"]/1024; echo $objResult2["name"].' <br/>('.$objResult2["time"].'s. '.$m.'MB. )';?></div></td>
                <td class="col-md-1"><center><a href="uploads/<?php echo $objResult["own"].'/'.$objResult["name"];?>">See</a> </td>
                <td class="col-md-4"><div align="center"><? if($objResult["result"] != ''){echo $objResult["result"]." (".$objResult["own"].")";}else if($objResult["checkt"] == '1'){echo "Grading";}else echo "In Queue";?></div></td>
                <td class="col-md-2"><div align="center" ><? echo $objResult["time"];?></div></td>
            </tr>
            <?php 
        }
        ?>
    </table>
                    </div>
                </div>
            </div>
              

    </div>
    <!-- /.container -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
