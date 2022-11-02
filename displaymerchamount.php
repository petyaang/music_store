<?php
include "config.php";
$result = mysqli_query($dbConn, "SELECT a.merchamount_id, a.price, a.merch_amount, m.title
                                 FROM Merch_amount a
								 JOIN Merchandise m 
								 ON a.merch_id=m.merch_id
								 ORDER BY a.merchamount_id");
 echo "<table border='2'>";
 echo "<tr><th>ID</th><th>Цена</th><th>Наличност</th><th>Албум</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['merchamount_id']."</td><td>".$row['price']."</td><td>".$row['merch_amount']."</td><td>".$row['title']."</td></tr>"; }
?>
<a href="inputmerchsale.php">Върни се обратно</a><br>