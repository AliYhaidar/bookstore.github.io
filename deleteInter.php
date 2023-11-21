<?php
require_once("conn.php");
mysqli_query($con, "DELETE FROM books WHERE bookID = '$_GET[id]'");
header("Location: select.php");
?>

