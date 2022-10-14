<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<label for="merch_id">Избери стока: </label> <select name="title" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Merchandise");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['merch_id'] .'">'.$p['title'].'</option>';
?>
</select><br><br>
Редактирай стока: <br><br>
<label for="merchtype_id">Вид стока: </label> <select name="merchtype_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Merchandise_types");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['merchtype_id'] .'">'.$p['merchtype_name'].'</option>';
?>
</select><br><br>

Година: <input type="text" name="year"/><br><br>
Заглавие: <input type="text" name="titlemerch"/><br><br>
<label for="artist_id">Изпълнител: </label> <select name="artist_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Artist");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['artist_id'] .'">'.$p['artist_name'].'</option>';
?>
</select><br><br>
<label for="genre_id">Жанр: </label> <select name="genre_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Genre");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['genre_id'] .'">'.$p['genre_name'].'</option>';
?>
</select><br><br>
<label for="company_id">Компания: </label> <select name="company_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Company");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['company_id'] .'">'.$p['company_name'].'</option>';
?>
</select><br><br>
Цена: <input type="text" name="price"/><br><br>

<input type="submit" name="submit" value="Редактирай"/><br><br>
</pre>
</form>
<?php
include "config.php";

if (isset($_POST["submit"]))
 {
 if (isset($_POST['title'])){
 $merch_id = $_POST['title'];}
 if (isset($_POST['merchtype_name'])){
 $merchtype_id = $_POST['merchtype_name'];}
 $year = $_POST['year'];
 $titlemerch = $_POST['titlemerch'];
 if (isset($_POST['artist_name'])){
 $artist_id = $_POST['artist_name'];}
  if (isset($_POST['genre_name'])){
 $genre_id = $_POST['genre_name'];}
 if (isset($_POST['company_name'])){
 $company_id = $_POST['company_name'];}
 $price = $_POST['price'];
 
 $sql = "UPDATE Merchandise
         SET merchtype_id='$merchtype_id',
		 year='$year',
		 title='$titlemerch',
		 artist_id='$artist_id',
		 genre_id='$genre_id',
		 company_id='$company_id',
		 price='$price'
         WHERE merch_id='$merch_id'";
 mysqli_query($dbConn,$sql);
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