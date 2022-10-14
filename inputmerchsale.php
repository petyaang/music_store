<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<pre><strong><font size=6>Стоки на продажба</font></strong><br><br>
<label for="merch_id">Стока: </label> <select name="title" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Merchandise");
while($t = mysqli_fetch_array($sql))
echo '<option value="'. $t['merch_id'] .'">'.$t['title'].'</option>';
?>
</select><br>
<label for="sale_id">Продажба: </label> <select name="sale_id" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Sales");
while($t = mysqli_fetch_array($sql))
echo '<option value="'. $t['sale_id'] .'">'.$t['sale_id'].'</option>';
?>
</select> <a href="displaysales.php">Виж продажби</a><br> <br>
Бройка: <input type="text" name="number"/><br>

<input type="submit" name="submit" value="Въведи"/> <a href="musicstore_input.php">Върни се обратно</a><br>
</pre>
</form>
<?php
 include "config.php";
 if (isset($_POST["submit"]))
 {
 if (isset($_POST['title'])){
 $merch_id = $_POST['title'];}
 if (isset($_POST['sale_id'])){
 $sale_id = $_POST['sale_id'];}
 $number = $_POST['number'];

 if (!empty($merch_id)&&!empty($sale_id)&&!empty($number))
 {
 $sql="INSERT INTO Merch_sale (merch_id, sale_id, merch_number) VALUES ('$merch_id', '$sale_id', '$number')";
 $result = mysqli_query($dbConn,$sql);
 if (!$result)
 {
 die('Грешка!');
 }
 echo "Добавихте един запис.";
 }
 else
 echo "Не сте въвели данни!";
 
 $result = mysqli_query($dbConn, "SELECT r.merchsale_id, m.title, s.sale_date, r.merch_number
                                  FROM Merch_sale r
								  JOIN Merchandise m
								  ON r.merch_id=m.merch_id
								  JOIN Sales s
								  ON r.sale_id=s.sale_id
								  ORDER BY merchsale_id");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>Стока</th><th>Дата на продажба</th><th>Бройка</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['merchsale_id']."</td><td>".$row['title']."</td><td>".$row['sale_date']."</td><td>".$row['merch_number']."</td></tr>"; }
 }
?>
</body>
</html>