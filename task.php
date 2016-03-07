
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <title>ARIN Grader - Just a grader..</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
        header("location:index.html");
        exit();
    }
    $user=$_SESSION['username'];
   
    mysql_connect('localhost',"arin","rattasat");
    mysql_select_db("db_grader");
    ?>
    <div class="brand">ARIN Grader</div>
    <div class="address-bar">Just a grader.. </div>


    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Arin's Grader</a>
            </div>
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
        </div>
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
                <div class="col-lg-12 text-center">
                    <hr>
                        <h2 class="intro-text"><strong>Task</strong></h2>
                    <hr>

                    <form role="form" method="post" enctype="multipart/form-data" action="admin_upload.php" class="form-horizontal">
                       
                        <div class="form-group">
                           <div class="col-lg-5 text-right"> Name : </div>
                           <div class="col-lg-3"><input type="text" name="name" class="form-control "placeholder="File Name"></div>
                           
                        </div>
                   
                        <div class="form-group">
                           <div class="col-lg-5 text-right"> Time : </div>
                           <div class="col-lg-3"><input type="text" name="time" class="form-control "placeholder="Second(s)"></div>
                           <div class="col-lg-4"></div>
                        </div>
                    
                        
                        <div class="form-group">
                           <div class="col-lg-5 text-right"> Memory : </div>
                           <div class="col-lg-3"><input type="text" name="memory" class="form-control "placeholder="Megabyte(s)"></div>
                           <div class="col-lg-4"></div>
                        </div>

                        <div class="form-group">
                           <div class="col-lg-5 text-right"> Testcases : </div>
                           <div class="col-lg-3"><input type="text" name="testcase" class="form-control "placeholder="Number of Testcase(s)"></div>
                           <div class="col-lg-4"></div>
                        </div>

                        <div class="form-group">
                           <div class="col-lg-5 text-right"> PDF File : </div>
                           <div class="col-lg-3"><input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                <input name="pdf" type="file" id="userfile" class="filestyle" data-icon="false"></div>
                           <div class="col-lg-4"></div>
                        </div>

                        <div class="form-group">
                           <div class="col-lg-5 text-right"> Input : </div>
                           <div class="col-lg-3"><input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                <input name="input[]" type="file" id="userfile" class="filestyle" data-icon="false" multiple="multiple"></div>
                           <div class="col-lg-4"></div>
                        </div>

                        <div class="form-group">
                           <div class="col-lg-5 text-right"> Solution : </div>
                           <div class="col-lg-3"><input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                <input name="sol[]" type="file" id="userfile" class="filestyle" data-icon="false" multiple="multiple"></div>
                           <div class="col-lg-4"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12 text-center">
                            <input class="btn btn-default" name="upload" type="submit" id="upload" value=" Upload ">   </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
        
       
        
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $('.carousel').carousel({
        interval: 5000 
    })
    </script>

</body>

</html>
