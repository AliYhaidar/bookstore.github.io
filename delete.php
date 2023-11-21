<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>WeBook</title>
</head>

<body>
<?php
require_once("conn.php");
$result = mysqli_query($con, "SELECT title FROM books WHERE bookID = '$_GET[id]'");
$row = mysqli_fetch_array($result);
echo "Do you want to delete " . $row["title"] . "?<br/><br/>";
echo "<a href='deleteInter.php?id=$_GET[id]'>YES</a><br/>";
echo "<a href='select.php'>No</a>";
echo (mysqli_error($con));
?>

</body>
</html>
