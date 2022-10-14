<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<?php
 include "config.php";

 $sql="SELECT s.sale_id, m.merch_id, t.merchtype_name, e.title, e.year, e.price, c.client_name, l.empl_name, s.sale_date
       FROM Sales s
	   JOIN Client c
	   ON s.client_id=c.client_id
	   JOIN Employee l
	   ON s.empl_id=l.empl_id
       JOIN Merch_sale m
       ON s.sale_id=m.sale_id
       JOIN Merchandise e
       ON m.merch_id=e.merch_id
	   JOIN Merchandise_types t
	   ON e.merchtype_id=t.merchtype_id
       WHERE year=2022
	   ORDER BY s.empl_id, sale_date DESC
	   LIMIT 5";
 $result = mysqli_query($dbConn,$sql);
 if (!$result)
 {
 die('Грешка!');
 }
 
 echo "<table border='2' align='center'>";
 echo "<tr><th>Продажба</th><th>Стока</th><th>Вид стока</th><th>Заглавие</th><th>Година</th><th>Цена</th><th>Клиент</th><th>Служител</th><th>Дата на продажба</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['sale_id']."</td><td>".$row['merch_id']."</td><td>".$row['merchtype_name']."</td><td>".$row['title']."</td><td>".$row['year']."</td><td>".$row['price']."</td><td>".$row['client_name']."</td><td>".$row['empl_name']."</td><td>".$row['sale_date']."</td></tr>"; }
 
?>
</body>
</html>