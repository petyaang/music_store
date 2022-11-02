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
$result = mysqli_query($dbConn, "SELECT r.merchsale_id, e.merchamount_id, m.title, e.price, r.sale_id, s.sale_date, r.merch_number
                                  FROM Merch_sale r
								  JOIN Merch_amount e
								  ON r.merchamount_id=e.merchamount_id
								  JOIN Merchandise m
								  ON e.merch_id=m.merch_id
								  JOIN Sales s
								  ON r.sale_id=s.sale_id
								  ORDER BY merchsale_id");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>ID на стока</th><th>Стока</th><th>Цена</th><th>ID на продажба</th><th>Дата на продажба</th><th>Бройка</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['merchsale_id']."</td><td>".$row['merchamount_id']."</td><td>".$row['title']."</td><td>".$row['price']."</td><td>".$row['sale_id']."</td><td>".$row['sale_date']."</td><td>".$row['merch_number']."</td></tr>"; }
?>
<label for="merchsale_id">Избери запис за изтриване (от долупосочените): </label> <select name="merchsale_id" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Merch_sale");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['merchsale_id'] .'">'.$p['merchsale_id'].'</option>';
?>
</select><br><br>
<input type="submit" name="submit" value="Изтрий"/><br><br>
</pre>
</form>
<?php
include "config.php";

if (isset($_POST["submit"]))
 {
 if (isset($_POST['merchsale_id'])){
 $merchsale_id = $_POST['merchsale_id'];}
 
 $sql = "DELETE FROM Merch_sale WHERE merchsale_id='$merchsale_id'";
 $r=mysqli_query($dbConn,$sql);
 if (!$r)
 die('Грешка при изтриване на записа. <br>');
 echo "Записът е изтрит!<br><br>";
 
 $result = mysqli_query($dbConn,"SELECT r.merchsale_id, e.merchamount_id, m.title, e.price, r.sale_id, s.sale_date, r.merch_number
                                  FROM Merch_sale r
								  JOIN Merch_amount e
								  ON r.merchamount_id=e.merchamount_id
								  JOIN Merchandise m
								  ON e.merch_id=m.merch_id
								  JOIN Sales s
								  ON r.sale_id=s.sale_id
								  ORDER BY merchsale_id");
 echo "Стоки на продажба в музикалния магазин:";
 echo "<ol>";
 while($row = mysqli_fetch_array($result)){
 echo "<li>".$row['merchamount_id'].", ".$row['title'].", ".$row['price'].", ".$row['sale_id'].", ".$row['sale_date'].", ".$row['merch_number']."</li>"; }
 echo "</ol>";
 }

?>
</body>
</html>