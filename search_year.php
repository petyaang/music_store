<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<pre><strong>Търси стоки по година</strong><br><br>
Година: <input type="text" name="year"/><br>

<input type="submit" name="submit" value="Търси"/> <a href="searchmerch.php">Върни се обратно</a><br>
</pre>
</form>
<?php
 include "config.php";
 if (isset($_POST["submit"]))
 {
 $year = $_POST['year'];
 
 $result = mysqli_query($dbConn, "SELECT t.merchtype_name, m.year, m.title, a.artist_name, g.genre_name, c.company_name, e.price, e.merch_amount
FROM Merch_amount e
JOIN Merchandise m
ON e.merch_id=m.merch_id
JOIN Merchandise_types t
ON m.merchtype_id=t.merchtype_id
JOIN Artist a
ON m.artist_id=a.artist_id
JOIN Genre g
ON m.genre_id=g.genre_id
JOIN Company c
ON m.company_id=c.company_id
WHERE m.year='$year'
ORDER BY a.artist_id, m.title");
 echo "<table border='2' align='center'>";
 echo "<tr><th>Вид стока</th><th>Година</th><th>Заглавие</th><th>Изпълнител</th><th>Жанр</th><th>Музикална компания</th><th>Цена</th><th>Наличност</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['merchtype_name']."</td><td>".$row['year']."</td><td>".$row['title']."</td><td>".$row['artist_name']."</td><td>".$row['genre_name']."</td><td>".$row['company_name']."</td><td>".$row['price']."</td><td>".$row['merch_amount']."</td></tr>"; }
 }
?>
</body>
</html>