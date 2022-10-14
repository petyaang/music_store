<?php
include "config.php";
$result = mysqli_query($dbConn, "SELECT s.sale_id, c.client_name, e.empl_name, s.sale_date
                                 FROM Sales s
								 JOIN Client c  
								 ON s.client_id=c.client_id
								 JOIN Employee e 
								 ON s.empl_id=e.empl_id
								 ORDER BY s.sale_id");
 echo "<table border='2'>";
 echo "<tr><th>ID</th><th>Клиент</th><th>Служител</th><th>Дата на продажба</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['sale_id']."</td><td>".$row['client_name']."</td><td>".$row['empl_name']."</td><td>".$row['sale_date']."</td></tr>"; }
?>
<a href="inputmerchsale.php">Върни се обратно</a><br>