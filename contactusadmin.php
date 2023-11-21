<?php
session_start();
$dbName="book";
$mysql_username="root";
$mysql_password="";
$server_name ="localhost";
$conn =mysqli_connect($server_name, $mysql_username, $mysql_password,$dbName);
if($conn){
 
    $contact="select * from contactus order by Date desc;";
	
    $query2=@mysqli_query($conn,$contact)or die( mysqli_error($conn));
  
 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body background="C:\wamp64\www\test\images\philosophy.jpg">

<br>
  <h2> This Table is showing the responded messages from people </h2>
  <form name="f" method="post">
  <table cellspacing="0" border="1">
  <tr>
  <th>Message</th>
  <th>Date</th>
  <th>Name</th>
  <th>PhoneNumber</th>
  <th>Email</th>
  </tr>
  <?php 
  
  while($r=mysqli_fetch_array($query2)){
  ?>
  <tr>
  <td><?php echo $r['message']; ?></td>
  <td><?php echo $r['Date']; ?></td>
  <td><?php echo $r['Name']; ?></td>
  <td><?php echo $r['phone']; ?></td>
  <td><?php echo $r['email']; ?></td>
  </tr>
  <?php }
 ?>
 
  </table>
  </form>
  </body>
  </html>