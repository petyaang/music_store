<?php
 include "config.php";
 
 $sql = "CREATE TABLE Merch_amount (
 merchamount_id INT(4) NOT NULL AUTO_INCREMENT,
 price DOUBLE(6,2) NOT NULL,
 merch_amount INT(4),
 merch_id INT(4) NOT NULL,
 PRIMARY KEY (merchamount_id),
 FOREIGN KEY (merch_id) REFERENCES Merchandise (merch_id) ON DELETE CASCADE
 ) ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$sql);
 if(!$result)
 die('Грешка при създаване на таблицата.'); 
 echo "Таблицата Merch_amount e създадена!";
?>