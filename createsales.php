<?php
 include "config.php";
 
 $sql = "CREATE TABLE Sales (
 sale_id INT(4) NOT NULL AUTO_INCREMENT,
 client_id INT(4) NOT NULL,
 empl_id INT(4) NOT NULL,
 sale_date DATE,
 PRIMARY KEY (sale_id),
 FOREIGN KEY (client_id) REFERENCES Client (client_id) ON DELETE CASCADE,
 FOREIGN KEY (empl_id) REFERENCES Employee (empl_id) ON DELETE CASCADE
 ) ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$sql);
 if(!$result)
 die('Грешка при създаване на таблицата.'); 
 echo "Таблицата Sales е създадена!";
?>