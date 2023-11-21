<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>WeBook</title>
</head>

<body>
<?php
require_once("conn.php");
$result = mysqli_query($con, "SELECT * FROM books WHERE bookID = '$_POST[id]'");
$row = mysqli_fetch_array($result);
?>
<table border="1">
<?php
$arr1=($_POST["book"]);
?>
</table>

<br><br>

<a href="select.php">Back</a>
</body>
</html>

