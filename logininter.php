<?php
require_once("conn.php");

if(!isset($_POST["user"]) && !isset($_POST["pass"])){
	header("Location: login.php?error=1");
} else {
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$pass1 = md5($pass);
	$pass2 = sha1($pass1);
	$salt = "eu21cie3i2kd";
	$pass3 = crypt($pass2, $salt);
	$pass4 = $pass3.$pass2;
	
	$result = mysqli_query($con,"SELECT * from login WHERE username = '$user' AND password = '$pass4'");
	if(mysqli_num_rows($result) == false){
		header("Location: login.php?error=2");
	} else {
		$row = mysqli_fetch_array($result);
		session_start();
		if($row["level"] == 0){
			$_SESSION["pw18user"] = $row["username"];
			header("Location: index.php");
		} else {
			$_SESSION["pw18admin"] = $row["username"];
			header("Location: admin.php");
		}
	}
}

?>