<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<label for="genre_id">Избери жанр: </label> <select name="genre_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Genre");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['genre_id'] .'">'.$p['genre_name'].'</option>';
?>
</select><br><br>
Редактирай жанр:<input type="text" name="genre"/><br><br>
<input type="submit" name="submit" value="Редактирай"/><br><br>
</pre>
</form>
<?php
include "config.php";

if (isset($_POST["submit"]))
 {
 if (isset($_POST['genre_name'])){
 $genre_id = $_POST['genre_name'];}
 $genre = $_POST['genre'];
 
 $sql = "UPDATE Genre
         SET genre_name='$genre'
         WHERE genre_id='$genre_id'";
 mysqli_query($dbConn,$sql);
 $result = mysqli_query($dbConn,"SELECT genre_name FROM Genre");
 echo "Жанрове в музикалния магазин:";
 echo "<ol>";
 while($row = mysqli_fetch_array($result)){
 echo "<li>".$row['genre_name']."</li>"; }
 echo "</ol>";
 }

?>
</body>
</html>