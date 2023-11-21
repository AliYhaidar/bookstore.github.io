<?php
require_once("conn.php");
$user = $_POST["user"];
$email=$_POST["email"];
$pass = $_POST["pass"];
$pass1 = md5($pass);
$pass2 = sha1($pass1);
$salt = "eu21cie3i2kd";
$pass3 = crypt($pass2, $salt);
$pass4 = $pass3.$pass2;
$result1 = mysqli_query($con,"SELECT * from login WHERE username = '$user'");
	if(mysqli_num_rows($result1) ==true){
		header("Location: insertuser.php?error=1");
	} else {
		mysqli_query($con, "INSERT INTO login (username,email , password, level, date, time) VALUES ('$user','$email','$pass4',0,CURDATE(),CURTIME())");
header("Location: login.php?msg=1");

		}
?>