<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<label for="genre_id">Избери жанр за изтриване: </label> <select name="genre_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Genre");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['genre_id'] .'">'.$p['genre_name'].'</option>';
?>
</select><br><br>
<input type="submit" name="submit" value="Изтрий"/><br><br>
</pre>
</form>
<?php
include "config.php";

if (isset($_POST["submit"]))
 {
 if (isset($_POST['genre_name'])){
 $genre_id = $_POST['genre_name'];}
 
 $sql = "DELETE FROM Genre WHERE genre_id='$genre_id'";
 $r=mysqli_query($dbConn,$sql);
 if (!$r)
 die('Грешка при изтриване на записа. <br>');
 echo "Записът е изтрит!<br><br>";
 
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