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
<br><br>
<form id="form1" name="form1" method="post" action="addadmin.php">
  <label for="textfield">Username :</label>
  <input type="text" name="user" id="textfield" Required>
  <br>
  <label for="textfield1">User Level :</label>
  <input type="number" name="level" id="textfield1" min="0" max="1" Required>
  <br>
  <input type="submit" name="submit" id="submit" value="Submit">
</form>
<div class="container" align="right"><a  class="btn btn-primary" href="admin.php">Back</a></div>


<?php 
	require_once("conn.php");
	if(isset($_POST["submit"])){
		$user = $_POST["user"];
		$level = $_POST["level"];
		$sql = "update login set level=$level where username='$user' ";
		mysqli_query($con,$sql);
		header("Location:admin.php");
	}
?>

</body>
</html>