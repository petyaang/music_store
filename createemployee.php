<?php
 include "config.php";
 
 $sql = "CREATE TABLE Employee (
 empl_id INT(4) NOT NULL AUTO_INCREMENT,
 empl_name VARCHAR(50) DEFAULT NULL,
 pos_id INT(4) NOT NULL,
 empl_number VARCHAR(15) DEFAULT NULL,
 PRIMARY KEY (empl_id),
 FOREIGN KEY (pos_id) REFERENCES Position (pos_id) ON DELETE CASCADE
 ) ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$sql);
 if(!$result)
 die('Грешка при създаване на таблицата.'); 
 echo "Таблицата Employee създадена!";
?>