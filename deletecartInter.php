<?php
require_once("conn.php");
mysqli_query($con, "DELETE FROM cart WHERE title ='$_GET[title]'");
header("Location: index.php");
?>

