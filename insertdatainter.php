<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>WeBook</title>
<form id="form1" name="form1" method="post" action="upload_file.php"></form>
<?php $_POST[title];
?>
</head>
<?php
require_once("conn.php");
$sql="INSERT INTO books (title, isbn, author, category, language, publisher, datereleased, price, genre) VALUES ('$_POST[title]','$_POST[isbn]','$_POST[author]','$_POST[category]','$_POST[language]','$_POST[publisher]','$_POST[datereleased]','$_POST[price]','$_POST[genre]')";
mysqli_query($con,$sql);

echo (mysqli_error($con));
header("Location: upload_file.php");

?>



<body>
</body>
</html>


