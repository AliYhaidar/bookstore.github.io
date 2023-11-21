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
				
                    <li >
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
        <div class="header-content">
            <div class="header-content-inner">
                <h1>WeBook</h1>
                <p>If you don’t like to read, you haven’t found the right book.</p>
                <form id="form1" name="form1" method="post" action="results.php">
                
  <input   size="35"  type="text" name="search" id="textfield">
  <input class="btn btn-primary btn-lg" type="submit" name="submit" id="submit" value="Search">
</form>
                
            </div>
        </div>
    </header>

	

	<!-- Content 1 -->
		 <h1 align="center">New Release</h1>
    <section class="content">

        <div class="container">
		
            <div class="row">
              <?php
require_once("conn.php");
$result = mysqli_query($con,"Select title, author, price, imagepath from books where genre='New Release'");
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
			
		}
}
?></div>                
            </div>
        </div>
    </section>
 <h1 align="center">Best Seller</h1>
    <section class="content">

        <div class="container">
		
            <div class="row">
              
               <?php
require_once("conn.php");
$result = mysqli_query($con,"Select title, author, price, imagepath from books where genre='Best Seller'");
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
			
		}
}
?>
			
			
                </div>                
            </div>
        </div>
    </section>
	
	
	<h1 align="center">Popular</h1>
    <section class="content">

        <div class="container">
		
            <div class="row">
              
              <?php
require_once("conn.php");
$result = mysqli_query($con,"Select title, author, price, imagepath from books where genre='Popular'");
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
			
		}
}
?>
			
			
                </div>                
            </div>
        </div>
    </section>
	
	
	
<h1 align="center">Categories</h1>
    <!-- Promos -->
	<div class="container-fluid">
        <div class="row promo">
        	<a href="categorydetail.php?category=Arts and Music">
				<div class="col-md-4 promo-item item-1">
					<h3>
						Arts and Music
					</h3>
				</div>
            </a>
            
			<a href="categorydetail.php?category=Biographies">
				<div class="col-md-4 promo-item item-2">
					<h3>
						Biographies
					</h3>
				</div>
            </a>
            <a href="categorydetail.php?category=Business">
				<div class="col-md-4 promo-item item-3">
					<h3>
						Business
					</h3>
				</div>
            </a>
			
			<a href="categorydetail.php?category=Cooking">
				<div class="col-md-4 promo-item item-4">
					<h3>
						Cooking
					</h3>
				</div>
            </a>
			<a href="categorydetail.php?category=Health and Fitness">
				<div class="col-md-4 promo-item item-5">
					<h3>
						Health and Fitness
					</h3>
				</div>
            </a>
			<a href="categorydetail.php?category=History">
				<div class="col-md-4 promo-item item-6">
					<h3>
						History
					</h3>
				</div>
            </a>
			<a href="categorydetail.php?category=Literature">
				<div class="col-md-4 promo-item item-7">
					<h3>
						Literature
					</h3>
				</div>
            </a>
			<a href="categorydetail.php?category=Medical">
				<div class="col-md-4 promo-item item-8">
					<h3>
						Medical
					</h3>
				</div>
            </a>
			<a href="categorydetail.php?category=Parenting">
				<div class="col-md-4 promo-item item-9">
					<h3>
						Parenting
					</h3>
				</div>
            </a>
			<a href="categorydetail.php?category=Philosophy">
				<div class="col-md-4 promo-item item-10">
					<h3>
						Philosophy
					</h3>
				</div>
            </a>
			<a href="categorydetail.php?category=Psycology">
				<div class="col-md-4 promo-item item-11">
					<h3>
						Psycology
					</h3>
				</div>
            </a>
			<a href="categorydetail.php?category=Social Sciences">
				<div class="col-md-4 promo-item item-12">
					<h3>
						Social Sciences
					</h3>
				</div>
            </a>
			<a href="categorydetail.php?category=Religion">
				<div class="col-md-4 promo-item item-13">
					<h3>
						Religion
					</h3>
				</div>
            </a>
			<a href="categorydetail.php?category=Romance">
				<div class="col-md-4 promo-item item-14">
					<h3>
						Romance
					</h3>
				</div>
            </a>
			<a href="categorydetail.php?category=Science">
				<div class="col-md-4 promo-item item-15">
					<h3>
						Science
					</h3>
				</div>
            </a>
			<a href="categorydetail.php?category=Sci-Fi">
				<div class="col-md-4 promo-item item-16">
					<h3>
						Sci-Fi
					</h3>
				</div>
            </a>
			<a href="categorydetail.php?category=Self Help">
				<div class="col-md-4 promo-item item-17">
					<h3>
						Self Help
					</h3>
				</div>
            </a>
			<a href="categorydetail.php?category=Travel">
				<div class="col-md-4 promo-item item-18">
					<h3>
						Travel
					</h3>
				</div>
            </a>
        </div>
    </div><!-- /.container-fluid -->
	

	

	<!-- Footer -->
    <footer class="page-footer">
    
    	<!-- Contact Us -->
        <div class="contact">
	<a href="contactus.php" class="btn btn-primary">Contact us </a>
        	<div class="container">
					
				<p><span class="glyphicon glyphicon-earphone"></span><br> +961(71) 321 076</p>
				<p><span class="glyphicon glyphicon-envelope"></span><a href="mailto:webooks321@gmail">webooks321@gmail</a>
        	</div>
        </div>
        	
        <!-- Copyright etc -->
        <div class="small-print">
        	<div class="container">
        		<p>Copyright &copy; webook.com 2021</p>
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
	
	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap1.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>


</body>

</html>
