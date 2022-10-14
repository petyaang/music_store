<?php
 include "config.php";
 
 $sql = "CREATE TABLE Merchandise_types (
 merchtype_id INT(4) NOT NULL AUTO_INCREMENT,
 merchtype_name VARCHAR(30) DEFAULT NULL,
 PRIMARY KEY(merchtype_id)
 ) ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$sql);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата Merchandise_types е създадена!";
 
?>