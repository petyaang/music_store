<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<label for="artist_id">Избери изпълнител за изтриване: </label> <select name="artist_name" required> <option selected disabled>---Избери---</option>
<?php
include "config.php";
$sql = mysqli_query($dbConn, "SELECT * FROM Artist");
while($p = mysqli_fetch_array($sql))
echo '<option value="'. $p['artist_id'] .'">'.$p['artist_name'].'</option>';
?>
</select><br><br>
<input type="submit" name="submit" value="Изтрий"/><br><br>
</pre>
</form>
<?php
include "config.php";

if (isset($_POST["submit"]))
 {
 if (isset($_POST['artist_name'])){
 $artist_id = $_POST['artist_name'];}
 
 $sql = "DELETE FROM Artist WHERE artist_id='$artist_id'";
 $r=mysqli_query($dbConn,$sql);
 if (!$r)
 die('Грешка при изтриване на записа. <br>');
 echo "Записът е изтрит!<br><br>";
 
 $result = mysqli_query($dbConn,"SELECT artist_name FROM Artist");
 echo "Изпълнители в музикалния магазин:";
 echo "<ol>";
 while($row = mysqli_fetch_array($result)){
 echo "<li>".$row['artist_name']."</li>"; }
 echo "</ol>";
 }

?>
</body>
</html>