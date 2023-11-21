<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<title>WeBook</title>
</head>
<form id="form1" name="form1" method="post" action="upload_file.php"  enctype="multipart/form-data" >
<div class='container'>
  <table class='table'>
    <tr>
      <td>Title</td>
      <td>
      <input name="title" type="text" id="title" Required/></td>
    </tr>
    <tr>
      <td>ISBN</td>
      <td>
      <input name="isbn" type="text" id="isbn" Required/></td>
    </tr>
    <tr>
      <td>Author</td>
      <td><input type="text" name="author" id="author" Required/></td>
    </tr>
    <tr>
      <td>Category</td>
    
      <td><select name="category">
	  <?php
		require_once("conn.php");
		$result = mysqli_query($con,"select * from bookcategory");
		while($row = mysqli_fetch_array($result)){
			$category = $row["CategoryName"];
			echo " <option value=".$category.">".$category."</option> ";
		}
	?>
  
</select>
<p>
<a href="insertdata1.php" >New category</a>
</p>
</td>
    </tr>
     <tr>
      <td>Language</td>
      <td><select name="language">
  <option value="English">English</option>
  <option value="Frensh">Frensh</option>
  <option value="Arabic">Arabic</option>
</select>
</td>
    </tr>
    <tr>
      <td>Publisher</td>
      <td><input type="text" name="publisher" id="publisher" Required/></td>
    </tr>
    <tr>
      <td>Date released</td>
      <td><input type="text" name="datereleased" id="datereleased"Required/></td>
    </tr>
     <tr>
      <td>Price</td>
      <td><input type="text" name="price" id="price" Required/></td>
    </tr>
    <tr>
      <td>Genre</td>
      <td><select name="genre">
  <option value="Null">Null</option>
  <option value="New Release">New Release</option>
  <option value="Popular">Popular</option>
  <option value="Best Seller">Best Seller</option>
</select></td>
    </tr>
    <tr>
      <input type="file" name="file" id="file" accept="image/png, image/jpeg" required> 
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Insert" /></td>
    </tr>
  </table>
  </div>
</form>

<div class="container" align="right"><a  class="btn btn-primary" href="admin.php">Back</a></div>
<body>
</body>
</html>