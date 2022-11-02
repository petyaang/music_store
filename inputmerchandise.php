<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<pre><strong><font size=6>Стоки</font></strong><br><br>

<label for="merchtype_id">Вид стока: </label> <select name="merchtype_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Merchandise_types");
while($t = mysqli_fetch_array($sql))
echo '<option value="'. $t['merchtype_id'] .'">'.$t['merchtype_name'].'</option>';
?>
</select><br>
Година на издаване: <input type="text" name="year"/><br>
Заглавие: <input type="text" name="title"/><br>
<label for="artist_id">Изпълнител: </label> <select name="artist_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Artist");
while($e = mysqli_fetch_array($sql))
echo '<option value="'. $e['artist_id'].'">'.$e['artist_name'].'</option>';
?>
</select><br>
<label for="genre_id">Жанр: </label> <select name="genre_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Genre");
while($e = mysqli_fetch_array($sql))
echo '<option value="'. $e['genre_id'].'">'.$e['genre_name'].'</option>';
?>
</select><br>
<label for="company_id">Музикална компания: </label> <select name="company_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Company");
while($e = mysqli_fetch_array($sql))
echo '<option value="'. $e['company_id'].'">'.$e['company_name'].'</option>';
?>
</select><br>

<input type="submit" name="submit" value="Въведи"/> <a href="musicstore_input.php">Върни се обратно</a><br>
</pre>
</form>
<?php
 include "config.php";
 if (isset($_POST["submit"]))
 {
 if (isset($_POST['merchtype_name'])){
 $merchtype_id = $_POST['merchtype_name'];}
 $year = $_POST['year'];
 $title = $_POST['title'];
 if (isset($_POST['artist_name'])){
 $artist_id = $_POST['artist_name'];}
 if (isset($_POST['genre_name'])){
 $genre_id = $_POST['genre_name'];}
 if (isset($_POST['company_name'])){
 $company_id = $_POST['company_name'];}

 
 if (!empty($merchtype_id)&&!empty($year)&&!empty($title)&&!empty($artist_id)&&!empty($genre_id)&&!empty($company_id))
 {
 $sql="INSERT INTO Merchandise (merchtype_id, year, title, artist_id, genre_id, company_id) VALUES ('$merchtype_id', '$year', '$title', '$artist_id', '$genre_id', '$company_id')";
 $result = mysqli_query($dbConn,$sql);
 if (!$result)
 {
 die('Грешка!');
 }
 echo "Добавихте един запис.";
 }
 else
 echo "Не сте въвели данни!";
 
 $result = mysqli_query($dbConn, "SELECT m.merch_id, t.merchtype_name, m.year, m.title, a.artist_name, g.genre_name, c.company_name
                                  FROM Merchandise m
								  JOIN Merchandise_types t
								  ON m.merchtype_id=t.merchtype_id
								  JOIN Artist a
								  ON m.artist_id=a.artist_id
								  JOIN Genre g
								  ON m.genre_id=g.genre_id
								  JOIN Company c
								  ON m.company_id=c.company_id
								  ORDER BY merch_id");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>Вид стока</th><th>Година на издаване</th><th>Заглавие</th><th>Изпълнител</th><th>Жанр</th><th>Музикална компания</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['merch_id']."</td><td>".$row['merchtype_name']."</td><td>".$row['year']."</td><td>".$row['title']."</td><td>".$row['artist_name']."</td><td>".$row['genre_name']."</td><td>".$row['company_name']."</td></tr>"; }
 }
?>
</body>
</html>