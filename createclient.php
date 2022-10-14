<?php
 include "config.php";
 
 $sql = "CREATE TABLE Client (
 client_id INT(4) NOT NULL AUTO_INCREMENT,
 client_name VARCHAR(50) DEFAULT NULL,
 client_address VARCHAR(50) DEFAULT NULL,
 client_number VARCHAR(15) DEFAULT NULL,
 PRIMARY KEY (client_id)
 ) ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$sql);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата Client е създадена!";
 
?>