<!DOCTYPE html>
<!-- Template by Quackit.com -->
<!-- Images by various sources under the Creative Commons CC0 license and/or the Creative Commons Zero license. 
Although you can use them, for a more unique website, replace these images with your own. -->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>WeBook</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
</head>

<body>

    <!-- Navigation -->
    <nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                	<span class="glyphicon glyphicon-fire"></span> 
                	WeBook
                </a>
            </div>
     
        </div><!-- /.container -->
    </nav>

	<!-- Header -->
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>WeBook</h1>
                <h1>Sign up</h1>
                <form id="form1" name="form1" method="post" action="insertuserinter.php">
				<br>
				<br>
  <p>
    <label align:center for="textfield">Username:</label>
    <input  type="text" name="user" id="textfield2" Required>
  </p>
  <p>
    <label for="textfield2">Password:</label>
    <input type="password" name="pass" id="textfield3" Required>
  </p>
    <p>
    <label for="textfield3">Your Email:</label>
    <input type="email" name="email" id="textfield3" Required>
  </p>

  <p>
    <input class="btn btn-primary btn-lg" type="submit" name="submit" id="submit" value="Sign up">
     <a href="login.php" class="btn btn-primary btn-lg">Sign in</a>
  </p>
</form>
   <?php       
	
if (isset($_GET["error"]) && $_GET["error"] == '1') {
       echo '<div style = "font-size:20px; color:#FFFFFF">Username already exists!</div>';
}?>
                
            </div>
        </div>
    </header>

	

	
    <script src="js/custom.js"></script>

</body>

</html>
