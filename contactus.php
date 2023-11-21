<?php
if(isset($_POST['send'])){
session_start();
$dbName="book";
$mysql_username="root";
$mysql_password="";
$server_name ="localhost";
$conn = mysqli_connect($server_name, $mysql_username, $mysql_password,$dbName);

if($conn){
	
	mysqli_autocommit($conn, FALSE);
	
	
$insert = "INSERT INTO contactus (Name ,phone, email, message, Date)  VALUES ('".$_POST['name']."','".$_POST['phone']."','".$_POST['email']."','".$_POST['msg']."','".date("Y-m-d h:i:sa")."');";
//echo $insert;
$ordre = mysqli_prepare($conn,$insert);
if(($res=mysqli_stmt_execute($ordre))>0)
{
echo "<script>alert (\"your response is  submitted successfully\");</script>";
mysqli_commit($conn);
}
else{
	echo "<script>alert (\"your response is not submitted , please fill all the enteries\");</script>";
 
 }
//mysqli_stmt_free_result($ordre);

mysqli_close($conn);
}
else {echo "<script> alert(\"failed\")</script>";}
}
	?>



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
  <script type="text/javascript">
		function sendo(){
		var name=document.frm.name.value;	
		var email=document.frm.email.value;
		var phone=document.frm.phone.value;
		if (name==null || name==""){  
       alert("Name can't be blank");  
       return false;  
}
else if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)

else if(phone == "" || phone.length != 8){
        alert("Check your phone number");
		 return false;
      }		
		
		}
		
		</script>
<style>
        body{
			display: grid;
            background-color: white;
            font-size: 20px;
        }
		
		
 input[type=text] {
    border: 2px solid ;
    border-radius: 5px;
    margin-bottom: 2px;  
}

textarea {
    width: 40%;
    height: 100px;
    padding: 15px 22px;
    box-sizing: border-box;
    border: 2px solid ;
    border-radius: 5px;
    /* background-color: gray; */
    resize: none;  
}
::placeholder{
    color: black;
}
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
    </style>		
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
                        <a href="#">My Account</a>
                    </li>
                    
					
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
                
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
	
<header>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  
<form name="frm" method="post">
  <div class="container_contact">
  
   <label>Name :</label> 
     <input type="text" id="contact_name" name="name" value="<?php if (isset($_POST['name'])) {
				echo $_POST['name'];
			}?>"><br>
     <label>Email :</label> 
    <input type="text" id="contact_email" name="email" value="<?php if (isset($_POST['email'])) {
				echo $_POST['email'];
			}?>"><br>
    <label>Phone :</label> 
    <input type="text" id="contact_phone" name="phone" value="<?php if (isset($_POST['phone'])) {
				echo $_POST['phone'];
			}?>"><br>
    <label>Message:</label> <br>
     <textarea cols="20" rows="5" id="contact_message" placeholder="Add your message here!" name="msg" method="post" value="<?php if (isset($_POST['msg'])) {
				echo $_POST['msg'];
			}?>"></textarea>
</div>
<div align='center'>
  <button type="submit" class="button" name="send" onclick="sendo()">SEND</button>
</div>
</form> 

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
 


</body>


</html>
