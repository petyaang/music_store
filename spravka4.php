<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<pre><strong>Изведи закупени стоки за период, подредени по клиенти и дати</strong><br><br>
Въведете начална дата(yyyy-mm-dd): <input type="text" name="start"/><br>
Въведете крайна дата(yyyy-mm-dd): <input type="text" name="end"/><br>

<input type="submit" name="submit" value="Изведи"/> <a href="spravki.php">Върни се обратно към справки</a><br>
</pre>
</form>
<?php
 include "config.php";
 if (isset($_POST["submit"]))
 {
 $start = $_POST['start'];
 $end = $_POST['end'];
 
 if (!empty($start)&&!empty($end))
 {
 $sql="SELECT e.title, t.merchtype_name, m.merch_number, e.year, a.artist_name, v.price, c.client_name, s.sale_date
FROM Sales s
JOIN Client c
ON s.client_id=c.client_id
JOIN Merch_sale m
ON s.sale_id=m.sale_id
JOIN Merch_amount v
ON m.merchamount_id=v.merchamount_id
JOIN Merchandise e
ON v.merch_id=e.merch_id
JOIN Merchandise_types t
ON e.merchtype_id=t.merchtype_id
JOIN Artist a
ON e.artist_id=a.artist_id
WHERE s.sale_date BETWEEN '$start' AND '$end'	 
ORDER BY s.client_id, sale_date";
 $result = mysqli_query($dbConn,$sql);
 if (!$result)
 {
 die('Грешка!');
 }
 
 echo "<table border='2' align='center'>";
 echo "<tr><th>Заглавие</th><th>Вид стока</th><th>Бройка</th><th>Година</th><th>Изпълнител</th><th>Цена</th><th>Клиент</th><th>Дата на продажба</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['title']."</td><td>".$row['merchtype_name']."</td><td>".$row['merch_number']."</td><td>".$row['year']."</td><td>".$row['artist_name']."</td><td>".$row['price']."</td><td>".$row['client_name']."</td><td>".$row['sale_date']."</td></tr>"; }
 
 }
 }
?>
</body>
</html>