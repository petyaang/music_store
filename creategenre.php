<?php
 include "config.php";
 
 $sql = "CREATE TABLE Genre (
 genre_id INT(4) NOT NULL AUTO_INCREMENT,
 genre_name VARCHAR(40) DEFAULT NULL,
 PRIMARY KEY(genre_id)
 ) ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$sql);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата Genre е създадена!";
 
?>