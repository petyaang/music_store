<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<pre><strong><font size=6>Наличност на стоки</font></strong><br><br>

<label for="merch_id">Албум: </label> <select name="title" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Merchandise");
while($t = mysqli_fetch_array($sql))
echo '<option value="'. $t['merch_id'] .'">'.$t['title'].'</option>';
?>
</select><br>
Цена: <input type="text" name="price"/><br>
Наличност: <input type="text" name="merch_amount"/><br>

<input type="submit" name="submit" value="Въведи"/> <a href="musicstore_input.php">Върни се обратно</a><br>
</pre>
</form>
<?php
 include "config.php";
 if (isset($_POST["submit"]))
 {
 if (isset($_POST['title'])){
 $merch_id = $_POST['title'];}
 $price = $_POST['price'];
 $merch_amount = $_POST['merch_amount'];
 

 if (!empty($merch_id)&&!empty($price)&&!empty($merch_amount))
 {
 $sql="INSERT INTO Merch_amount (price, merch_amount, merch_id) VALUES ('$price', '$merch_amount', '$merch_id')";
 $result = mysqli_query($dbConn,$sql);
 if (!$result)
 {
 die('Грешка!');
 }
 echo "Добавихте един запис.";
 }
 else
 echo "Не сте въвели данни!";
 
 $result = mysqli_query($dbConn, "SELECT m.merchamount_id, m.price, m.merch_amount, e.title
                                  FROM Merch_amount m
								  JOIN Merchandise e
								  ON m.merch_id=e.merch_id
								  ORDER BY merchamount_id");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>Цена</th><th>Наличност</th><th>Албум</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['merchamount_id']."</td><td>".$row['price']."</td><td>".$row['merch_amount']."</td><td>".$row['title']."</td></tr>"; }
 }
?>
</body>
</html>