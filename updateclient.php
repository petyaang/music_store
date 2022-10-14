<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<label for="client_id">Избери клиент: </label> <select name="client_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Client");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['client_id'] .'">'.$p['client_name'].'</option>';
?>
</select><br><br>
Редактирай клиент: <br><br>
Име: <input type="text" name="name"/><br><br>
Адрес: <input type="text" name="address"/><br><br>
Телефонен номер: <input type="text" name="number"/><br><br>

<input type="submit" name="submit" value="Редактирай"/><br><br>
</pre>
</form>
<?php
include "config.php";

if (isset($_POST["submit"]))
 {
 if (isset($_POST['client_name'])){
 $client_id = $_POST['client_name'];}
 $name = $_POST['name'];
 $address = $_POST['address'];
 $number = $_POST['number'];
 
 $sql = "UPDATE Client
         SET client_name='$name',
		 client_address='$address',
		 client_number='$number'
         WHERE client_id='$client_id'";
 mysqli_query($dbConn,$sql);
 $result = mysqli_query($dbConn,"SELECT * FROM Client");
 echo "Клиенти в музикалния магазин:";
 echo "<ol>";
 while($row = mysqli_fetch_array($result)){
 echo "<li>".$row['client_name'].", ".$row['client_address'].", ".$row['client_number']."</li>"; }
 echo "</ol>";
 }
 
?>
</body>
</html>