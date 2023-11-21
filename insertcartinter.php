<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>WeBook</title>
</head>
<?php
require_once("conn.php");
$sql="INSERT INTO cart (username, title, number,date,time) VALUES ('$_POST[username]','$_POST[title]','$_POST[number]',CURDATE(),CURTIME())";
mysqli_query($con,$sql);

echo (mysqli_error($con));
echo "<script>
alert('Item added to cart :)');
window.location.href='index.php';
</script>";
?>
<body>
</body>
</html>


