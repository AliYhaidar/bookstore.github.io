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
<?php
require_once("conn.php");
$result = mysqli_query($con, "SELECT username FROM login");
if(mysqli_num_rows($result)==false){
	echo "No result found";	
} else {
	while($row=mysqli_fetch_array($result)){
		$result1 = mysqli_query($con, "SELECT Count(cartID) AS total FROM cart Where username = '$row[username]'");
		$row1=mysqli_fetch_assoc($result1);
		echo "<div class='container'><table class='table'>";
		echo "<tr><td>".$row["username"]  ."</td><td>" . $row1["total"] . "</td></tr>";	
		echo "</table></div>";
		echo(mysqli_error($con));
	}
	
}
mysqli_close($con);
?>
<div class="container" align="right"><a  class="btn btn-primary" href="admin.php">Back</a></div>
<body>
</body>
</html>

