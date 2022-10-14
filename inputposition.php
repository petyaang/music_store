<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<pre><strong><font size=6>Позиции</font></strong><br><br>
Име на позицията: <input type="text" name="posname"/><br>
  
<input type="submit" name="submit" value="Въведи"/> <a href="musicstore_input.php">Върни се обратно</a><br>
</pre>
</form>
<?php
 include "config.php";
 if (isset($_POST["submit"]))
 {
 $posname = $_POST['posname'];
 
 if (!empty($posname))
 {
 $sql="INSERT INTO Position (pos_name) VALUES ('$posname')";
 $result = mysqli_query($dbConn,$sql);
 if (!$result)
 {
 die('Грешка!');
 }
 echo "Добавихте един запис. <br>";
 }
 else
 echo "Не сте въвели данни! <br>";
 
 $result = mysqli_query($dbConn, "SELECT * FROM Position");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>Позиция</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['pos_id']."</td><td>".$row['pos_name']."</td></tr>"; }
 }
?>
</body>
</html>