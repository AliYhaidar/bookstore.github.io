<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>WeBook</title>
</head>

<body>
<?php
	session_start();
	if(!isset($_SESSION["pw18user"])){
		header("Location:login.php");
	} else {		
		echo "Welcome " . $_SESSION["pw18user"];
		
	}	
?>
<a href="logout.php">LOGOUT</a>
</body>
</html>
