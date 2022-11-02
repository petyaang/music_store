<?php
 include "config.php";
 
 $sql = "CREATE TABLE Merchandise (
 merch_id INT(4) NOT NULL AUTO_INCREMENT,
 merchtype_id INT(4) NOT NULL,
 year INT(5) NOT NULL,
 title VARCHAR(40) DEFAULT NULL,
 artist_id INT(4) NOT NULL,
 genre_id INT(4) NOT NULL,
 company_id INT(4) NOT NULL,
 PRIMARY KEY (merch_id),
 FOREIGN KEY (merchtype_id) REFERENCES Merchandise_types (merchtype_id) ON DELETE CASCADE,
 FOREIGN KEY (artist_id) REFERENCES Artist (artist_id) ON DELETE CASCADE,
 FOREIGN KEY (genre_id) REFERENCES Genre (genre_id) ON DELETE CASCADE,
 FOREIGN KEY (company_id) REFERENCES Company (company_id) ON DELETE CASCADE
 ) ENGINE=INNODB DEFAULT CHARSET=utf8";
 $result = mysqli_query($dbConn,$sql);
 if(!$result)
 die('Грешка при създаване на таблицата.'); 
 echo "Таблицата Merchandise създадена!";
?>