<?php
 include "config.php";
 
 $sql = "CREATE TABLE Position (
 pos_id INT(4) NOT NULL AUTO_INCREMENT,
 pos_name VARCHAR(30) DEFAULT NULL,
 PRIMARY KEY (pos_id)
 ) ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$sql);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата Position е създадена!";
 
?>