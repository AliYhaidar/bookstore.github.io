<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<title>WeBook</title>
</head>

<body>
<?php
	session_start();
	if(!isset($_SESSION["pw18admin"])){
		header("Location:login.php");
	} else {		
		echo "<h1 class='display-4'>Welcome " . $_SESSION["pw18admin"]. "</h1>";
	}
?>
<form id="form1" name="form1" method="post" action="resultadmin.php">
  <label for="textfield">Search:</label>
  <input type="text" name="search" id="textfield">
  <input type="submit" name="submit" id="submit" value="Submit">
</form>
<nav class="navbar bg-light">
  <ul class=""navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="insertdata.php">Insert Data</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="select.php">View and edit</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="report.php">Report</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="reportt.php">Users Interactions</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="addadmin.php">Add/Remove admin</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="contactusadmin.php">Contacts</a>
    </li>
	
  </ul>
</nav>
<div class="container" align="right"><a  class="btn btn-primary" href="logout.php">Log out</a></div>
</body>
</html>