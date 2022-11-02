<?php
 include "config.php";
 
 $sql = "CREATE TABLE Merch_sale (
 merchsale_id INT(4) NOT NULL AUTO_INCREMENT,
 merchamount_id INT(4) NOT NULL,
 sale_id INT(4) NOT NULL,
 merch_number INT(3) NOT NULL,
 PRIMARY KEY (merchsale_id),
 FOREIGN KEY (merchamount_id) REFERENCES Merch_amount (merchamount_id) ON DELETE CASCADE,
 FOREIGN KEY (sale_id) REFERENCES Sales (sale_id) ON DELETE CASCADE
 ) ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$sql);
 if(!$result)
 die('Грешка при създаване на таблицата.'); 
 echo "Таблицата Merch_sale е създадена!";
?>