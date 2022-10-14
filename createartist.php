<?php
 include "config.php";
 
 $sql = "CREATE TABLE Artist (
 artist_id INT(4) NOT NULL AUTO_INCREMENT,
 artist_name VARCHAR(50) DEFAULT NULL,
 PRIMARY KEY(artist_id)
 ) ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$sql);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата Artist е създадена!";
 
?>