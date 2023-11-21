
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<title>WeBook</title>
</head>
<?php
require_once("conn.php");
$result = mysqli_query($con, "SELECT title, number, date, time FROM cart where username='$_GET[user]'");
if(mysqli_num_rows($result) == false){
	echo "No results found";
} else {
	echo "<div class='container'><table class='table'>";
echo "<td><b>Title</b></td><td><b>Number</b></td><td><b>Date</b></td><td><b>Time</b></td></tr>" ;
	while($row = mysqli_fetch_array($result)){


echo "<tr><td>".$row["title"] ."</td><td>".$row["number"] ."</td><td>".$row["date"] ."</td><td>".$row["time"] ."</td><td><a href='deletecart.php?title=" . $row["title"] . "'>Delete</a></td></tr>";
}echo "</table>";}
$result3 = mysqli_query($con, "SELECT sum(c.number*b.price) AS total3  FROM cart  c inner join books b where c.title=b.title and username='$_GET[user]'");
		$row3=mysqli_fetch_assoc($result3);
		echo  " <strong>Total money: " . $row3["total3"] . " $</strong><br/></div>";
echo (mysqli_error($con));
?>
<br/>
<div class="container" align="right"><a  class="btn btn-primary" href="index.php">Back</a></div>
<body>
<?php
	session_start();
	if(!isset($_SESSION["pw18user"])){
		header("Location:login.php");
	} else {		
	
	}
	
?>
</body>
</html>