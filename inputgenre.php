<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<pre><strong><font size=6>Жанрове</font></strong><br><br>
Име на жанра: <input type="text" name="genre"/><br>
  
<input type="submit" name="submit" value="Въведи"/> <a href="musicstore_input.php">Върни се обратно</a><br>
</pre>
</form>
<?php
 include "config.php";
 if (isset($_POST["submit"]))
 {
 $genre = $_POST['genre'];
 
 if (!empty($genre))
 {
 $sql="INSERT INTO Genre (genre_name) VALUES ('$genre')";
 $result = mysqli_query($dbConn,$sql);
 if (!$result)
 {
 die('Грешка!');
 }
 echo "Добавихте един запис. <br>";
 }
 else
 echo "Не сте въвели данни! <br>";
 
 $result = mysqli_query($dbConn, "SELECT * FROM Genre");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>Жанр</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['genre_id']."</td><td>".$row['genre_name']."</td></tr>"; }
 }
?>
</body>
</html>