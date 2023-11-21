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
require_once("conn.php");
$result = mysqli_query($con, "SELECT * FROM books WHERE bookID = '$_GET[id]'");
$row = mysqli_fetch_array($result);
echo "<div class='container' align='center'><img  class='img-thumbnail'  height='350' width='250' src='upload/" . $row["imagepath"]."'>";
echo "<table class='table'>";
echo "<tr><td><b>ID</b></td><td>" . $row["bookID"] . "</td></tr>" .
"<tr><td><b>Title</b></td><td>" . $row["title"] . "</td></tr>" .
"<tr><td><b>ISBN</b></td><td>" . $row["isbn"] . "</td></tr>" .
"<tr><td><b>Author</b></td><td>" . $row["author"] . "</td></tr>" . 
"<tr><td><b>Categorie</b></td><td>" . $row["category"] . "</td></tr>" .
"<tr><td><b>Language</b></td><td>" . $row["language"] . "</td></tr>" .
"<tr><td><b>Publisher</b></td><td>" . $row["publisher"] . "</td></tr>" .
"<tr><td><b>Date released</b></td><td>" . $row["datereleased"] . "</td></tr>" .
"<tr><td><b>Price</b></td><td>" . $row["price"] . "</td></tr>";
echo "</table></div>";
?>
<br/>
<div class="container" align="right"><a  class="btn btn-primary" href="select.php">Back</a></div>
</body>
</body>
</html>