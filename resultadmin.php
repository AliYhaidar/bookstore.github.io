
<!doctype html>
<html>
<head>
<meta charset="utf-8">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<title>WeBook</title>
</head>

<body>
<div class='container'>
  <table class='table'>
<tr><td><b>bookID</b></td><td><b>title</b></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<?php
require_once("conn.php");
if(isset($_POST['search'])){
	$search=$_POST['search'];
$result = mysqli_query($con, "SELECT bookID, title FROM books where title LIKE '%$search%' OR author LIKE '%$search%' or bookid like '%$search%'");
if(mysqli_num_rows($result) == false){
	echo "No results found";
} else {
	while($row = mysqli_fetch_array($result)){
	echo "<tr><td>" . $row["bookID"] . "</td><td>" . $row["title"] . "</td><td><a href='details.php?id=" . $row["bookID"] . "'>Details</a></td><td><a href='update.php?id=" . $row["bookID"] . "'>Update</a></td><td><a href='delete.php?id=" . $row["bookID"] . "'>Delete</a></td></tr>";
	}  }}
?>
</table>
</div>
 <div class="container" align="right"><a  class="btn btn-primary" href="admin.php">Back</a></div>
</body>
</html>