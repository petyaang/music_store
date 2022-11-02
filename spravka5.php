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

 $sql="SELECT sub.empl_name, MAX(sub.sale_count) as maxsales
       FROM (
	     SELECT s.empl_id, e.empl_name, COUNT(s.sale_id) as sale_count
         FROM Sales s
         JOIN employee e
         ON s.empl_id=e.empl_id
         GROUP BY s.empl_id
         ORDER BY sale_count DESC
	   ) sub
	   LIMIT 1";
 $result = mysqli_query($dbConn,$sql);
 if (!$result)
 {
 die('Грешка!');
 }
 
 while($row = mysqli_fetch_array($result)){
 echo "<br><br><b>Име на служителя: ".$row['empl_name']."<br>Брой продажби: ".$row['maxsales']; }
 
?>
</body>
</html>