<?php
$host= 'localhost'; 
$dbUser= 'root'; 
$dbPass= ''; 
if(!$dbConn=mysqli_connect($host, $dbUser, $dbPass)) {
 die('Не може да се осъществи връзка със сървъра.');
}
 $sql = 'CREATE Database music_store';
 if ($queryResource=mysqli_query($dbConn,$sql))
 {
 echo "Базата данни е създадена. <br>";
 }
 else
 {
 echo "Грешка при създаване на базата данни: ";
 }
?>