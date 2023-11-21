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
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'">
     
</head>

<body>
<?php
	session_start();
	if(!isset($_SESSION["pw18user"])){
		header("Location:login.php");
	} else {		
	
	}
	
?>


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
                <a class="navbar-brand" href="index.php">
                	<span class="glyphicon glyphicon-fire"></span> 
                	WeBook
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
			
                <ul class="nav navbar-nav navbar-right">
				
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="allbooks">All Books</a>
                    </li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="about-us">
							<?php
							require_once("conn.php");
							$result = mysqli_query($con,"select * from bookcategory");
							while($row = mysqli_fetch_array($result)){
								$category = $row["CategoryName"];
								echo " <li><a href='categorydetail.php?category=".$category."'>".$category."</a></li> ";
							}
						?>
						</ul>
					</li>
                    
                    <li>
                        <a href="#">My Account: <?php echo $_SESSION["pw18user"]; ?></a>
                    </li>
                    
					<li>    
                         <?php
                       echo "<a href='mycart.php?user=". $_SESSION["pw18user"] . "'><span class='glyphicon glyphicon-shopping-cart'></span> My Cart</a>";
					    ?>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
                
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

	<!-- Header -->
    <header>

      <br>
       <br>
        <br>
    <section class="content">

        <div class="container">
				<div id="auto">
  <div title="shahiyan">
    <img src="images/shahiyan.jpg" alt="glasses" width="50%" height="50%" />
  </div>
  <div title="Stephen Hawking">
    <img src="images/PHnvuHiztxRRekcaLF6UtCMSoOWpYiNn8I215-54-48.jpg" alt="mouse" width="50%" height="50%" />
  </div>
  <div title="Stephen Hawking">
    <img src="images/nmCF_E03qzUlR-b60epr89uWW6VGBWEgUY918-54-17.jpg" alt="business" width="50%" height="50%" />
  </div>
  <div title="bentelkhayata">
    <img src="images/imz7z5lC3iIKTdvvBy2lkxefFSmHHMiC_Zo15-34-12.jpg" alt="monkey" width="50%" height="50%" />
  </div>
  <div title="Michel Obama">
    <img src="images/osFjvxWo9_o5zJ31t0nh4Kjr5elCLlrnMq318-44-34.jpg" alt="lion" width="50%" height="50%" />
  </div>
  <div title="Oliver Sacks">
    <img src="images/zvShe7Uspapnp8uf4ZJNN8dclDzf7US6YVH23-40-21.jpg" alt="cows" width="50%" height="50%" />
  </div>
</div>
            <div class="row">
			 <?php
require_once("conn.php");

$result = mysqli_query($con,"SELECT * from books");
if(mysqli_num_rows($result)==false){
	echo "no results found.";
} else {
	while($row = mysqli_fetch_array($result)){
		  echo '<div class="col-sm-6 col-md-3">
			<div class="thumbnail featured-product">
			<a href="bookdetail.php?title=' . $row["title"] . '& user=' .$_SESSION["pw18user"]. '">
						<img src="upload/' .$row["imagepath"] .' ">
					</a>
					<div class="caption">
						<h3>' .$row["title"] . '</h3>
					 <p>by ' .$row["author"] . '</p>
						 <p class="price">$' .$row["price"]. '</p>	
						 <form id="form1" name="form1" method="post" action="insertcartinter.php">
						 <div class="input-group">
							<input type="number" name="number" class="form-control" value="1">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="submit">
									<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 
									Add to Cart
								</button>
							</span>
						</div>
						<input name="username" id="username"  type="hidden" value="'. $_SESSION["pw18user"] .'">
								<input name="title" id="title"  type="hidden" value="'. $row["title"] .'">
								</form>
				 </div>
				 </div>
			</div>';
			
		}}

?>

            
            </div>
        </div>
    </section>

    </header>



	

	<!-- Footer -->
    <footer class="page-footer">
    
    	<!-- Contact Us -->
        
        	
        <!-- Copyright etc -->
        <div class="small-print">
        	<div class="container">
        		<p>Copyright &copy; Webook.com 2021</p>
        	</div>
        </div>
        
    </footer>

    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    
    <!-- Custom Javascript -->
    <script src="js/custom.js"></script>
	
		<!-- Include the stylesheet -->
		<link type="text/css" href="css/jquery.bbslider.css" rel="stylesheet" media="screen" />
	
		<!-- Include jQuery -->
		<script src="http://code.jquery.com/jquery-latest.js"></script>
 
		<!-- Include the slider plugin -->
		<script type="text/javascript" src="js/jquery.bbslider.min.js"></script>
</body>


</html>
<script>
$('#auto').bbslider({
  auto: true,
  timer:3000,
  loop:true
});
</script>