<!doctype html>
<html>
<head>
<meta charset="utf-8">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<title>WeBook</title>
</head>

<body>
<?php
require_once("conn.php");
$result = mysqli_query($con, "SELECT * FROM books WHERE bookID = '$_GET[id]'");
$row = mysqli_fetch_array($result);
?>
<form id="form1" name="form1" method="post" action="updateInter.php"  enctype="multipart/form-data" >
 <div class='container'>
  <table class='table'>
    <tr>
      <td>ID</td>
      <td><?php echo $row["bookID"];?>
      <input type="hidden" name="id" id="ID" value="<?php echo $row["bookID"];?>" /></td>
    </tr>
    <tr>
      <td>Title</td>
      <td>
      <input name="title" type="text" id="title" value="<?php echo $row["title"];?>" /></td>
    </tr>
    <tr>
      <td>ISBN</td>
      <td>
      <input name="isbn" type="text" id="isbn" value="<?php echo $row["isbn"];?>" /></td>
    </tr>
    <tr>
      <td>Author</td>
      <td><input type="text" name="author" id="author" value="<?php echo $row["author"];?>"/></td>
    </tr>
    <tr>
      <td>Category</td>
      <td><input type="text" name="category" id="category" value="<?php echo $row["category"];?>"/></td>
    </tr>
     <tr>
      <td>Language</td>
      <td><input type="text" name="language" id="language" value="<?php echo $row["language"];?>"/></td>
    </tr>
    <tr>
      <td>Publisher</td>
      <td><input type="text" name="publisher" id="publisher" value="<?php echo $row["publisher"];?>"/></td>
    </tr>
    <tr>
      <td>Date released</td>
      <td><input type="text" name="datereleased" id="datereleased" value="<?php echo $row["datereleased"];?>"/></td>
    </tr>
     <tr>
      <td>Price</td>
      <td><input type="text" name="price" id="price" value="<?php echo $row["price"];?>"/></td>
    </tr>
    <tr>
      <td>Genre</td>
      <td><input type="text" name="genre" id="genre" value="<?php echo $row["genre"];?>"/></td>
    </tr>
 <tr>
      <input type="file" name="file" id="file" accept="image/png, image/jpeg"  value="<?php echo $row["imagepath"];?>"> 
    </tr>    
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Update" /></td>
    </tr>
  </table>
  </div>
</form>
<br/><br />

<div class="container" align="right"><a  class="btn btn-primary" href="select.php">Back</a></div>
</body>
</html>
