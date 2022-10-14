<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<pre><strong><font size=6>Изпълнители</font></strong><br><br>
Име на изпълнителя: <input type="text" name="name"/><br>
  
<input type="submit" name="submit" value="Въведи"/> <a href="musicstore_input.php">Върни се обратно</a><br>
</pre>
</form>
<?php
 include "config.php";
 if (isset($_POST["submit"]))
 {
 $name = $_POST['name'];
 
 if (!empty($name))
 {
 $sql="INSERT INTO Artist (artist_name) VALUES ('$name')";
 $result = mysqli_query($dbConn,$sql);
 if (!$result)
 {
 die('Грешка!');
 }
 echo "Добавихте един запис. <br>";
 }
 else
 echo "Не сте въвели данни! <br>";
 
 $result = mysqli_query($dbConn, "SELECT * FROM Artist");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>Изпълнител</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['artist_id']."</td><td>".$row['artist_name']."</td></tr>"; }
 }
?>
</body>
</html>