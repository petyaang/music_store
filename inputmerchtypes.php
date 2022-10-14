<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="main.css">
 <title></title>
 </head>
 <body>
<form action="#" method="post">
<pre><strong><font size=6>Видове стоки</font></strong><br><br>
Име на стоката: <input type="text" name="merchtype"/><br>
  
<input type="submit" name="submit" value="Въведи"/> <a href="musicstore_input.php">Върни се обратно</a><br>
</pre>
</form>
<?php
 include "config.php";
 if (isset($_POST["submit"]))
 {
 $merchtype = $_POST['merchtype'];
 
 if (!empty($merchtype))
 {
 $sql="INSERT INTO Merchandise_types (merchtype_name) VALUES ('$merchtype')";
 $result = mysqli_query($dbConn,$sql);
 if (!$result)
 {
 die('Грешка!');
 }
 echo "Добавихте един запис. <br>";
 }
 else
 echo "Не сте въвели данни! <br>";
 
 $result = mysqli_query($dbConn, "SELECT * FROM Merchandise_types");
 echo "<table border='2' align='center'>";
 echo "<tr><th>ID</th><th>Вид стока</th></tr>";
 while($row = mysqli_fetch_array($result)){
 echo "<tr><td>".$row['merchtype_id']."</td><td>".$row['merchtype_name']."</td></tr>"; }
 }
?>
</body>
</html>