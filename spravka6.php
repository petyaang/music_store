<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
 <form action="#" method="post">
<pre><strong>Изпълнители с най-много и най-малко албуми за даден период</strong><br><br>
Въведете години:<br>
Начало: <input type="text" name="start"/><br>
Край: <input type="text" name="end"/><br>

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
 $sql="SELECT sub.artist_name, MAX(sub.merch_count) as maxmerch, sub.year
       FROM (
	     SELECT m.merchamount_id, SUM(m.merch_amount) as merch_count, a.artist_name, e.year
         FROM Merch_amount m 
         JOIN Merchandise e
         ON m.merch_id=e.merch_id
		 JOIN Artist a
		 ON e.artist_id=a.artist_id
		 WHERE e.year BETWEEN '$start' AND '$end'	 
         GROUP BY a.artist_id
         ORDER BY merch_count DESC
	   ) sub
	   LIMIT 1";
 $result = mysqli_query($dbConn,$sql);
 if (!$result)
 {
 die('Грешка!');
 }
 
 while($row = mysqli_fetch_array($result)){
 echo "<br><br><b>Изпълнител с най-много албуми в магазина: ".$row['artist_name']."<br>Брой албуми: ".$row['maxmerch'];
 }
 
 $sql1="SELECT sub.artist_name, MIN(sub.merch_count) as maxmerch, sub.year
       FROM (
	     SELECT m.merchamount_id, SUM(m.merch_amount) as merch_count, a.artist_name, e.year
         FROM Merch_amount m 
         JOIN Merchandise e
         ON m.merch_id=e.merch_id
		 JOIN Artist a
		 ON e.artist_id=a.artist_id
		 WHERE e.year BETWEEN '$start' AND '$end'	 
         GROUP BY a.artist_id
         ORDER BY merch_count
	   ) sub
	   LIMIT 1";
 $result1 = mysqli_query($dbConn,$sql1);
 if (!$result1)
 {
 die('Грешка!');
 }
 
 while($row = mysqli_fetch_array($result1)){
 echo "<br><br><b>Изпълнител с най-малко албуми в магазина: ".$row['artist_name']."<br>Брой албуми: ".$row['maxmerch'];
 }
 }
 }
?>
</body>
</html>