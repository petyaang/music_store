<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<label for="merch_id">Избери стока за изтриване: </label> <select name="title" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Merchandise");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['merch_id'] .'">'.$p['title'].'</option>';
?>
</select><br><br>
<input type="submit" name="submit" value="Изтрий"/><br><br>
</pre>
</form>
<?php
include "config.php";

if (isset($_POST["submit"]))
 {
 if (isset($_POST['title'])){
 $merch_id = $_POST['title'];}
 
 $sql = "DELETE FROM Merchandise WHERE merch_id='$merch_id'";
 $r=mysqli_query($dbConn,$sql);
 if (!$r)
 die('Грешка при изтриване на записа. <br>');
 echo "Записът е изтрит!<br><br>";
 
 $result = mysqli_query($dbConn,"SELECT t.merchtype_name, m.year, m.title, a.artist_name, g.genre_name, c.company_name, m.price
                                 FROM Merchandise m
								 JOIN Merchandise_types t
								 ON m.merchtype_id=t.merchtype_id
								 JOIN Artist a 
								 ON m.artist_id=a.artist_id
								 JOIN Genre g 
								 ON m.genre_id=g.genre_id
								 JOIN Company c
								 ON m.company_id=c.company_id
								 ORDER BY m.merch_id");
 echo "Стоки в музикалния магазин:";
 echo "<ol>";
 while($row = mysqli_fetch_array($result)){
 echo "<li>".$row['merchtype_name'].", ".$row['year'].", ".$row['title'].", ".$row['artist_name'].", ".$row['genre_name'].", ".$row['company_name'].", ".$row['price']."</li>"; }
 echo "</ol>";
 }
 
?>
</body>
</html>