<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
require_once("conn.php");
echo "Do you want to delete this item?<br/><br/>";
echo "<a href='deletecartInter.php?title=$_GET[title]'>YES</a><br/>";
echo "<a href='index.php'>No</a>";
echo (mysqli_error($con));
?>
<body>
</body>
</html>

