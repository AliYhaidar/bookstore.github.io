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
$result = mysqli_query($con, "SELECT * FROM cart");
if(mysqli_num_rows($result) == false){
	echo "No results found";
} else {
	echo "<div class='container'><table class='table'>";
echo "<tr><td><b>CartID</b></td><td><b>Username</b></td><td><b>Title</b></td><td><b>Number</b></td><td><b>Date</b></td><td><b>Time</b></td></tr>" ;
	while($row = mysqli_fetch_array($result)){


echo "<tr><td>".$row["cartID"] ."</td><td>".$row["username"] ."</td><td>".$row["title"] ."</td><td>".$row["number"] ."</td><td>".$row["date"] ."</td><td>".$row["time"] ."</td></tr>";
}echo "</table>";}
$result1 = mysqli_query($con, "SELECT Count(cartID) AS total FROM cart ");
		$row1=mysqli_fetch_assoc($result1);
		echo  " <strong>Total number of orders: " . $row1["total"] . " orders</strong><br/>";	
		$result2 = mysqli_query($con, "SELECT sum(number) AS total2 FROM cart ");
		$row2=mysqli_fetch_assoc($result2);
		echo  " <strong>Total books sold : " . $row2["total2"] . " books</strong><br/>";
		$result3 = mysqli_query($con, "SELECT sum(c.number*b.price) AS total3  FROM cart  c inner join books b where c.title=b.title and MONTH(date) = MONTH(CURDATE())
AND
YEAR(date) = YEAR(CURDATE())");
		$row3=mysqli_fetch_assoc($result3);
		echo  " <strong>Total money earned this month: " . $row3["total3"] . " $</strong><br/>";
		$result4 = mysqli_query($con, "SELECT sum(c.number*b.price) AS total4 FROM cart  c inner join books b where c.title=b.title");
		$row4=mysqli_fetch_assoc($result4);
		echo  " <strong>Total money earned: " . $row4["total4"] . " $</strong><br/></div>";
echo (mysqli_error($con));
?>
<br/>



<div class="container" align="right"><a  class="btn btn-primary" href="admin.php">Back</a></div>
<body>

?>
</body>
</html>