
<?php
//echo $_FILES["file"]["type"];
//un tableau pour definir les extensions permises
require_once("conn.php");
date_default_timezone_set("Asia/Beirut");
$allowedExts = array("jpg", "jpeg", "gif", "png", "swf", "mp3", "txt", "pdf", "doc", "docx");
$allowedTypes = array("image/gif","image/jpg" , "image/jpeg", "image/png", "application/x-shockwave-flash", "audio/mp3", "text/plain","application/pdf", "application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document");
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
	$sql="INSERT INTO books (title, isbn, author, category, language, publisher, datereleased, price,imagepath,genre) VALUES ('$_POST[title]','$_POST[isbn]','$_POST[author]','$_POST[category]','$_POST[language]','$_POST[publisher]','$_POST[datereleased]','$_POST[price]','$imgNewName','$_POST[genre]')";
	header("Location: select.php");
	mysqli_query($con,$sql);
	
	$cat = $_POST["category"];
	$result = mysqli_query($con,"select * from bookcategory where CategoryName='$cat' ");
	if(mysqli_num_rows($result) == false ){
		$sql1="insert into bookcategory(CategoryName) values('$cat')";
		mysqli_query($con,$sql1);
	}
	

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

?>
