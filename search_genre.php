<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<pre><strong>Търси стоки по жанр</strong><br><br>
<label for="genre_id">Жанр: </label> <select name="genre_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Genre");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['genre_id'] .'">'.$p['genre_name'].'</option>';
?>
</select><br>

<input type="submit" name="submit" value="Търси"/> <a href="searchmerch.php">Върни се обратно</a><br>
</pre>
</form>
<?php
 include "config.php";
 if (isset($_POST["submit"]))
 {
 if (isset($_POST['genre_name'])){
 $genre_id = $_POST['genre_name'];}
 
 $result = mysqli_query($dbConn, "SELECT m.merch_id, t.merchtype_name, m.year, m.title, a.artist_name, g.genre_name, c.company_name, m.price
                                  FROM Merchandise m
								  JOIN Merchandise_types t
								  ON m.merchtype_id=t.merchtype_id
								  JOIN Artist a
								  ON m.artist_id=a.artist_id
								  JOIN Genre g
								  ON m.genre_id=g.genre_id
								  JOIN Company c
								  ON m.company_id=c.company_id 
								  WHERE m.genre_id='$genre_id'
								  ORDER BY merch_id");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>Вид стока</th><th>Година</th><th>Заглавие</th><th>Изпълнител</th><th>Жанр</th><th>Музикална компания</th><th>Цена</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['merch_id']."</td><td>".$row['merchtype_name']."</td><td>".$row['year']."</td><td>".$row['title']."</td><td>".$row['artist_name']."</td><td>".$row['genre_name']."</td><td>".$row['company_name']."</td><td>".$row['price']."</td></tr>"; }
 }
?>
</body>
</html>