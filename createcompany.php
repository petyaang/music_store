<?php
 include "config.php";
 
 $sql = "CREATE TABLE Company (
 company_id INT(4) NOT NULL AUTO_INCREMENT,
 company_name VARCHAR(50) DEFAULT NULL,
 PRIMARY KEY(company_id)
 ) ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$sql);
 if(!$result)
 die('Грешка при създаване на таблицата.');
 echo "Таблицата Company е създадена!";
 
?>