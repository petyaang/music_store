<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<?php
include "config.php";
$result = mysqli_query($dbConn, "SELECT m.merchamount_id, m.price, m.merch_amount, m.merch_id, e.title
                                  FROM Merch_amount m
								  JOIN Merchandise e 
								  ON m.merch_id=e.merch_id
								  ORDER BY merchamount_id");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>Цена</th><th>Наличност</th><th>Албум ID</th><th>Албум</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['merchamount_id']."</td><td>".$row['price']."</td><td>".$row['merch_amount']."</td><td>".$row['merch_id']."</td><td>".$row['title']."</td></tr>"; }
?>
<label for="merchamount_id">Избери ID от долупосочените: </label> <select name="merchamount_id" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Merch_amount");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['merchamount_id'] .'">'.$p['merchamount_id'].'</option>';
?>
</select><br><br>
Редактирай наличности на стоки: <br><br>
Цена: <input type="text" name="price"/><br><br>
Наличност: <input type="text" name="merch_amount"/><br><br>
<label for="merch_id">ID на албум: </label> <select name="merch_id" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Merchandise");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['merch_id'] .'">'.$p['merch_id'].'</option>';
?>
</select><br><br>

<input type="submit" name="submit" value="Редактирай"/><br><br>
</pre>
</form>
<?php
include "config.php";

if (isset($_POST["submit"]))
 {
 if (isset($_POST['merchamount_id'])){
 $merchamount_id = $_POST['merchamount_id'];}
 $price = $_POST['price'];
 $merch_amount = $_POST['merch_amount'];
 if (isset($_POST['merch_id'])){
 $merch_id = $_POST['merch_id'];}
 

 $sql = "UPDATE Merch_amount
         SET price='$price',
		 merch_amount='$merch_amount',
		 merch_id='$merch_id'
         WHERE merchamount_id='$merchamount_id'";
 mysqli_query($dbConn,$sql);
 $result = mysqli_query($dbConn,"SELECT m.merchamount_id, m.price, m.merch_amount, e.title
                                  FROM Merch_amount m
								  JOIN Merchandise e 
								  ON m.merch_id=e.merch_id
								  ORDER BY merchamount_id");
 echo "Наличности на стоки в музикалния магазин:";
 echo "<ol>";
 while($row = mysqli_fetch_array($result)){
 echo "<li>".$row['price'].", ".$row['merch_amount'].", ".$row['title']."</li>"; }
 echo "</ol>";
 }
 
?>
</body>
</html>