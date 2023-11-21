<?php
require_once("conn.php");

mysqli_query($con, "UPDATE books SET title='$_POST[title]', isbn='$_POST[isbn]', author='$_POST[author]', category='$_POST[category]', language='$_POST[language]', publisher='$_POST[publisher]', datereleased='$_POST[datereleased]', price='$_POST[price]', genre='$_POST[genre]' WHERE bookID='$_POST[id]'");
 echo (mysqli_error($con));



//echo $_FILES["file"]["type"];
//un tableau pour definir les extensions permises
require_once("conn.php");
date_default_timezone_set("Asia/Beirut");
$allowedExts = array("jpg", "jpeg", "gif", "png", "swf", "mp3", "txt", "pdf", "doc", "docx");
$allowedTypes = array("image/gif", "image/jpeg", "image/png", "application/x-shockwave-flash", "audio/mp3", "text/plain","application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document");
//extraire l'extension du fichier telecharge
$array = explode(".", $_FILES["file"]["name"]);
$extension = end($array);

//restrictions pour accepter un fichier
if (in_array($_FILES["file"]["type"], $allowedTypes) && ($_FILES["file"]["size"] < 20000000) && in_array(strtolower($extension), $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br>";
	$imgNewName = generateRandomString() .  date('H-i-s') . "." . $extension;
	move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $imgNewName);
	echo "Stored in: " . "upload/" . generateRandomString();
	
     mysqli_query($con, "UPDATE books SET imagepath='$imgNewName' where title='$_POST[title]' ");
	 echo (mysqli_error($con));
    }
  }
else
  {
  echo "Invalid file";
  }

function generateRandomString($length = 35) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
header("Location: select.php");
?>